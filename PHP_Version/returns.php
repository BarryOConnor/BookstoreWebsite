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

    <title>Barry's Bargain Books :: Returns</title>
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
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Returns Policy</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Returns Policy</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">
                <h2>Returns</h2>
                <p>If you are a customer in the European Economic Area (EEA), you get 14 calendar days to cancel your order because you have changed your mind. This two week cancellation period starts from the day you have received all of the items in your order.</p>

                <p>If you receive faulty goods, you may also have a right to return these goods and to ask us to replace them or get a refund.</p>

                <h2>Faulty Goods</h2>
                <p>Please return your item(s) to us within 30 days after finding the fault, and remember to get in touch before returning. You can do this by going to the 'Contact Us' section and a member of our team will look into it.</p>

                <p>Please don’t use any faulty items after finding the fault, or we may not be able to provide a refund.</p>
 
                <h2>Contacting Us</h2>
                <p>There are a couple of ways to contact us. You’ll find these alternative methods below:</p>

                <p>Email us: <a href="mailto:customerservices@barrysbargainbooks.com">customerservices@barrysbargainbooks.com</a></p>

                <p>Write to us via post: <address>13 Anytown Street, Any Town Any County United Kingdom XX13 XDA</address></p>

                <p>All returns are quality checked – items should be returned in a new and unused condition with labels attached and wherever possible sent back in the original packaging. Refunds will not be given if they do not comply with our returns policy.</p>
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