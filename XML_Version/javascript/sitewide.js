/* ----------------------------------------
               XML functions
---------------------------------------- */

/* returns a count of nodes for a given XPath path */
function getNodeCount(xml,path){
    var returnNum = 0;
    if (xml.evaluate) {
        var nodes = xml.evaluate("count("+path+")", xml, null, XPathResult.ANY_TYPE, null);
        returnNum = nodes.numberValue;
    // Code For Internet Explorer
    } else if ("ActiveXObject" in window) {
        var xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
        xmlDoc.async = false;
        xmlDoc.load("books.xml");
        xmlDoc.setProperty("SelectionNamespaces", "xmlns:xsl='http://www.w3.org/1999/XSL/Transform'");
        xmlDoc.setProperty("SelectionLanguage", "XPath");
        objNodeList = xmlDoc.documentElement.selectNodes(path);
        returnNum = objNodeList.length;
    }
    return returnNum;
}


/* returns a set of nodes as a string a given XPath path */
function getXMLContent(xml,path){
    var returnString = "";
    if (xml.evaluate) {
        var nodes = xml.evaluate(path, xml, null, XPathResult.ANY_TYPE, null);
        var result = nodes.iterateNext();
        while (result) {
            returnString += result.childNodes[0].nodeValue + "<br>";
            result = nodes.iterateNext();
        } 
    // Code For Internet Explorer
    } else if ("ActiveXObject" in window) {
        var xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
        xmlDoc.async = false;
        xmlDoc.load("books.xml");
        xmlDoc.setProperty("SelectionNamespaces",    "xmlns:xsl='http://www.w3.org/1999/XSL/Transform'");
        xmlDoc.setProperty("SelectionLanguage", "XPath");
        var objNodeList = xmlDoc.documentElement.selectNodes(path);
        for (i = 0; i < objNodeList.length; i++) {
            returnString += objNodeList[i].childNodes[0].nodeValue + "<br>";
        }
    }
    returnString = returnString.substring(0, returnString.length-4);
    return returnString;
}

/* returns a set of product boxes for a given XPath path */
function showProducts(xml, countPath, resultsPath, isHomepage) {
    isHomepage = isHomepage || false;
    var htmlContent = "";
    var elementCount = 7;
    var pointer = 0;
    var nodeCount = getNodeCount(xml,countPath);
    if(isHomepage) {
        if (nodeCount > 4) { nodeCount = 4;}
    }
    var results = getXMLContent(xml,resultsPath).split("<br>");
    for (var loopCount = 0; loopCount < nodeCount; loopCount++) {
        pointer = loopCount * elementCount;
        htmlContent += '<article id="special' + pointer + '" class="boc-product-box">';
        htmlContent += '<div class="imageholder"><a href="product.html?name='+results[pointer+1] +'"><img src="images/books/' + results[pointer+2] +'" alt="Book cover of the book ' + results[pointer] + '" /><div class="cover-bg"></div></a></div>';
        htmlContent += '<h2><a href="' + encodeURI("product.html?name="+results[pointer+1]) +'">' + results[pointer] +'</a></h2>';
        htmlContent += '<p>' + results[pointer+6].replace(/--nl--/g, "</p><p>") + '</p>';
        htmlContent += '<div class="product-bottom"><div class="boc-3-1-cols boc-center-vert">';
        htmlContent += '<p class="rating"><img src="images/ratings/stars' + results[pointer+4] + '.gif" alt="rating:' + results[pointer+4] + ' out of 5 stars" /><span>' + results[pointer+5] + '</span></p>';
        htmlContent += '<p class="price">£' + results[pointer+3] + '</p>';
        htmlContent += '</div>';
        htmlContent += '<div class="boc-2-cols boc-center-both boc-grid-gap-tiny">';
        htmlContent += '<a href="' + encodeURI("wishlist-add.html?name="+results[pointer]) +'"><span><i class="fas fa-heart"></i>Add to Wishlist</span></a>';
        htmlContent += '<a href="' + encodeURI("basket-add.html?name="+results[pointer]) +'"><span><i class="fas fa-shopping-cart"></i>Add to Basket</span></a>';
        htmlContent += '</div></div>';
        htmlContent += '</article>';    
    };

    if(isHomepage) {
        document.getElementById("specials").className += ' boc-' + nodeCount + '-cols';
    }
    document.getElementById("specials").innerHTML = htmlContent;
    for (loopCount = 0; loopCount < nodeCount; loopCount++) {
        pointer = loopCount * elementCount;
        document.querySelectorAll("article div.imageholder div.cover-bg")[loopCount].style.backgroundImage = "url('images/books/" +results[pointer+2]+"')"; 
    };

}

