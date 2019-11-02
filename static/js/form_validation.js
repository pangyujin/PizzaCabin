function username_validate(){
    var username = document.getElementById("username");
    var username_message = document.getElementById("username_message");
    var reg = /^[\w]+$/;
    var test_result = reg.test(username.value);
    if(!test_result){
        alert("Username can only include characters, numbers and _");
        username_message.innerHTML = "invalid input";
        username.focus();
        username.select();
        username.value = null;
        return false;
    }else{
        username_message.innerHTML = "";
        return true;
    }
}

function password_validate(){
    document.getElementById("password2").value = null;
    var password = document.getElementById("password");
    var password_message = document.getElementById("password_message");
    var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var test_result = reg.test(password.value); 
    if(!test_result){
        alert("Password needs to contain at least 8 characters, including one uppercase letter, one lowercase letter, one number and one special character");
        password_message.innerHTML = "invalid input";
        password.focus();
        password.select();
        password.value = null;
        return false;
    }else{
        password_message.innerHTML = "";
        return true;
    }

}

function password2_validate(){
    var password2 = document.getElementById("password2");
    var password = document.getElementById("password");
    var password2_message = document.getElementById("password2_message");
    if(password.value != password2.value){
        alert("Passwords entered are not the same");
        password2_message.innerHTML = "invalid input";
        password2.focus();
        password2.select();
        password2.value = null;
        return false;
    }else{
        password2_message.innerHTML = "";
        return true;
    }
}

function email_validate(){
    var email = document.getElementById("email");
    var email_message = document.getElementById("email_message");
    var reg = /^[A-Za-z0-9-\.]+@([A-Za-z0-9]+?\.){1,3}[A-Za-z]{2,3}$/;
    var test_result = reg.test(email.value);
    if(!test_result){
      alert("The email entered is invalid");
      email_message.innerHTML = "invalid input";
      email.focus();
      email.select();
      email.value = null;
      return false;
    }else{
      email_message.innerHTML = "";
      return true;
    }
  }


function phone_validate(){
    var phone = document.getElementById("phone");
    var phone_message = document.getElementById("phone_message");
    var reg = /^[0-9]{8}$/;
    var test_result = reg.test(phone.value);
    if(!test_result){
        alert("Phone number must be an 8-digit number");
        phone_message.innerHTML = "invalid input";
        phone.focus();
        phone.select();
        phone.value = null;
        return false;
    }else{
        phone_message.innerHTML = "";
        return true;
    }
}

function postal_validate(){
    var postal = document.getElementById("postal");
    var postal_message = document.getElementById("postal_message");
    var reg = /^[0-9]{6}$/;
    var test_result = reg.test(postal.value);
    if(!test_result){
        alert("Postal code must be a 6-digit number");
        postal_message.innerHTML = "invalid input";
        postal.focus();
        postal.select();
        postal.value = null;
        return false;
    }else{
        postal_message.innerHTML = "";
        return true;
    }
}
