/* ----------------------------------------
               Mobile Menu toggle
---------------------------------------- */
/*toggles the mobile menu */
function toggleMenu() {
    var menuButton = document.getElementById("dropdown-nav");
    if (menuButton.className.indexOf("boc-toggle") == -1) {
        menuButton.className += " boc-toggle";
    } else { 
        menuButton.className = menuButton.className.replace(" boc-toggle", "");
    }
}





/* ----------------------------------------
            Skip Navigation links
---------------------------------------- */
/* needed to allow the skip navigation links to work */
window.addEventListener("hashchange", function(event) {
    var element = document.getElementById(location.hash.substring(1));
    if (focusElement) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }
        element.focus();
       element.removeAttribute("tabindex");
    }
}, false); 


/* ----------------------------------------
               Popup Messages
---------------------------------------- */
 function poptoast(message){
    /*******************************************************************
    * This function is used to activate the popup messages
    *
    * input:
    * message: the text of the message body
    *******************************************************************/

        var toast = document.getElementById("toast");
        toast.innerHTML = message;
        toast.className = "popup";
        setTimeout(function(){ toast.classList.remove("popup"); }, 3000);  
    }



/* ----------------------------------------
               Cookie Bar Code
---------------------------------------- */
/* used to handle the cookies bar at the top of the page */
if(getCookie('BBB-cookies')!=null){
    document.getElementById( "cookiebar" ).className = 'boc-hide';
} 

function acceptCookies(n){
    document.getElementById( "cookiebar" ).className = 'boc-hide';
    bakeCookie('BBB-cookies','true',30);
}

function viewCookieInfo(){
    window.location.href='privacy-policy.php#cookies';
}


/* ----------------------------------------
               Basket/Account Code
---------------------------------------- */

function openAccount(){
    window.location.href='account.php';
}

function openBasket(){
    window.location.href='basket.php';
}


/* ----------------------------------------
               Font Resize Code
---------------------------------------- */
//check for font-size cookie and apply automatically
if(getCookie('BBB-fontsize')!=null){
    document.getElementsByTagName( "html" )[0].className = getCookie('BBB-fontsize');
}


//function to change font sizes for the document
function changeFontSize(n){
    document.getElementsByTagName( "html" )[0].className = 'text-' + n;
    bakeCookie('BBB-fontsize','text-' + n,30);
}



/* ----------------------------------------
               Cookie Code
---------------------------------------- */
/* used to create cookies and get the contents of those cookies */
function bakeCookie(cookieName,cookieValue,days) {
    var cookieExpires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        cookieExpires = "; expires=" + date.toUTCString();
    }
    document.cookie = cookieName + "=" + (cookieValue || "")  + cookieExpires + "; path=/;SameSite=Strict";
}

function getCookie(cookieName) {
    var cookieSearch = cookieName + "=";
    var cookieArray = document.cookie.split(';');
    for(var i=0;i < cookieArray.length;i++) {
        var cookieElement = cookieArray[i];
        while (cookieElement.charAt(0)==' ') cookieElement = cookieElement.substring(1,cookieElement.length);
        if (cookieElement.indexOf(cookieSearch) == 0) return cookieElement.substring(cookieSearch.length,cookieElement.length);
    }
    return null;
}


/* ----------------------------------------
               Basket Code
---------------------------------------- */

function basketAction(action, product_code=0, amount=1){
/*******************************************************************
* This function posts user information to the API backend so that it can 
* add a new user
*
*******************************************************************/
    if(action == "update" && amount==0){
        action = "remove";
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("basket").innerHTML = this.responseText;
            if(action=="add"){
                poptoast("The item was added to your Basket!");
            } else if (action=="update"){
                poptoast("Your Basket was updated!");
            } else if (action=="save"){
                poptoast("Your Basket was saved!");
            } else {
                poptoast("The item was removed from your Basket!");
            }
        }
    };

    xhttp.open("GET", "basketajax.php?action=" + action + "&id=" + product_code + "&amount=" + amount, true);  
    xhttp.send();
}


function quantityChange(control){
    let splitStr = control.id.split('_');
    let endStr = splitStr[1];
    let price = document.getElementById('price_'+endStr);
    let base = document.getElementById('base_'+endStr);
    let basketTotal = 0.00;
   
    price.innerHTML = '£' + (control.value * base.value).toFixed(2);
    basketAction('update', endStr, control.value);

    //cleanup
    if(control.value == 0) { document.getElementById('item_'+endStr).classList.add('boc-hide'); };

    let totals = document.getElementsByClassName('item-total');
    for(loopcount = 0; loopcount < totals.length; loopcount ++){

        basketTotal += parseFloat(totals[loopcount].innerHTML.substring(1));
    }
    document.getElementById("basket-list-total").innerHTML = "Total: <em>£" + (basketTotal) + "</em>";
}

/* ----------------------------------------
               Wishlist Code
---------------------------------------- */

function wishlistAction(action, product_code=0, loggedin=false){
/*******************************************************************
* This function posts user information to the API backend so that it can 
* add a new user
*
*******************************************************************/
    if(!loggedin){
        poptoast("You must be logged in to your account to use this feature.");
    } else {
    	let xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(action=="add"){
	                poptoast("The item was added to your Wishlist!");
	            } else if (action=="remove"){
	                poptoast("Your Wishlist was updated!");
	                location.reload();
	            } 
	        }
	    };

	    xhttp.open("GET", "wishlistajax.php?action=" + action + "&id=" + product_code, true);  
	    xhttp.send();
    }
}



