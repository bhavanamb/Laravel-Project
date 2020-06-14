// to check id document is loaded
if (document.readyState == 'loading'){
    //to see if document is still loading
    document.addEventListener('DOMContentLoaded', ready)
}else {
    ready()
}

function ready(){   
    
  
//original
    var removeCartItemButtoms = document.getElementsByClassName('btn-danger');
    for (var i= 0; i < removeCartItemButtoms.length; i++){
        var button = removeCartItemButtoms[i];
        button.addEventListener('click', removeCartItem)
      }
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i=0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged)
    }
    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i=0; i < addToCartButtons.length; i++){
        var button = addToCartButtons[i];
        button.addEventListener('click', addToCartClicked);
    }
    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
    
    
}
function purchaseClicked(){
    //document.getElementById("success").innerHTML = "Thank You For your order!";
    alert('Thank you for your purchase');
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal() 
}
function removeCartItem(event){
    var buttonClicked = event.target;
       buttonClicked.parentElement.parentElement.remove();
       updateCartTotal();
}
function quantityChanged(event){
    var input = event.target;
    if (isNaN(input.value) || input.value <=0){
        input.value= 1;
    }
    updateCartTotal();
}
function addToCartClicked(event){
    var button = event.target;
    var  shopItem = button.parentElement.parentElement;
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText;
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src;
    var itemId = shopItem.getElementsByClassName('menu-itemId')[0].innerText;
    var itemType = shopItem.getElementsByClassName('menu-itemType')[0].innerText;
    console.log(price);
    addItemToCart(title, price, imageSrc,itemId,itemType)
    updateCartTotal()
}

function addItemToCart(title, price, imageSrc,itemId,itemType){
    var cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');
    var cartItems = document.getElementsByClassName('cart-items')[0];
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for(i=0;i<cartItemNames.length;i++){
        if(cartItemNames[i].innerText == title){
            alert("Item already added to Cart!!");
            return;
        }
        
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
            <span style="display:none" id="itemId-cart" class="cart-item-title">${itemId}</span>
            <span style="display:none" id="itemType-cart" class="cart-item-title">${itemType}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>` 

    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click',removeCartItem);
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged);
    
}
function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart-row');
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
} 

var modal = document.getElementById("myModal");
		
var modalLogin = document.getElementById("loginModal");
var contactFormModal = document.getElementById("contactForm");

        // Get the button that opens the modal
var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
        console.log("close button clicked");
        modal.style.display = "none";
        modalLogin.style.display = "none";
        document.getElementById("txtHint").innerHTML="";
        document.getElementById("errEmail").innerHTML="";
        document.getElementById("errorPwd").innerHTML="";
        
};


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target === modal) {
        modal.style.display = "none";
        document.getElementById("txtHint").innerHTML="";
        document.getElementById("errEmail").innerHTML="";
        document.getElementById("errorPwd").innerHTML="";
  }
  else if (event.target === modalLogin) {
        modalLogin.style.display = "none";
  }
};

function signup() {
  console.log("nav clicked");
  modal.style.display = 'block';
}
function login() {
  modalLogin.style.display = 'block';
}

function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}
function myFunction() {
  var x = document.getElementById("respnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}