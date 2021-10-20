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

    <title>Barry's Bargain Books :: Delivery</title>
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



    include('includes/header.php'); ?>



    <main id="main">
        <section class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">UK Delivery</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Delivery</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2 boc-3-cols boc-grid-gap">
                <div>
                    <h2 class="boc-center">Uk Next Day Delivery</h2>
                    <p class="boc-center"><img src="images/royal-mail-logo.jpg" alt="Royal Mail logo" class="boc-center" /><em>(Royal Mail Tracked 24)</em></p>

                    <p class="boc-pre-line">Place your order before 4pm Monday - Friday for delivery on the next working day.

                    Place your order before 1pm Sunday for delivery on the next working day.

                    Orders over £500 will require a signature.
                    Delivery to remote locations may take 2 working days.

                    Spend over £60 - Free Delivery
                    Spend between £25 and £59.99 - £2 delivery
                    Spend under £25 - £4.50</p>
                </div>
                <div>
                    <h2 class="boc-center">Uk Standard Delivery</h2>
                    <p class="boc-center"><img src="images/royal-mail-logo.jpg" alt="Royal Mail logo" class="boc-center" /><em>(Royal Mail Tracked 48)</em></p>
                    

                    <p class="boc-pre-line">Place your order before 4pm Monday - Friday for delivery within the next two working days.

                    Place your order before 1pm Sunday for delivery on the next working day.

                    Spend over £25 - Free Delivery
                    Spend under £25 - £2.95 delivery</p>
                </div>
                <div>
                    <h2 class="boc-center">Uk 9am Guaranteed Delivery</h2>
                    <p class="boc-center"><img src="images/royal-mail-logo.jpg" alt="Royal Mail logo" class="boc-center" /><em>(Royal Mail 9am Guaranteed)</em></p>

                    <p class="boc-pre-line">Place your order before 4pm Monday - Friday for delivery before 9am on the next working day.

                    Place your order before 1pm Sunday for delivery before 9am on the next working day.
                    
                    Orders will require a signature.

                    All orders - £6.00</p>
                </div>
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