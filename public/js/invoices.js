var vm = new Vue({
    el: "#invoices",
    ready: function(){
		if (typeof invoice !== 'undefined'){
			this.newInvoice = invoice;
            // this.fetchCategories();
			return;
		}
        this.fetchCustomers();
	},
    data:{
        customers: [],
        invoices:[],
        selected:"",
        newInvoice:{
            xid:'',
            status:'',
            description:'',
            discount:'',
            total:'',
            customer_id:'',
        },
    },
    methods:{
        log: function (){
            console.log(this.newInvoice);
        },
        fetchCustomers: function(){
            this.$http.get('/api/customers', function (data){
                this.$set('customers',data);
            });
        },
        fetchInvoices: function(id){
            this.$http.get('/api/invoices/customer/'+id , function(data){
                this.$set('invoices',data);
            });
        },
        addProduct: function () {
            var product = this.newProduct;
            this.$http.post('/product', product).success(function(data){
                toastr.success(data.message,data.title);
            });
            this.newProduct = { xid:'', name:'', description:'', notes:'', price:'', quantity:'',category_id:''};
            setTimeout(function (){
                    window.location.href = '/product';
            },1000);

        },
        updateProduct: function(product){
            this.$http.patch('/product/'+product.id,this.newProduct).success(function(data){
                toastr.success(data.message,data.title);
            });
            setTimeout(function (){
                    window.location.href = '/product';
            },1000);
        },
        deleteProduct: function(product){
            var ok = confirm("هل تريد إتمام عملية الحذف ؟\nمع العلم أنك لن تتمكن من أسترداد البيانات إن قمت بالضغط على زر موافق");

            if (ok){
                this.$http.delete('/product/'+product.id).success(function(data){
                    toastr.success(data.message,data.title);
                    this.products.$remove(product);
                }).fail(function(data){
                    toastr.error(data.message,data.title);
                });
            }
            else {
                return;
            }
        },
    },
    computed:{
        count: function () {
			return this.invoices.length;
		},
    },

});
