<?php

// start the session
session_start();
//buffer the output because we want to redirect if successful after a timed event
ob_start();
//check the session to see if anyone is logged in, otherwise redirect to the login page
if (isset($_SESSION["current_user"])) { header("Location: account.php"); }


include('admin/includes/connection.php');
if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/
    try {
        
        // prepare and bind
        $stmt = $connection->prepare("INSERT INTO users(title, name, dob, email, profile, genres, newsletter, username, password) VALUES (:title, :name, :dob, :email, :profile, :genres, :newsletter, :username, :password);");

        $genres ="";
        if(isset($_POST['genre'])){
            foreach($_POST['genre'] as $selected){
                $genres .= $selected . "|";
            }
            $genres = rtrim($genres, "|");
        }

        $title = isset($_POST['user-title']) ? trim($_POST['user-title']) : null;
        $name = isset($_POST['user-name']) ? trim($_POST['user-name']) : null;
        $dob = isset($_POST['user-dob']) ? trim($_POST['user-dob']) : null;
        $email = isset($_POST['user-email']) ? trim($_POST['user-email']) : null;
        $profile = isset($_POST['user-profile']) ? trim($_POST['user-profile']) : null;
        
        $newsletter = isset($_POST['user-newsletter']) ? trim($_POST['user-newsletter']) : 0;
        $username = isset($_POST['user-username']) ? trim($_POST['user-username']) : null;
        $password = isset($_POST['user-password']) ? trim($_POST['user-password']) : null;
        $password = hash('sha512', $password);
       

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindParam(':newsletter', $newsletter, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->bindParam(':genres', $genres, PDO::PARAM_STR);


        $return_value = $stmt->execute();
        
        
    } catch( PDOExecption $e ) {
        print "Error!: " . $e->getMessage() . "</br>";
    }

} ?>

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

    <title>Barry's Bargain Books :: Account Register</title>
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
                    <span class="current">Account Register</span>
                </div>
            </div>

            <div class="boc-grid-container boc-pad-2">
                <?php if (!empty($_POST)) { 
                        if($return_value) {   
                            echo "<h2>Account successfully created</h2>";
                            echo "<p class='boc-center'><a href='account-login.php'>Login with your new account</a></p>";
                        } else { 
                            echo "<h2>We were unable to create ac account</h2>";
                            echo "<p class='boc-center'>Please Try again or contact support <a href='contact-us.php'>using the contact us form</a></p>";
                        };

                } else { ?>
                <h2>Account Registration</h2>
                <p>Use the following form to register for an account.</p>

                <form id="register-form" class="validateThisForm" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this);" method="post">
                    <div>
                        <label for="user-title">Title:</label>
                        <div>
                            <select id="user-title" name="user-title" onchange="validateRequired(this);" data-validate="true" data-validation-type="required">
                                <option value="">--Please choose an option--</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Doctor</option>
                                <option value="Rev">Reverend</option>
                            </select>
                            <span id="user-title-msg"></span>
                        </div>
                    </div>

                    <div>
                        <label for="user-name">Name:</label>
                        <div>
                            <input type="text" id="user-name" name="user-name" placeholder="Full Name" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="user-name-msg"></span>
                        </div>
                    </div>

                     <div>
                        <label for="user-username">Username:</label>
                        <div>
                            <input type="text" id="user-name" name="user-username" placeholder="Username" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="user-username-msg"></span>
                        </div>
                    </div>

                     <div>
                        <label for="user-password">Password:</label>
                        <div>
                            <input type="text" id="user-password" name="user-password" placeholder="password" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="user-password-msg"></span>
                        </div>
                    </div>

                    <div>
                        <label for="user-dob">Date of Birth :</label>
                        <div>
                            <input type="date" id="user-dob" name="user-dob" value="" data-validate="true" data-validation-type="date" onBlur="validateDate(this);">
                            <span id="user-dob-msg"></span>
                        </div>
                    </div>

                    <div>
                        <label for="register-email">Email address:</label>
                        <div>
                            <input type="Email" id="user-email" name="user-email" placeholder="Email Address" value="" data-validate="true" data-validation-type="email"  onBlur="validateEmail(this);">
                            <span id="user-email-msg"></span>
                        </div>
                    </div>
                                        
                    <div>
                        <label for="user-profile">Profile Text:</label>
                        <div>
                            <textarea id="user-profile" name="user-profile" rows="4" cols="50" placeholder="Profile Text" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);"></textarea>
                            <span id="user-profile-msg"></span>
                        </div>
                    </div>

                    <div>
                        <label>Favourite Genres:</label>
                        <div class="boc-center-vert">
                            <fieldset>
                                <legend>Genres:</legend>
                                <?php try {
                                        // prepare and bind
                                        $stmt = $connection->prepare("SELECT genreID, name FROM genres ORDER BY name ASC;");

                                        $stmt->execute();
                    
                                        $select_content = "";

                                        while ($genre = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                            echo '<label for="genre-' . $genre['genreID'] . '">' . $genre['name'] . '<input id="genre-' . $genre['genreID'] . '" name="genre[]" value="' . $genre['genreID'] . '" type="checkbox" class="radio"></label>';
                                        }
                                    } catch( PDOExecption $error ) {
                                        print "Error!: " . $error->getMessage() . "</br>";
                                    } ?>
                            </fieldset>

                            <span id="genre-msg"></span>
                        </div>
                    </div>


                    <div>
                        <label for="user-newsletter">Newsletter:</label>
                        <div class="boc-center-vert">
                            <input type="checkbox" id="user-newsletter" name="user-newsletter" value="1">
                            <span id="user-newsletter-msg"></span>
                        </div>
                    </div>

                    <div>
                        <label for="register-name">Captcha:</label>
                        <div>
                            <div id="captcha"></div>
                            <input type="text" id="register-captcha" placeholder="Captcha" value="" data-validate="true" data-validation-type="captcha" onBlur="validateCaptcha(this);">
                            <span id="register-captcha-msg"></span>
                        </div>
                    </div>
                    <div>
                        <button type="reset" tabindex="7">Reset</button>
                        <button type="submit" tabindex="8">Submit</button>
                    </div>
                </form> 
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