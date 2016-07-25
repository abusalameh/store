new Vue({
    el: '#categories',
    ready: function(){
        if (typeof category !== "undefined"){
            this.newCategory = category;
        }
        this.fetchCategories();
    },
    data: {
        query: '',
		currentPage: 0,
		limit:10,
		categories: [],
        newCategory: {name:'',description:''},
        anotherCategory:'',
    },
    methods: {
        fetchCategories: function (){
            this.$http.get('/api/categories').success(function(data){
                this.$set('categories',data);
            });
        },
        addCategory: function (){
            // Grap User input
            var category = this.newCategory;
            // Send post request
            this.$http.post('/categories', category).success(function(data){
                toastr.success(data.message,data.title);
            });
            // Clear Input
            this.newCategory = {name:'',description:''};
            // Redirect to index
            if (!this.anotherCategory){
                setTimeout(function (){
                        window.location.href = '/categories';
                },1000);
            } else {
                return;
            }
        },
        updateCategory: function(category){
            this.$http.patch('/categories/'+category.id,this.newCategory).success(function(data){
                toastr.success(data.message,data.title);
            });
            setTimeout(function (){
                    window.location.href = '/categories';
            },1000);
        },
    },
    computed: {
        count: function () {
			return this.categories.length;
		},
        validation: function () {
			return {
				name: !!this.newCategory.name.trim(),
				description: !!this.newCategory.description.trim(),
			};
		},
		isValid: function () {
			var validation = this.validation;
			return Object.keys(validation).every(function (key) {
				return validation[key];
			});
		},
    }
});
