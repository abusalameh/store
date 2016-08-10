var vm = new Vue({
    el: "#products",
    ready: function(){
		if (typeof product !== 'undefined'){
			this.newProduct = product;
            this.fetchCategories();
			return;
		}
        this.fetchCategories();
		// this.fetchProducts();
	},
    data:{
        categories: [],
        products:[],
        selected:"",
        newProduct:{
            xid:'',
            name:'',
            description:'',
            notes:'',
            price:'',
            cost:'',
            quantity:'',
            category_id:'',
        },
        anotherProduct:false,
    },
    methods:{
        log: function (){
            console.log(this.newProduct);
        },
        fetchCategories: function(){
            this.$http.get('/api/categories', function (data){
                this.$set('categories',data);
            });
        },
        fetchProducts: function(id){
            this.$http.get('/api/products/category/'+id , function(data){
                this.$set('products',data);
            });
        },
        addProduct: function () {
            var product = this.newProduct;
            this.$http.post('/products', product).success(function(data){
                toastr.success(data.message,data.title);
            });
            this.newProduct = { xid:'', name:'', description:'', notes:'', price:'',cost:'', quantity:'',category_id:''};
            if (!this.anotherProduct){ 
                setTimeout(function (){
                        window.location.href = '/products';
                },1000);
            } else {
                return;
            }   

        },
        updateProduct: function(product){
            this.$http.patch('/products/'+product.id,this.newProduct).success(function(data){
                toastr.success(data.message,data.title);
            });
            setTimeout(function (){
                    window.location.href = '/products';
            },1000);
        },
        deleteProduct: function(product){
            var ok = confirm("هل تريد إتمام عملية الحذف ؟\nمع العلم أنك لن تتمكن من أسترداد البيانات إن قمت بالضغط على زر موافق");

            if (ok){
                this.$http.delete('/products/'+product.id).success(function(data){
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
			return this.products.length;
		},
    },

});
