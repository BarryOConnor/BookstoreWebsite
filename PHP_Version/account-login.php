<?php

// start the session
session_start();
//buffer the output because we want to redirect if successful after a timed event
ob_start();
//check the session to see if anyone is logged in, otherwise redirect to the login page
if (isset($_SESSION["current_user"])) { header("Location: account.php"); }


include('admin/includes/connection.php');


$loginfail = false;

 if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/

    try {
        // prepare and bind
        $stmt = $connection->prepare("SELECT COUNT(userID) as results, userID FROM users WHERE username=:username AND password=:password;");

        $username = isset($_POST['login-username']) ? trim($_POST['login-username']) : null;
        $password = isset($_POST['login-password']) ? trim($_POST['login-password']) : null;
        $password = hash('sha512', $password);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($result['results'] > 0){
            //login complete
            $_SESSION["current_user"] = $result['userID'];

            
            $stmt = $connection->prepare("SELECT contents FROM basket WHERE userID=:id;");
            $stmt->bindParam(':id', $result['userID'], PDO::PARAM_INT);
            $stmt->execute();

            while ($contents = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $str = $contents['contents'];
                $str = substr($str, 1, strlen($str)-2);
                $basket_array = explode("][",$str);
                foreach($basket_array as $curr_item){
                    $item_array = explode("|",$curr_item);
                    $_SESSION['basket'][$item_array[0]] = array('id' => $item_array[0], 'title' => $item_array[1], 'quantity' => $item_array[2], 'price' => $item_array[3], 'image' => $item_array[4] );
                }
            }   



            header("Location: account.php");
        } else {
            $loginfail = true;
        }

    } catch( PDOExecption $error ) {
        print "Error!: " . $error->getMessage() . "</br>";
    }

}
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

    <title>Barry's Bargain Books :: Account Login</title>
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
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Account Login</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Account Login</span>
                </div>
            </div>

            <div class="boc-grid-container boc-pad-2">
                <h2>Account Login</h2>
                <p>Please login using your account details</p>

                <form id="login-form" class="validateThisForm" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this);" method="post">
                    

                    <div>
                        <label for="login-username">Username:</label>
                        <div>
                            <input type="text" id="login-username" name="login-username" placeholder="username" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="login-username-msg"></span>
                        </div>
                    </div>
                    <div>
                        <label for="login-password">Password:</label>
                        <div>
                            <input type="password" id="login-password" name="login-password" placeholder="password" value="" data-validate="true" data-validation-type="required" onBlur="validateRequired(this);">
                            <span id="login-password-msg"></span>
                        </div>
                    </div>
                    <?php if($loginfail) {
                        echo "<p class='error'>Login credentials not valid</p>";
                    }?>
                    <div>
                        <button type="reset" tabindex="7">Reset</button>
                        <button type="submit" tabindex="8">Submit</button>
                    </div>
                    <p><a href="account-register.php">Not got an account? Sign up here</a></p>
                </form> 
                
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

</body>
</html>