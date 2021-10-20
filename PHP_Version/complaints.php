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

    <title>Barry's Bargain Books :: Complaints</title>
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

        <?php 
    include('admin/includes/connection.php');



    include('includes/header.php'); ?>



    <main id="main">
        <section id="plain-text" class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Complaints Policy and Procedure</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Complaints</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">                                                                  
                <h2>Our aim:</h2>
                <p>Barry's Bargain Books (BBB) is committed to providing a quality service for its customers and working in an open and accountable way that builds the trust and respect of all our customers. One of the ways in which we can continue to improve our service is by listening and responding to the views of our customers, and in particular by responding positively to complaints, and by putting mistakes right.</p>
                <p>Therefore we aim to ensure that:</p>
                <ul>
                    <li>making a complaint is as easy as possible;</li>
                    <li>we treat a complaint as a clear expression of dissatisfaction with our service which calls for an immediate response;</li>
                    <li>we deal with it promptly, politely and, when appropriate, confidentially;</li>
                    <li>we respond in the right way - for example, with an explanation, or an apology where we have got things wrong, or information on any action taken etc;</li>
                    <li>we learn from complaints, use them to improve our service, and review annually our complaints policy and procedures.</li>
                </ul>
                <p>We recognise that many concerns will be raised informally, and dealt with quickly. Our aims are to:</p>
                <ul>
                    <li>resolve informal concerns quickly;</li>
                    <li>keep matters low-key;</li>
                    <li>enable mediation between the complainant and the individual to whom the complaint has been referred.</li>
                </ul>
                <p>An informal approach is appropriate when it can be achieved. But if concerns cannot be satisfactorily resolved informally, then the formal complaints procedure should be followed.</p>
                <h2>Preamble</h2>
                <p><strong>Definition:</strong> BBB defines a complaint as 'any expression of dissatisfaction (with BBB, with a member of staff or with any products) that relates to BBB and that requires a formal response'.</p>
                <p><strong>Purpose:</strong> The formal complaints procedure is intended to ensure that all complaints are handled fairly, consistently and wherever possible resolved to the complainant's satisfaction.</p>
                <p><strong>BBB's responsibility will be to:</strong></p>
                <ul>
                <li>acknowledge the formal complaint in writing;</li>
                <li>respond within a stated period of time;</li>
                <li>deal reasonably and sensitively with the complaint;</li>
                <li>take action where appropriate.</li>
                </ul>
                <p><strong>A complainant's responsibility is to:</strong></p>
                <ul>
                <li>bring their complaint, in writing, to BBB's attention normally within 8 weeks of the issue arising;</li>
                <li>raise concerns promptly and directly with a member of staff in BBB;</li>
                <li>explain the problem as clearly and as fully as possible, including any action taken to date;</li>
                <li>allow ALT a reasonable time to deal with the matter;</li>
                <li>recognise that some circumstances may be beyond BBB's control.</li>
                </ul>
                <p><strong>Responsibility for Action:</strong> All Staff of BBB.</p>
                <p><strong>Confidentiality:</strong> Except in exceptional circumstances, every attempt will be made to ensure that both the complainant and BBB maintain confidentiality. However the circumstances giving rise to the complaint may be such that it may not be possible to maintain confidentiality (with each complaint judged on its own merit). Should this be the case, the situation will be explained to the complainant.</p>
                <h2>Formal Complaints Procedure</h2>
                <p><strong>Stage 1</strong></p>
                <p>In the first instance, if you are unable to resolve the issue informally, you should write to the member of staff who dealt with you, or their manager, so that he or she has a chance to put things right. </p>
                <p>You can expect your complaint to be acknowledged within 4 working days of receipt. You should get a response and an explanation within 15 working days.</p>
                <p>Our contact details can be found on the <a href="contact-us.html" title="Link to our contact page">Contact Us</a> part of the BBB Website.</p>
                <p><strong>Stage 2</strong></p>
                <p>If you are not satisfied with the initial response to the complaint then you can write to BBB's Chief Executive and ask for your complaint and the response to be reviewed. You can expect the Chief Executive to acknowledge your request within 4 working days of receipt and a response within 15 workings days.</p>
                <p>BBB's aim is to resolve all matters as quickly as possible. However, inevitably some issues will be more complex and therefore may require longer to be fully investigated. Consequently timescales given for handling and responding to complaints are indicative. If a matter requires more detailed investigation, you will receive an interim response describing what is being done to deal with the matter, and when a full reply can be expected and from whom.</p>
                <p><span>This Policy is licensed for reuse under a&nbsp;</span><a href="https://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 Unported (CC BY-SA 4.0) licence</a><span>. You are welcome to adapt it for your own purposes, in which case please acknowledge this page as your source, applying a suitable attribution share alike licence on your own policy. Thank you.</span></p>


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