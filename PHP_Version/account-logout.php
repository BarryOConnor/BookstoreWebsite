<?php

// start the session
session_start();
//buffer the output because we want to redirect if successful after a timed event
ob_start();
//check the session to see if anyone is logged in, otherwise redirect to the login page
if (isset($_SESSION["current_user"])) { unset($_SESSION["current_user"]);  }
unset($_SESSION["basket"]);
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

    <title>Barry's Bargain Books :: Account Logout</title>
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
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Account Logout</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Account Login</span>
                </div>
            </div>

            <div class="boc-grid-container boc-pad-2">
                <h2>Successfully Logged Out</h2>
                <p>you have successfully logged out of your account</p>

                
                
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