/* ----------------------------------------
               Search bar Code
---------------------------------------- */

function validateSearchForm(event) {
        event.preventDefault();
        var isValid = validateRequired(document.getElementById('search-field'));
        if(isValid){ document.getElementById('search-form').submit(); }
    }

document.getElementById('search-form').addEventListener('submit', validateSearchForm);


/* ----------------------------------------
            Form Validation Code
---------------------------------------- */
function validateRequired(control){
    if((control.value.length == 0 || control.selectedIndex == 0 )){
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "This field cannot be blank";
        return false;
    } else {
        control.className = ' boc-valid';
        document.getElementById(control.id + "-msg").innerHTML = "correct";
        return true;
    }
}


/* Validate a date */
function validateDate(control)
{
    var dateString = control.value;
    var isValid = true;
    // First check for the pattern
    if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(dateString)){
        isValid = false;
    }

    // Parse the date parts to integers
    var parts = dateString.split("-");
    var day = parseInt(parts[2], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[0], 10);
    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
    var thisYear = new Date().getFullYear();
    // Check the ranges of month and year
    if(year < thisYear - 150 || year > thisYear || month == 0 || month > 12){
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "birth date must be between " + (thisYear - 150) + " and " + thisYear;
        return false;
    } else {
        // Adjust for leap years
        if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)){ monthLength[1] = 29; }
        // Check the range of the day
        if(day <= 0 && day > monthLength[month - 1]){
            isValid = false;
        }
    }

    if (isValid == false ) {
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "Please enter a valid date";
        return false;
    } else {
        control.className = ' boc-valid';
        document.getElementById(control.id + "-msg").innerHTML = "correct";
        return true;
    }
}

/* Validate a file input box */
function validateFile(control)
{
    var allowed_extensions = new Array("jpg","png","gif");
    var file_extension = control.value.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            control.className = ' boc-valid';
            document.getElementById(control.id + "-msg").innerHTML = "correct";
            return true;
        }
    }

    control.className = ' boc-invalid';
    document.getElementById(control.id + "-msg").innerHTML = "file must be jpg, gif or png";
    return false;
}

/* validate an email address */
function validateEmail(control){
    var emailRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!emailRegExp.test(control.value)){
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "Email must be a valid email";
        return false;
    } else {
        control.className = ' boc-valid';
        document.getElementById(control.id + "-msg").innerHTML = "correct";
        return true;
    }
}

/* Validate an optional textbox based on a select option being chosen */
function validateOptional(control){
    if((control.value.length == 0 &&  document.getElementById(control.getAttribute('data-based-on')).selectedIndex == control.getAttribute('data-based-on-value') )){
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "This field cannot be blank";
        return false;
    } else {
        control.className = ' boc-valid';
        document.getElementById(control.id + "-msg").innerHTML = "correct";
        return true;
    }
}


/* Validate radio and checkboxes */
function validateBoxes(control){
    var radios = document.getElementsByName(control.name);
    var radioLoop = 0;

    while (radioLoop < radios.length) {
        if (radios[radioLoop].checked) { 
            document.getElementById(control.name + "-msg").className = ' boc-valid';
            document.getElementById(control.name + "-msg").innerHTML = "correct";
            return true; 
        };
        radioLoop++;        
    }

    document.getElementById(control.name + "-msg").className = ' boc-invalid';
    document.getElementById(control.name + "-msg").innerHTML = "Please select one of the available options";
    return false; 
}

/* Validates a Captcha */
function validateCaptcha(control) {
    if(control.value == captchaCode) {
        control.className = ' boc-valid';
        document.getElementById(control.id + "-msg").innerHTML = "Valid Captcha";
        return true;
    }else{
        control.className = ' boc-invalid';
        document.getElementById(control.id + "-msg").innerHTML = "Invalid Captcha";
        return false;
        createCaptcha();
    }
}


/*Validates a given form using the functions above */
function validateForm(currForm){
    var validates = true;
    var validateString = "";
    var oneRadioChecked = false;
    var oneCheckChecked = false;

    for(var loopCount = 0; loopCount < currForm.elements.length; loopCount++) {
        if(currForm.elements[loopCount].getAttribute('data-validate') == 'true') {

            currForm.elements[loopCount].className=("");

            validateString = currForm.elements[loopCount].getAttribute('data-validation-type');
            if(validateString.search("required") != -1){
                if(!validateRequired(currForm.elements[loopCount])) { validates = false; }
            }
            if(validateString.search("file") != -1){
                if(!validateFile(currForm.elements[loopCount])) { validates = false; }
            }
            if(validateString.search("date") != -1){
                if(!validateDate(currForm.elements[loopCount])) { validates = false; }
            }
            if(validateString.search("email") != -1){
                if(!validateEmail(currForm.elements[loopCount])) { validates = false; }
            }
            if(validateString.search("optional") != -1){
                if(!validateOptional(currForm.elements[loopCount])) { validates = false; }
            }
            if(validateString.search("radio") != -1){
                if(!oneRadioChecked) {
                    if(!validateBoxes(currForm.elements[loopCount])) { 
                        validates = false; 
                    } else {
                        oneRadioChecked = true;
                    }
                }
            }
            if(validateString.search("checkbox") != -1){
                if(!oneCheckChecked) {
                    if(!validateBoxes(currForm.elements[loopCount])) { 
                        validates = false; 
                    } else {
                        oneCheckChecked = true;
                    }
                }
            }
            if(validateString.search("captcha") != -1){
                if(!validateCaptcha(currForm.elements[loopCount])) { validates = false; }
            }
        }
    }
    return validates;

}