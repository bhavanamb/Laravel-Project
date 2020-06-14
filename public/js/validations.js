/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function checkIfExists(str) {
	if (str)
        {	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "CheckUserExists.php?username="+str, true);
        xmlhttp.send();
		
	}
        else
        {
            document.getElementById("txtHint").innerHTML = "Password enter valid Username!";
        }
        
}
function checkIfNotExists(str) {
	if (str)
        {	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("loginuser").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "CheckUserNotExists.php?username="+str, true);
        xmlhttp.send();
		
	}
        else
        {
            document.getElementById("loginuser").innerHTML = "Password enter valid Username!";
        }
        
}
function checkIfIdExists(email) {
        emailValidations(email);
	if (email)
        {	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "checkEmailExists.php?email="+email, true);
        xmlhttp.send();
		
	}
        else
        {
            document.getElementById("txtHint").innerHTML = "Password enter valid Email!";
        }
        
}
function emailValidations(email){
   if (email) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(this.responseText=="Invalid email address."){
				document.getElementById("errEmail").innerHTML = this.responseText;
                                document.getElementById("email").focus();
                               
                                return false;
                               }
                            else{
                                document.getElementById("errEmail").innerHTML = this.responseText;
                            }
			}
		}
		xmlhttp.open("GET", "Validation.php?email="+email, true);
        xmlhttp.send();
		
	}
        
    
}
function contactEmailValidations(email){
   if (email) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                               if(this.responseText=="Invalid email address."){
				document.getElementById("emailErr").innerHTML = this.responseText;
                                document.getElementById("email").focus();
                                document.getElementById("email").value = "";
                                return false;
                               }
                            else{
                                document.getElementById("emailErr").innerHTML = this.responseText;
                            }
			}
		}
		xmlhttp.open("GET", "Validation?email="+email, true);
        xmlhttp.send();
		
	}
        
    
}
function pwdValidations(pwd){
   if (pwd) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                            if(this.responseText != ""){
				document.getElementById("errorPwd").innerHTML = this.responseText;
                                
                            }
                            else{
                                document.getElementById("errorPwd").innerHTML = this.responseText;
                            }
			}
		}
		xmlhttp.open("GET", "Validation.php?pwd="+pwd, true);
        xmlhttp.send();
		
	}
        
    
}
function pwdLoginValidations(pwd){
   if (pwd) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                            if(this.responseText != ""){
				document.getElementById("loginpwd").innerHTML = this.responseText;
                                document.getElementById("registerpwd").value = "";
                            }
                            else{
                                document.getElementById("loginpwd").innerHTML = this.responseText;
                            }
			}
		}
		xmlhttp.open("GET", "Validation.php?pwd="+pwd, true);
        xmlhttp.send();
		
	}
        
    
}
function validateRegForm(form)
  {
      var re;
    if(form.name.value == "") {
      document.getElementById("txtHint").innerHTML = "Username cannot be blank!";
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    

    if(form.password.value != "") {
      if(form.password.value.length < 8) {
          document.getElementById("errorPwd").innerHTML = "Password must contain at least eight characters!";
        form.password.focus();
        return false;
      }
       if(form.password.value.length > 10) {
          document.getElementById("errorPwd").innerHTML = "Password can contain atmost ten characters!";
        form.password.focus();
        return false;
      }
      
      
      re = /[0-9]/;
      if(!re.test(form.password.value)) {
       document.getElementById("errorPwd").innerHTML = "password must contain at least one number (0-9)!";
       
        form.password.focus();
        return false;
      }
      
      re = /(?=.*[!@#$%^&*])/;
      if(!re.test(form.password.value)) {
       document.getElementById("errorPwd").innerHTML = "password must contain special characters";
       
        form.password.focus();
        return false;
      }
      
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
        document.getElementById("errorPwd").innerHTML = "password must contain at least one lowercase letter (a-z)!";
       
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        document.getElementById("errorPwd").innerHTML = "password must contain at least one uppercase letter (A-Z)!";
       
        form.password.focus();
        return false;
      }
      if(form.password.value != form.password_confirmation.value)
      {
        document.getElementById("errorPwd").innerHTML = "Password and Confirm password are not matching!";
       form.password.value="";
     // alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }

    } else{
      document.getElementById("errorPwd").innerHTML = "Password cannot be empty";
       
        form.password.focus();
    }

    
    if(form.email.value) {
        re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(form.email.value)){
            document.getElementById("errEmail").innerHTML = "Invalid email address";
            form.email.focus();
            return false;
        }
        
    }
    else{
        document.getElementById("errEmail").innerHTML = "Email Id cannot be blank!";
        return false;
    }
   
    return true;
}
function validateChangePwd(form)
  {

    re = /^\w+$/;
    

    if(form.password.value != "" && form.password.value == form.confirmPass.value) {
      if(form.password.value.length < 8) {
          document.getElementById("errorPwd").innerHTML = "Password must contain at least eight characters!";
        form.password.focus();
        return false;
      }
       if(form.password.value.length > 10) {
          document.getElementById("errorPwd").innerHTML = "Password can contain atmost ten characters!";
        form.password.focus();
        return false;
      }
      
      
      re = /[0-9]/;
      if(!re.test(form.password.value)) {
       document.getElementById("errorPwd").innerHTML = "password must contain at least one number (0-9)!";
       
        form.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
        document.getElementById("errorPwd").innerHTML = "password must contain at least one lowercase letter (a-z)!";
       
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        document.getElementById("errorPwd").innerHTML = "password must contain at least one uppercase letter (A-Z)!";
       
        form.password.focus();
        return false;
      }
    } else {
        document.getElementById("errorPwd").innerHTML = "Password and Confirm password are not matching!";
       
     // alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }

   
    return true;
}
function validateContactForm(form){
    if(form.name.value == "") {
      document.getElementById("formErr").innerHTML = "Name cannot be blank!";
      form.username.focus();
      return false;
    }
    if(form.email.value) {
        re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(form.email.value)){
            document.getElementById("formErr").innerHTML = "Invalid email address format";
            form.email.focus();
            return false;
        }
        else{
            return true;
        }
    }else
    {
      document.getElementById("formErr").innerHTML = "Email cannot be blank!";
      form.email.focus();
      return false;
    }
    
    
    if(form.subject.value == "") {
      document.getElementById("formErr").innerHTML = "Subject cannot be blank!";
      form.subject.focus();
      return false;
    }
}

function loginValidate(form){
    if(form.username.value == "" && form.pwd.value == "") {
      document.getElementById("txtHint").innerHTML = "Enter a valid Username!";
      form.username.focus();
      document.getElementById("errorPwd").innerHTML = "Enter a valid password!";
      form.username.focus();
      return false;
    }
    else if(!form.pwd.value){
      document.getElementById("errorPwd").innerHTML = "Enter a valid password!";
      form.username.focus();
      return false;
    }
    else if(!form.username.value){
      document.getElementById("errorPwd").innerHTML = "Enter a valid Username!";
      form.username.focus();
      return false;
    }
}

function validateAddItem(form){
    if(!form.burgername.value){
        document.getElementById("burgernameErr").innerHTML = "Enter a valid Burger Name!";
      form.burgername.focus();
      return false;
    }
    else if(!form.image.value){
         document.getElementById("imgError").innerHTML = "Upload burger image!";
      form.image.focus();
      return false;
    }
     else if(!form.burgertype.value){
         document.getElementById("burgertypeErr").innerHTML = "Select Burger Type!";
      form.burgertype.focus();
      return false;
    }
    else if(!form.calories.value){
        document.getElementById("caloriesErr").innerHTML = "Enter Calories!";
      form.calories.focus();
      return false;
    }
    else if(!form.price.value){
        document.getElementById("priceErr").innerHTML = "Enter Price!";
      form.price.focus();
      return false;
    }
    else if(!form.ingredients.value){
        document.getElementById("ingredientsErr").innerHTML = "Enter Ingredients details!";
      form.ingredients.focus();
      return false;
    }
}
function validateUpdateItem(form){
    if(!form.burgername.value){
        document.getElementById("burgernameErr").innerHTML = "Enter a valid Burger Name!";
      form.burgername.focus();
      return false;
    }
     else if(!form.burgertype.value){
         document.getElementById("burgertypeErr").innerHTML = "Select Burger Type!";
      form.burgertype.focus();
      return false;
    }
    else if(!form.calories.value){
        document.getElementById("caloriesErr").innerHTML = "Enter Calories!";
      form.calories.focus();
      return false;
    }
    else if(!form.price.value){
        document.getElementById("priceErr").innerHTML = "Enter Price!";
      form.price.focus();
      return false;
    }
    else if(!form.ingredients.value){
        document.getElementById("ingredientsErr").innerHTML = "Enter Ingredients details!";
      form.ingredients.focus();
      return false;
    }
}

function fileExtValidation(){
    var fileInput = document.getElementById("image");
    if (fileInput.files.length>0)
        {	for (var i = 0; i <= fileInput.files.length - 1; i++) 
            { 
  
                var fsize = fileInput.files.item(i).size; 
                var file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file <= 4096) { 
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("imgError").innerHTML = this.responseText;
                                if(this.responseText){
                                    fileInput.value = '';
                                    document.getElementById("image").focus();
                                }
			}
		}
            
		xmlhttp.open("GET", "validateImageFile.php?fineInput="+fileInput.files[0].name, true);
        xmlhttp.send();
        }
        else{
            document.getElementById("imgError").innerHTML = "Please upload valid image file!";
           fileInput.value = '';
         document.getElementById("image").focus();
         return false;
        }
            }
		
	}
        else
        {
            document.getElementById("imgError").innerHTML = "Please upload valid image file!";
            fileInput.value = '';
         document.getElementById("image").focus();
         return false;
        }
}
function burgerNameValidation(str){
if (!/^[a-zA-Z]*$/g.test(str) || !str)
        {	
		document.getElementById("burgernameErr").innerHTML = "Password enter valid Burgername!";
		
	}
        else
        {
            var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("burgernameErr").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "validateImageFile.php?burgername="+str, true);
        xmlhttp.send();
        }

}

 function editItemDetails(){
     $itemId = document.getElementById("itemId").innerHTML;
     window.location = "update-item.php?itemId=" +$itemId;
}

