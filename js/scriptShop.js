const shoppingCart = document.querySelector ('.shopping-cart');

document.querySelector('#shopping-cart-button').onclick = () => {
  shoppingCart.classList.toggle('active');
};

const sc = document.querySelector('#shopping-cart-button');

document.addEventListener('click', function(e){
 if(!sc.contains(e.target) && !shoppingCart.contains(e.target)){
  shoppingCart.classList.remove('active');
 }
});