


const {createApp}=Vue;
const app1 =createApp({
data(){
    return {

quantity:1,

    }}
    ,methods: {

},
watch: {
    'quantity':function (e){
if(this.quantity>100){
    this.quantity= 99;
}else if(this.quantity<1){
    this.quantity= 1;
}
    }
}

}).mount('.app')
