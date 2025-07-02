import { feedback }  from "./helper";

class OrderDetailHandler {

    constructor(){

        feedback(document.querySelector('.success'))
    }
    
}

document.addEventListener('DOMContentLoaded', ()=> new OrderDetailHandler())