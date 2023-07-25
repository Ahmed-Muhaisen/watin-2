
const {createApp}=Vue;

const quantity={
    data() {
    return {
      quantity: 1,
    };
  } ,
    template:`<input type="number" style="width:50px; text-align:right; " name="quantity[]" v-model="quantity" >`
    ,watch: {
        'quantity':function (e){
            this.sendValueToParent() ;    }

    }
    ,methods:{
        sendValueToParent(){
            this.$emit('addQuantity', this.quantity);
        }

}}


 const app =createApp({
  components:{
  quantity
  },
 data () {
  return {
        quantity:1,
        deleteFromCartRoute: '',
        product: ''
  }
 },
 mounted() {

  },

  methods: {

  addvaluequantity(quantity){
    this.quantity=quantity;

    },
    submitForm(product_id) {

        const form = document.querySelector('#delete_form');
        form.setAttribute('action', 'deleteFromCard/'+product_id);
        form.submit()
        // form.route('website.deleteFromCard',product);
        // router.push({ name: 'website.deleteFromCard', params: { product: product } });
}


}


}).mount('.app')
