<?php
// start the session
session_start();
//buffer the output because we want to redirect if successful after a timed event
//ob_start();
//check the session to see if anyone is logged in, otherwise redirect to the login page
if (!isset($_SESSION["current_user"])) { header("Location: account-login.php"); }

include('admin/includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en" class="text-100">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">

    <!-- ############################# INFORMATION #############################

### VALIDATION ###
This page and corresponding CSS have been checked on the W3c HTML5 and CSS3 
validator and have passed I chose not to include the badge purely for stylistic 
reasons.

### ACKNOWLEDGEMENTS ###

This site uses fontawesome (https://fontawesome.com) for icons

     ####################################################################### -->

    <title>Barry's Bargain Books :: Account</title>
    <meta name="description" content="Barry's Bargain Books: Discover your next favourite book from our list of fantastic books to read!">
    <meta name="keywords" content="books, buy books, books online, paperback books, favourite book, reading, discounted, cheap">
    <meta name="author" content="Barry O'Connor">
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/boc.css">
    <link rel="stylesheet" href="css/fontawesome.css">
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />

</head>
<body>
    <!-- screenreader / keyboard link displayed offscreen to allow skipping the menu and accessing main content -->
    <a class="skip-main" href="#main">Skip to main content</a>

    <!-- cookie bar to allow for GDPR compliance -->
    <div id="cookiebar"><p>This website uses cookies</p>
        <button type="button" onclick="viewCookieInfo();" onkeypress="viewCookieInfo();">Read More</button>
        <button type="button" onclick="acceptCookies();" onkeypress="acceptCookies();">Accept Cookies</button>
    </div>

     <?php include('includes/header.php'); ?>





    <main id="main">
        <section class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Account</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Account</span>
                </div>
            </div>

            <div class="boc-grid-container boc-pad-2">
                <h2>Account Options</h2>
                <p>The following options are available</p>
                <hr />
                <h3>Account Maintenance</h3>
                <ul>
                    <li><a href="account-update.php">Update your account details</a></li>
                    <li><a href="account-logout.php">Logout of your account</a></li>
                    <li><a href="account-delete.php">Delete your account permanently</a></li>
                </ul>
                <hr />
                <h3>Shopping</h3>
                <ul>
                    <li><a href="basket.php">View your Basket</a></li>
                    <li><a href="wishlist.php">View Your Wishlist</a></li>
                    <li><a href="order-history.php">View Your Order History</a></li>
                </ul>
            </div>
        </section>
        <section class="boc-dblue-bg">
            <div class="boc-grid-container">
                <?php include('includes/about-us.php')?>
            </div>
        </section>

    </main>
    
        <?php include('includes/footer.php'); ?>
<script type="text/javascript" src="javascript/sitewide.js"></script>
<script>

    function showHideOther(){
        if(document.getElementById('register-title').selectedIndex == 6){
            document.getElementById('otherholder').className = 'boc-show';
        } else {
            document.getElementById('otherholder').className = 'boc-hide';
        }
    }

    function validateRegisterForm(event) {
        event.preventDefault();
        var isValid = validateForm(document.getElementById('register-form'));
        if(isValid){ document.getElementById('register-form').submit(); }
    }

var captchaCode;

function createCaptcha() {
    var CharacterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#$%^&*";
    var captchaLength = 5;
    var captcha = [];
    for (var loopCount = 0; loopCount < captchaLength; loopCount++) {
        var index = Math.floor(Math.random() * CharacterList.length + 1); //get the next character from the array
        if (captcha.indexOf(CharacterList[index]) == -1){
            captcha.push(CharacterList[index]);
        } else {
            loopCount--;
        };
    }

    var canvasObj = document.createElement("canvas");
    canvasObj.width = 150;
    canvasObj.height = 50;
    canvasObj.id = "captcha";
    var ctx = canvasObj.getContext("2d");
    ctx.font = "30px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);
    //storing captcha so that can validate you can save it somewhere else according to your specific requirements
    captchaCode = captcha.join("");
    document.getElementById("captcha").appendChild(canvasObj); // adds the canvas to the body element
}


document.getElementById('register-form').addEventListener('submit', validateRegisterForm);
window.addEventListener('DOMContentLoaded', createCaptcha);
</script>
</body>
</html>