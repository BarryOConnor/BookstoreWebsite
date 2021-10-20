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

    <title>Barry's Bargain Books :: Privacy Policy</title>
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
        <section id="plain-text" class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Privacy Policy</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Privacy Policy</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">
                <p>Barry's Bargain Books are committed to preserving the privacy of our clients and website visitors. Please read the following privacy policy which explains how we use and protect the information that you provide.</p>
                <p><strong>Last updated: 25 May 2018</strong></p>
                <h2>Data we collect from you</h2>
                <p>Barry's Bargain Books collects data about you:</p>
                <ul>
                <li>when you request services or otherwise provide us with your personal details (such as your name, contact details, e-mail address etc.); and</li>
                <li>from your usage of the website and any other information you post on the website, e-mail or otherwise sent to us. By subscribing through the website you consent to the collection, storage, use and transfer of your data by us in accordance with the terms of this privacy policy.</li>
                </ul>
                <h2>Subscribing</h2>
                <p>You can subscribe on this website to receive information from us, including general updates, products, services or news. You can unsubscribe at any time by clicking on the “click here to unsubscribe” link provided in our emails or <a href="contact-us.html">contacting us</a> by telephone or email.</p>
                <h2>Use of Data</h2>
                <p>We will only use your data:</p>
                <ul>
                <li>to supply you with the products, services and information which you have requested including advising you of any security updates by way of newsletters, events and seminars; and</li>
                <li>to help improve our services generally.</li>
                </ul>
                <p>We may contact you by post or telephone as well as by e-mail. If you change your mind about being contacted in the future by any of these means then <a href="contact-us.html">please let us know</a>.</p>
                <h2>Security</h2>
                <p>All information you provide to us is stored on secure servers with industry standard anti-virus and firewall protection in place.</p>
                <p>Unfortunately, the transmission of information via the internet is not completely secure.  Although we will do our best to protect your personal data, we cannot guarantee the security of your data transmitted online or through the website. Any transmission is at your own risk. Once we have received your information, we use strict procedures and security features to try to prevent unauthorised access.</p>
                <h2>Disclosure of data</h2>
                <p>We process all data in accordance with the EU General Data Protection Regulation. We may disclose your data to other third parties who act for us in order to provide the information you have requested. Unless required to do so by law, we will not otherwise share, sell or distribute any of the data you provide to us without your consent.</p>
                <h2 id="cookies">Cookies</h2>
                <p>A “cookie” is a piece of software that attaches to the hard drive of your computer and remembers information about the configuration of your computer. We use cookies to track visitors’ movements through the website, store customer preferences and to store information necessary for the smooth running of a shopping cart on a website. You can manage your browser settings to allow sites to save and read cookie data.</p>
                <p>A “cookie” is a piece of software that attaches to the hard drive of your computer and remembers information about the configuration of your computer. We use cookies to track visitors’ movements through the website. You can manage your browser settings to allow sites to save and read cookie data.</p>
                <h2>Your rights</h2>
                <p>You have the right to ask for a copy of the data held by us in our records. You also have the right to require us to correct any inaccuracies in your data or delete your data.</p>
                <h2>Consent</h2>
                <p>So far as receipt of any updates by way of newsletters etc, you can withdraw your consent at any time. Please <a href="/contact/">contact us</a> to inform us of your wish to withdraw consent.</p>
                <h2>Changes</h2>
                <p>We may make changes to this policy from time to time and any changes will be posted on this page.</p>
                <h2>Contact us</h2>
                <p>If you have any queries or concerns regarding the use of your data or this policy then please contact Barry's Bargain Books on 0123456789. We will make all efforts to deal with any requests or concerns as speedily as possible.</p>
                <p>If we are unable to resolve any issue to your satisfaction, you have the right to complain to the Information Commissioner’s Office. Contact information can be found at <a href="https://ico.org.uk/global/contact-us/" target="_blank" rel="noopener">https://ico.org.uk/global/contact-us/</a></p>
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