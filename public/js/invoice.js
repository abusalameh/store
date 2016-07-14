new Vue({
    el: '#invoice',
    ready: function(){
        if (typeof invoice !== "undefined") {
            this.invoice = invoice;
        }
        if (typeof items !== "undefined") {
            this.items = items;
        }
        if (typeof customer_name !== "undefined") {
            this.customer_name = customer_name;
        }
    },
    data: {
        invoice:{},
        items:[],
        customer_name:"",
    },
    methods: {
        printInvoice: function(){
            window.print();
        },
    },
    computed: {
        invoiceTotal: function (){
            var total = 0;
            for (var i = 0 ; i < this.items.length ; ++i){
                total += (this.items[i].price * this.items[i].quantity);
            }
            return total;
        },
    }
});