function fileExtValidation(){
    var fileInput = document.getElementById("image");
    $itemId = document.getElementById("itemId").innerHTML;
    if (fileInput.files.length>0)
        {	for (var i = 0; i <= fileInput.files.length - 1; i++) 
            { 
  
                var fsize = fileInput.files.item(i).size; 
                var file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file <= 4096) { 
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("imgError").innerHTML = this.responseText;
                                if(this.responseText){
                                    fileInput.value = '';
                                    document.getElementById("image").focus();
                                }
			}
		}
            
		xmlhttp.open("GET", "validateImageFile.php?fineInput=+fileInput.files[0].name&itemId=$itemId", true);
        xmlhttp.send();
        }
        else{
            document.getElementById("imgError").innerHTML = "Please upload valid image file!";
           fileInput.value = '';
         document.getElementById("image").focus();
         return false;
        }
            }
		
	}
        else
        {
            document.getElementById("imgError").innerHTML = "Please upload valid image file!";
            fileInput.value = '';
         document.getElementById("image").focus();
         return false;
        }
}

function updateImgValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        document.getElementById("imgError").innerHTML = "Please upload valid image file!";
        document.getElementById("image").focus();
        fileInput.value = '';
        document.getElementById('imagePreview').value="";
        return false;
    }else{
        document.getElementById("imgError").innerHTML = "";
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img width="80" height="80" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function validateOrder(){
    var calcKeys = document.querySelectorAll('#itemId-cart');
    var id_values = [];
    for (var i = 0; i < calcKeys.length; i++){
        id_values.push(calcKeys[i].innerText);
    }
    const ivalues_json= JSON.stringify(id_values);
    console.log(ivalues_json);
    
    if(id_values){
        window.location = '/player_detail?username=' + name;
    }
    
    document.getElementById("success").innerHTML = "Thank You For your order!";

           // var xmlhttp = new XMLHttpRequest();
		//xmlhttp.onreadystatechange = function() {
			//if (this.readyState == 4 && this.status == 200) {
				//document.getElementById("txtHint").innerHTML = this.responseText;
			//}
		//
		//xmlhttp.open("POST", "orderDb.php", true);
      //  xmlhttp.send();
}