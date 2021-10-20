    function updateImageName(image){
        /*******************************************************************
    * This function updates the correct controls for when a user selects an image
    *
    * input:
    * image: reference to an image
    *
    *******************************************************************/
        document.getElementById("content-image").value = image.getAttribute('data-src');
        document.getElementById("selected-image").src = '../'+image.getAttribute('data-src');
        document.getElementById("selected-image").className = "";
        MicroModal.close('image-modal');
    }


function updateImageNameAlt(image){
        /*******************************************************************
    * This function updates the correct controls for when a user selects an image
    * (amended for 2 cimage controls on one page)
    *
    * input:
    * image: reference to an image
    *
    *******************************************************************/
        document.getElementById("content-image-two").value = image.getAttribute('data-src');
        document.getElementById("selected-image-two").src = '../'+image.getAttribute('data-src');
        document.getElementById("selected-image-two").className = "";
        MicroModal.close('mobile-image');
    }


function makeSureDelete(url){
    /*******************************************************************
    * This function asks the user to confirm a delete
    *
    * input:
    * control: a url to redirect to if they agree to delete
    *
    *******************************************************************/
    if (confirm('Are you sure you want to delete?')) {
        document.location = url;
    } else {
        return false;
    }
}



/* ----------------------------------------
            Form Validation Code
---------------------------------------- */
    function validateRequired(control){
    /*******************************************************************
    * This function validates a form control which is required
    *
    * input:
    * control: a reference to the control to validate
    *
    * returns: true or false depending on whether it is valid
    *******************************************************************/

        if((control.value.length == 0 || control.selectedIndex == 0 )){
            control.className = 'boc-invalid';
            document.getElementById(control.id + "-msg").innerHTML = "This field cannot be blank";
            return false;
        } else {
            control.className = 'boc-valid';
            document.getElementById(control.id + "-msg").innerHTML = "correct";
            return true;
        }
    }



    function validateDate(control)
    /*******************************************************************
    * This function validates a form control which is a date and
    * ensures it contains a valid date
    *
    * input:
    * control: a reference to the control to validate
    *
    * returns: true or false depending on whether it is valid
    *******************************************************************/
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
            control.className = 'boc-invalid';
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
            control.className = 'boc-invalid';
            document.getElementById(control.id + "-msg").innerHTML = "Please enter a valid date";
            return false;
        } else {
            control.className = 'boc-valid';
            document.getElementById(control.id + "-msg").innerHTML = "correct";
            return true;
        }
    }




    function validateEmail(control){
    /*******************************************************************
    * This function validates a form control which is an email and ensures it
    * contains a valid email address
    *
    * input:
    * control: a reference to the control to validate
    *
    * returns: true or false depending on whether it is valid
    *******************************************************************/

        //regular expression for an email address
        var emailRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(!emailRegExp.test(control.value)){
            control.className = 'boc-invalid';
            document.getElementById(control.id + "-msg").innerHTML = "Email must be a valid email";
            return false;
        } else {
            control.className = 'boc-valid';
            document.getElementById(control.id + "-msg").innerHTML = "correct";
            return true;
        }
    }


    function validateForm(currForm){
    /*******************************************************************
    * This function validates a form in it's entirity. Each control on the form
    * is scanned for data- elements which indicate what type of validation
    * each form element may require
    *
    * input:
    * currForm: a reference to the form to validate
    *
    * returns: true or false depending on whether it is valid
    *******************************************************************/
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