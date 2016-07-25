var testPhone = /\d{10}/;
 new Vue({
	el: '#customers',
	ready: function(){
		if (typeof customer !== 'undefined'){
			this.newCustomer = customer;
			if (typeof products !== "undefined"){
				this.products = products;
				this.allProducts = products;
			}
			if (typeof invoices !== "undefined"){
				this.newCustomer.invoices = invoices;
			}
			if (typeof payments !== "undefined"){
				this.newCustomer.payments.cash = payments[0];
				this.newCustomer.payments.checks = payments[1];
			}
			if (typeof balance !== "undefined"){
				this.newCustomer.balance = balance;
			}
			return;
		}
		this.fetchCustomers();
		this.fetchProducts();

	},
	data: {
		query: '',
		order: -1,
		currentPage: 0,
		limit:10,
		customers: [],
		newCustomer: {
			id:'',
			xid: '',
			name: '',
			address: '',
			phone: '',
			workgroup:1, // [ '1' => 'Customer', '2' => 'Supplier' ]
			invoices:[],
			payments:[],
			balance:[],
		},
		anotherCustomer:false,
		countDisabled:0,
		products: [],
		allProducts: [],
		selectedProducts:[],
		invoice:{
			items:[
				{
					name:'',
					qty:1,
					price:0,
					total: function(qty,price){
						return qty * price;
					},
					productId:'',
					selected:-1,
				},
			],
			date: "",
			description:"",
		},
		payment:{
			date:"",
			due_to: "",
			amount:0.0,
			selectedInvoice: "",
			paymentMethod: "",
		},
		paymentMethod:"",
		due_to:"",
		selectedInvoice:"",
	},
	methods: {
			log: function (){
				console.log(this.newCustomer);
			},
			// Customers

			/*
			 * Create new customer
			 */
			addCustomer: function () {
				var customer = this.newCustomer;
				this.$http.post('/customers', customer).success(function(data){
					toastr.success(data.message,data.title);
				});
				this.newCustomer = {xid:'',name:'',address:'',phone:''};
				if (!this.anotherCustomer){
						setTimeout(function (){
							window.location.href = '/customers';
					},1000);
				} else {
					return;
				}


			},

			/*
			 * Fetch all customers from database
			 */
			fetchCustomers: function(){
				this.$http.get('/api/customers', function (data){
					this.$set('customers',data);
				});
			},

			/*
			 * Update selected customer
			 */
			updateCustomer: function(customer){
				this.$http.patch('/customers/'+customer.id,this.newCustomer).success(function(data){
					toastr.success(data.message,data.title);
				});
				setTimeout(function (){
						window.location.href = '/customers';
				},1000);
			},

			/*
			 * Delete selected customer
			 */
			deleteCustomer: function(customer){
				var ok = confirm("هل تريد إتمام عملية الحذف ؟\nمع العلم أنك لن تتمكن من أسترداد البيانات إن قمت بالضغط على زر موافق");
				return;
				if (ok){
					this.$http.delete('/customers/'+customer.id).success(function(data){
						toastr.success(data.message,data.title);
						this.customers.$remove(customer);
					}).error(function(data){
						toastr.error(data.message,data.title);
					});
				}
				else {
					return;
				}
			},
			// Invoices

			/*
			 * Add new item to invoice items list
			 */
			addNewItem: function(){
				var item = {
					name:'',
					qty:1,
					price:0,
					maxQty:0,
					total: function(qty,price){
						return qty * price;
					},
					productId:'',
				};
				this.invoice.items.push(item);

			},

			/*
			 * Delete an item from invoice items list
			 */
			deleteItem: function(index){

					var product = this.invoice.items[index];
					if (index === 0 && product.name === ""){
						title = "خطأ";
						message = "لا يمكنك حذف هذا المُدخل ";
						type = "error";
						alert(title, message, type);
					} else if (index > 0 && product.name ===""){
						this.invoice.items.splice(index,1);
						return;
					}
					var self = this;
					var ll = this.allProducts.filter(function(product) {
						return product.id == self.invoice.items[index].productId;
					})[0];

					if (typeof ll !== "undefined"){
					this.invoice.items.splice(index,1);
					ll.disable = false;
					--this.countDisabled;

					for (var i = 0 ; i < this.products.length ; ++i){
						if (this.products[i].id == ll.id){
							this.products[i] = ll;
							break;
						}
					}
					}
				},

			/*
			 * Handle maximum quantaity entered by the user 
			 */
			handleMaxQuantity: function(index, maxQty, itemQty){
				if (itemQty > maxQty){
					title = "خطأ";
					message = "لقد تجاوزت الكمية المتوفرة لديك في المخزون وهي ("+ maxQty+ ") ، عذراً";
					type = "error";
					alert(title, message, type);
					this.invoice.items[index].qty = maxQty;
					return maxQty;
				}
			},

			/*
			 * Store invoice to database 
			 */
			saveInvoice: function(id){
				var invoice = this.invoice;
				invoice.customer_id = this.newCustomer.id;
				var message = "";
				var title = "";
				var type = "error";
				if (invoice.items.length < 1){
					 message = "لا يمكنك إنشاء فاتورة فارغة";
					 title ="هنالك خطأ";
					 type = "error";
					alert(title, message, type);
					return false;
				}
				for (var i = 0 ; i < invoice.items.length ; ++i){
					if (invoice.items[i].qty < 1){
						 message = "لا يمكنك إنشاء هذه الفاتورة بسبب نفاذ المنتج " + invoice.items[i].name + " من المخزون";
						 title ="هنالك خطأ";
						 type = "error";
						alert(title, message, type);
						// alert("هذا المنتج نفذ من المخزون", "لا يمكنك أنشاء هذه الفاتورة وذلك لأن المنتج - " + invoice.items[i].name +  " - قد إنتهى من المخزون " , "error");
						return false;
					}
					if (invoice.items[i].productId === ""){
						alert("هنالك خطأ", "لا يمكنك إنشاء فاتورة فارغة", "error");
						return false;
					}
				}

				// check for duplication or disabled items 
				var items = invoice.items;
					for(i = 0 ; i < items.length ; ++i){
						for (var j = i+1 ; j < items.length ; ++j) {
							if (items[i].productId == items[j].productId || items[i].maxQty == 0 || items[j].maxQty == 0){
								message = "أنت تقوم بإنشاء فاتورة بطريقة غير شرعية ,, يرجى تحديث الصفحة وعدم العبث ومحاولة الإختراق";
								title ="هنالك خطأ";
								type = "error";
								alert(title, message, type);
								return;
							}
						}
					}

				var self = this;
				this.$http.post('/customer/'+id+'/invoice/store', {"data":invoice}).success(function(data){
					toastr.success(data.message,data.title);
					window.location.href = '/customers/'+ self.newCustomer.id;
				});
			},

			/*
			 * Empty Invoice - Cancel invoice 
			 */
			cancelItems: function(){
					this.invoice.items = [
						{
							name:'',
							qty:1,
							price:0,
							maxQty:0,
							total: function(qty,price){
								return qty * price;
							},
							productId:'',
							selected:-1,
						},
					];
					this.selectedProducts = [];
			},

			// Payments 

			/*
			 * Handle maximum payment entered by the user 
			 */
			handleMaxPayment: function(invoiceIndex){
				var remaningMoney = Number(this.newCustomer.invoices[invoiceIndex]._total);

				if (this.payment.amount > remaningMoney){
					title = "خطأ";
					message = "عذراً لقد قمت بإدخال مبلغ أكبر من المبلغ المتبقي من الفاتورة.";
					type = "error";
					alert(title, message, type);
					this.payment.amount = remaningMoney;
					return;
				}
				
			},

			/*
			 * Cancel Payment 
			 */
			 cancelPayment: function(){
			 	this.payment = {
					date:"",
					due_to: "",
					amount:0.0,
					selectedInvoice: "",
					paymentMethod: "",
			 	};
			 	this.paymentMethod = "";
				this.due_to = "";
				this.selectedInvoice = "";
			 },

			/*
			 * Cancel Payment 
			 */
			 savePayment: function () {
			 	var obj = {
			 		payment_method : this.payment.paymentMethod,
			 		amount		   : this.payment.amount,
			 		customer_id    : this.newCustomer.id,
			 		// due_to	       : (this.payment.paymentMethod == "check") ? this.payment.due_to : "00/00/0000",
			 		due_to	       : this.payment.due_to,
			 		date     	   : this.payment.date,
			 		invoice_id     : this.newCustomer.invoices[this.payment.selectedInvoice].id,
			 	};
			 	this.$http.post('/customer/payment/store',{data: obj}, function(data){
			 		toastr.success(data.message,data.title);
			 	});
			 	this.cancelPayment();
			 	setTimeout(function (){
					window.location.href = '/customers/'+obj.customer_id;
				},1500);
			 },
			convertDate: function(date){
				// MM/DD/YYYY
					date = this.date.getMonth() + "/" + this.date.getTime() + "/" + this.date.getFullYear();
					return date;
			},
			
			// Products

			/*
			 * Fetch selected product information in invoice 
			 */
			productInfo: function(id,index){
				var product;
				for (var i = 0 ; i < this.products.length ; ++i){
					if (this.products[i].id == id){
						product = this.products[i];
						if (typeof this.products[i].disable !== "undefined"){
							this.products[i].disable = false;
							--this.countDisabled;
							break;
						}else {
							this.products[i].disable = true;
							++this.countDisabled;
							break;
						}
					}
				}
				this.invoice.items[index].name = product.name;
				this.invoice.items[index].productId = Number(product.id);
				this.invoice.items[index].price = Number(product.price);
				this.invoice.items[index].maxQty = Number(product.quantity);


			},

			/*
			 * Assign products to ProductList 
			 */
			productList: function(){
				return this.products;
			},

			/*
			 * Fetch products from database 
			 */
			fetchProducts: function(){
	            this.$http.get('/api/products/' , function(data){
	                this.$set('products',data);
	            });
	        },

	},
	computed: {
        validation: function () {
			return {
				xid: !!Number(this.newCustomer.xid.trim()),
				name: !!this.newCustomer.name.trim(),
				address: !!this.newCustomer.address.trim(),
				phone: testPhone.test(this.newCustomer.phone.trim()),
			};
		},
		isValid: function () {
			var validation = this.validation;
			return Object.keys(validation).every(function (key) {
				return validation[key];
			});
		},
		count: function () {
			return this.customers.length;
		},
		finalTotal: function(){
				var	sum  = 0;
				for (var i = 0 ; i < this.invoiceItems.length ; ++i ){
					sum += invoiceItems[i].total();
				}
				return sum;
		},
		disabledCount: function(){
			var count = 0;
			for (var i = 0 ; i < this.products.length ; ++i) {
				if (this.products[i].disable) {
					count++;
				}
			}
			return (count == this.products.length);
		},
    },
});