/* returns a "more buy this author" type list of book images */
function showBookList(xml, countPath, resultsPath, resultsID, headerText, skipThis) {
    skipThis = skipThis || "";
    var htmlContent = "";
    var elementCount = 3;
    var pointer = 0;
    var nodeCount = getNodeCount(xml,countPath);
    if (skipThis != ""){
        if(nodeCount > 1){
            htmlContent += "<h3>" + headerText + "</h3>";
        }
    } else {
        htmlContent += "<h3>" + headerText + "</h3>";
    }
    var results = getXMLContent(xml,resultsPath).split("<br>");
    htmlContent += '<div class="boc-grid-gap boc-4-cols">';
    for (var loopCount = 0; loopCount < nodeCount; loopCount++) {
        pointer = loopCount * elementCount;
        if(skipThis != results[pointer]) {
            htmlContent += '<div class="book">';
            htmlContent += '<a href="product.html?name='+results[pointer+1] +'"><img src="images/books/' + results[pointer+2] +'" alt="Book cover of the book ' + results[pointer] + '" /><div class="cover-bg"></div></a>';
            htmlContent += '<h4><a href="' + encodeURI("product.html?name="+results[pointer+1]) +'">' + results[pointer] +'</a></h4>';
            htmlContent += '</div>'; 
        }; 
    };
    htmlContent += '</div>';
    document.getElementById(resultsID).innerHTML = htmlContent;
}


/* returns a list of reviews associated with any given books */
function showReviews(xml, countPath, resultsPath) {
    var htmlContent = "";
    var elementCount = 2;
    var pointer = 0;
    var nodeCount = getNodeCount(xml,countPath);

    var results = getXMLContent(xml,resultsPath).split("<br>");
    for (var loopCount = 0; loopCount < nodeCount; loopCount++) {
        pointer = loopCount * elementCount;
        htmlContent += '<div class="review">';
        htmlContent += '<p>"' + results[pointer+1] + '"<em> - ' + results[pointer] + '</em></p>';
        htmlContent += '</div>'; 
    };
    document.getElementById("reviews").innerHTML = htmlContent;
}


/* returns a set of information for use in the product pages, displaying the full content of information for a book */
function showProductFull(xml, resultsPath) {
    var htmlContent = "";
    var results = getXMLContent(xml,resultsPath).split("<br>");
    
    htmlContent += '<div class="image-col">';
    htmlContent += '<img src="images/books/' + results[2] + '" alt="Book cover of the book ' + results[0] + '">';
    htmlContent += '</div>';
    htmlContent += '<div class="content-col">';
    htmlContent += '<h2>' + results[0] + '</h2>';
    htmlContent += '<p>' + results[8].replace(/--nl--/g, "</p><p>") + '</p>';
    htmlContent += '<p>' + results[9].replace(/--nl--/g, "</p><p>") + '</p>';
    htmlContent += '<div id="reviews"></div>';
    htmlContent += '<div id="related"></div>';
    htmlContent += '</div>';
    htmlContent += '<div class="info-col">';
    htmlContent += '<h3><a href="authors.html#' + results[4] + '">' + results[3] + '</a></h2>';
    htmlContent += '<p class="rating"><img src="images/ratings/stars' + results[6] + '.gif" alt="rating:' + results[6] + ' out of 5 stars" /><span>' + results[7] + '</span></p>';
    htmlContent += '<p class="price">£' + results[5] + '</p>';
    htmlContent += '<div class="product-buttons">';
    htmlContent += '<a href="' + encodeURI("wishlist-add.html?name="+results[0]) +'"><span><i class="fas fa-heart"></i>Favourite</span></a>';
    htmlContent += '<a href="' + encodeURI("basket-add.html?name="+results[0]) +'"><span><i class="fas fa-shopping-cart"></i>Add to Basket</span></a>';
    htmlContent += '</div></div>'
    htmlContent += '</div>';


    document.getElementById("product-full").innerHTML = htmlContent;
    document.getElementById("replace-title").innerHTML = results[0];
    document.getElementById("replace-breadcrumb").innerHTML = results[0];
    document.title="Barry's Bargain Books :: " + results[0];
    showBookList(xml, "/bookstore/book[author='" + results[3] + "']", "/bookstore/book[author='" + results[3] + "']/descendant-or-self::*[self::title | self::urltitle | self::artwork ]", "related", "Books by this Author", results[0]);

    showReviews(xml, "/bookstore/book[urltitle='" + results[1] + "']/descendant-or-self::*[self::source[parent::review]]","/bookstore/book[urltitle='" + results[1] + "']/descendant-or-self::*[self::source[parent::review] | self::text[parent::review]]")
}



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
    window.location.href='privacy-policy.html#cookies';
}


/* ----------------------------------------
               Basket/Account Code
---------------------------------------- */

function openAccount(){
    window.location.href='account.html';
}

function openBasket(){
    window.location.href='basket.html';
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