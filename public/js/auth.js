Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
// alert(document.querySelector('#token').getAttribute('value'));
new Vue({
	el: "#v-app",
	data:{
		login:{
			username:'',
			password:'',
		},
		alert:{
			type:'',
			error:'',
			success:'',
		},
		loader:{
			loading:false,
			color:"#00A3FF",
			size:40,
		},

	},
	methods:{
		loginUser: function(){

			var credentials = this.login;

			// this.$http.post('/login',{ username: credentials.username, password:credentials.password }).success(function(data,res,status){
			// 	console.log("sdata : " +data);
			// 	console.log("sres : " +res);
			// 	// console.log("sstatus : " +status);
			// 	console.log(status);
			// }).error(function(data,request,status){
			// 	console.log("data : " +data);
			// 	console.log("request : " +request);
			// 	console.log("status : " +status);
			// });
			var self = this;
			this.loading = true;
			
				this.$http.post('/login',{username: credentials.username, password:credentials.password}).then(function(res){
				self.loading = false;
				var status = res.data.status;
				if (status == "fail"){
					self.alert.type = 'danger';
					self.alert.error = JSON.parse(res.data.message).error;

					setTimeout(function(){
						self.alert.error = '';
						self.alert.type = '';
					},2000);
					return;
				} else if (status == "success"){
					self.alert.type = 'success';
					self.alert.success = res.data.message;
					setTimeout(function(){
						self.alert.success = '';
						self.alert.type = '';
						window.location = res.data.url;
					},2000);
				}
			});
			// this.$http.post('url', post data).success(function(return data) 

			// { Success stuff; }).error( function(data, request, status) { the request contains the errors from validation; });

		},
	},
});
