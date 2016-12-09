var testPhone = /\d{10}/;
 new Vue({
	el: '#suppliers',
	ready: function(){
		if (typeof supplier !== 'undefined'){
			this.newSupplier = supplier;
			if (typeof products !== "undefined"){
				this.products = products;
				this.allProducts = products;
			}
			if (typeof invoices !== "undefined"){
				this.newSupplier.invoices = invoices;
			}
			if (typeof payments !== "undefined"){
				this.newSupplier.payments.cash = payments[0];
				this.newSupplier.payments.checks = payments[1];
			}
			if (typeof balance !== "undefined"){
				this.newSupplier.balance = balance;
			}
			return;
		}
		this.fetchSuppliers();
		this.fetchProducts();
	},
	data: {
		query: '',
		order: -1,
		currentPage: 0,
		limit:10,
		suppliers: [],
		newSupplier: {
			id:'',
			xid: '',
			name: '',
			address: '',
			phone: '',
			workgroup:2, // [ '1' => 'Customer', '2' => 'Supplier' ]
			invoices:[],
			payments:[],
			balance:[],
		},
		
	},
	methods: {
		/**
		 * Fetch all suppliers 
		 */
		fetchSuppliers : function(){
			this.$http.get('/api/suppliers', function (data){
					this.$set('suppliers',data);
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
			return this.suppliers.length;
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
    filters:{
    	filterDisabled: function(item){
    		 return item.disable;

    	}
    },
});
