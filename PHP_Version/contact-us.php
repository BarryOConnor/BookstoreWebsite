<?php session_start(); ?>

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

    <title>Barry's Bargain Books :: Contact Us</title>
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
<body>
    <!-- screenreader / keyboard link displayed offscreen to allow skipping the menu and accessing main content -->
    <a class="skip-main" href="#main">Skip to main content</a>

    <!-- cookie bar to allow for GDPR compliance -->
    <div id="cookiebar"><p>This website uses cookies</p>
        <button type="button" onclick="viewCookieInfo();" onkeypress="viewCookieInfo();">Read More</button>
        <button type="button" onclick="acceptCookies();" onkeypress="acceptCookies();">Accept Cookies</button>
    </div>

<?php 
    include('admin/includes/connection.php');



    include('includes/header.php'); 

 if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/


        $name = isset($_POST['contact-name']) ? trim($_POST['contact-name']) : null;
        $reason = isset($_POST['contact-reason']) ? trim($_POST['contact-reason']) : null;
        $email = isset($_POST['contact-email']) ? trim($_POST['contact-email']) : null;
        $message = isset($_POST['contact-message']) ? trim($_POST['contact-message']) : null;
        


        $to = "n0813926@my.ntu.ac.uk";
        $subject = $reason . " : from the website";
        $headers = "From: " . $email . "\r\n";

        //mail($to,$subject,$message,$headers);

        //mail on the server doesnt work...  commented out because of that



}
?>







    <main id="main">
        <section class="boc-white-bg">
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Contact Us</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Contact Us</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">
                <?php if (!empty($_POST)) {

                    echo '<h2>Thank you</h2>';
                    echo '<p>Your comments have been delivered, we will get in touch if necessary</p>';

                } else { ?>

                <h2>Drop us an Email</h2>
                <p>The quickest way to get in contact with us is to use the following form</p>

                <form id="contact-form" name="contact-form" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this);" method="post">
                    <div>
                        <label for="contact-name">Name:</label>
                        <div>
                            <input type="text" id="contact-name" name="contact-name" placeholder="Full Name" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="contact-name-msg"></span>
                        </div>
                    </div>
                    <div>
                        <label for="contact-email">Email address:</label>
                        <div>
                            <input type="Email" id="contact-email" name="contact-email" placeholder="Email Address" value="" data-validate="true" data-validation-type="email"  onBlur="validateEmail(this);">
                            <span id="contact-email-msg"></span>
                        </div>
                    </div>
                    <div>
                        <label for="contact-reason">Contact Reason:</label>
                        <div>
                            <select id="contact-reason" name="contact-reason" onchange="validateRequired(this);" data-validate="true" data-validation-type="required">
                                <option value="">--Please choose an option--</option>
                                <option value="question">Ask a Question</option>
                                <option value="support">Get Support</option>
                                <option value="complaint">Make a Complaint</option>
                                <option value="return">Return an Item</option>

                            </select>
                            <span id="contact-reason-msg"></span>
                        </div>
                    </div>
                    <div>
                        <label for="contact-message">Message:</label>
                        <div>
                            <textarea id="contact-message" name="contact-message" rows="4" cols="50" placeholder="Message Content" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);"></textarea>
                            <span id="contact-message-msg"></span>
                        </div>
                    </div>
                    <div>
                        <button type="reset" tabindex="7">Reset</button>
                        <button type="submit" tabindex="8">Submit</button>
                    </div>
                </form> 
                <hr />
                <h2>Send us a letter</h2>
                
                <p>Write to us at: <address>13 Anytown Street, Any Town Any County United Kingdom XX13 XDA</address></p>
                <?php } ?>
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
        if(document.getElementById('contact-reason').selectedIndex == 5){
            document.getElementById('otherholder').className = 'boc-show';
        } else {
            document.getElementById('otherholder').className = 'boc-hide';
        }
    }

    function validateContactForm(event) {
        event.preventDefault();
        var isValid = validateForm(document.getElementById('contact-form'));
        if(isValid){ document.getElementById('contact-form').submit(); }
    }

document.getElementById('contact-form').addEventListener('submit', validateContactForm);
</script>
</body>
</html>