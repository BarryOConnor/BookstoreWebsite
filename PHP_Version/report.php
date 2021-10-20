

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

    <title>Barry's Bargain Books :: Report</title>
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

    <!-- main header for the site -->
    <header class="boc-lblue-bg">
        <div class="boc-grid-container boc-header-cols">
            <div>
                <!-- Logo with link to home page -->
                <a href="index.php" title="retrun to the home page"><img src="images/logo.png" alt="Logo for Barry's Bargain Books" /></a>
            </div>
            <div>
                <!-- Text size functionality to allow visually impaired users to increase text size up to 200% -->
                <a href="#" class="text-100" onclick="changeFontSize(100);" onkeypress="changeFontSize(100);" title="set page text size to 100%">A</a>
                <a href="#" class="text-150" onclick="changeFontSize(150);" onkeypress="changeFontSize(150);" title="set page text size to 150%">A</a>
                <a href="#" class="text-200" onclick="changeFontSize(200);" onkeypress="changeFontSize(200);" title="set page text size to 200%">A</a>
                
                <!-- search form -->
                <form id="search-form" action="search.html">
                    <input type="search" id="search-field" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <span id="search-field-msg"></span>
                </form>
            </div>
            <div id="header-buttons">
                <!-- Buttons to access Shopping Basket and Account -->
                <button type="button" onclick="openAccount();" onkeypress="openAccount();"><i class="fas fa-user"></i>Account</button>
                <button type="button" onclick="openBasket();" onkeypress="openBasket();"><i class="fas fa-shopping-cart"></i>Basket</button>
            </div>  
        </div>
    </header>



    <nav id="main-menu" class="boc-black-bg">
        <!-- menu on tablets and screens -->
        <ul class="boc-grid-container boc-hide-mobile">
            <li><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li><a href="coming-soon.html"><span><i class="far fa-book" aria-hidden="true"></i>Coming Soon</span></a></li>
            <li><a href="genres.html"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a></li>
            <li><a href="authors.html"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a></li>
            <li><a href="special-offers.html"><span><i class="fas fa-tags" aria-hidden="true"></i>Special Offers</span></a></li>
            <li class="active"><a href="report.html"><span><i class="far fa-file-code" aria-hidden="true"></i>Report</span></a></li>
        </ul>

        <!-- menu for mobiles -->
        <a class="boc-menu-button boc-show-inline-mobile" href="javascript:void(0);" onclick="toggleMenu()" onkeypress="toggleMenu()" title="Toggle Navigation Menu"><span class="fa fa-bars"></span></a>
        <a class="boc-account boc-show-inline-mobile" href="basket.html"><i class="fas fa-shopping-cart"></i>Basket</a>
        <a class="boc-account boc-show-inline-mobile" href="account.html""><i class="fas fa-user"></i>Account</a>
        <ul id="dropdown-nav" class="boc-black-bg boc-grid-container boc-hide">
            <li><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li><a href="coming-soon.html"><span><i class="far fa-book" aria-hidden="true"></i>Coming Soon</span></a></li>
            <li><a href="genres.html"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a></li>
            <li><a href="authors.html"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a></li>
            <li><a href="special-offers.html"><span><i class="fas fa-tags" aria-hidden="true"></i>Special Offers</span></a></li>
            <li class="active"><a href="report.html"><span><i class="far fa-file-code" aria-hidden="true"></i>Report</span></a></li>
        </ul>
    </nav>




    <main id="main">
        <section id="plain-text" class="boc-white-bg">
           
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Report</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Report</a>
                    <span class="separator">></span>
                    <span class="current">Report</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">
              
                <h2>Previous Report</h2>
                <p>Please see <a href="report_old.php">the previous report for information about the site's accessibility, colour and layout choices and responsive features</a>. This was discussed indepth previously and should not need further discussion here.</p>

                <hr />

                <h2>UDON Missing File Upload Capabilities</h2>
                <p><img src="images/report/php_ini.png" alt="screenshot showing missing functionality on Udon server" />
                <p>Udon server is missing some of the variables in php.ini needed to allow file upload by the user, the lack of a temp directory for this prohibits the use of this feature since there is no folder to upload to. Were this feature available, I would have used this to allow the user to upload files and use the existing code to easily select from images to use as artwork for books etc. Currently I have set up the admin section to allow the selection of existing files.</p>

                <hr />

                <h2>Security</h2>
                <h3>Injection Attack Prevention</h3>
                <p>All SQL statements used throughout the site are <abbr title="PHP Data Objects">PDO</abbr>, which have been configured to run with the "PDO::ATTR_EMULATE_PREPARES" option set to false. This setup allows for the use od prepared statements, which are SQL statements with parameters which are sanitized before use. This allows for protection against injection attacks since all data used in a parameter will be scrutinised before being used. By default, Emulated Prepare statements are used by PHP and these are still able to be fooled by a skilled hacker, by turning that feature off with the option mentioned above, the task becomes much more difficult. See <a href="https://www.php.net/manual/en/pdo.prepared-statements.php">the PHP Documentation</a> for further information regarding this</p>

                <hr />

                <h2>PHP Backend</h2>
                <p><a href="/admin/">access the administrator area</a> using the username "barryoconnor", password "password"</p>
                <p>A secure PHP based backend to the site has been developed with a simple, responsive interface. This area is available only to administrators and is accessed via a login which takes the credentials from a separate table within the database, keeping users of the website completely separate from administrators.  This area allows the admin user full control over the following items:</p>
                <h3>Carousel Images</h3>
                <p>The administrator can control all information regarding the contents of the carousel on the home page of the website. This allows for the images to be changed, special offers updated, and also allows the underlying links to be updated.</p>
                <h3>Books</h3>
                <p>The administrator can control all information regarding a book from these pages. Books can be added, deleted and updated and all of the information regarding a book itself can be edited with ease. Book information includes the ability to link a book to Genre and Author and select cover artwork. It is also possible to configure the book as being on special offer, changing the prices accordingly, or featured on the homepage which will show the book on the front page.</p>
                <h3>Genres</h3>
                <p>The administrator can control all information regarding a Genre from these pages. Genres act as categories within the website and a many books can be linked to these. These are reflected dynamically on the front end menu, although it should be pointed out that for very large websites this will not be practical as the menu would grow too large but this can easily be compensated for by having subsections on the page with links to the genres. An administrator can edit a genre and select an image to represent it in listings as well as making the genre active/inactive (useful for draft versions).</p>
                <h3>Authors</h3>
                <p>The administrator can control all information regarding an Author from these pages. Authors are also visible on menu items on the front end and can be selected by a user. As with genres, books can be linked to these and again, this feature is only suitable for small sites such as this as the menu would grow unwieldy with many authors. An admin can edit an author and select an author image and enter some biography about the author to give the user some additional information about their favourite author.</p>
                <h3>Reviews</h3>
                <p>The administrator can control all information regarding a Review from these pages. Reviews are positive phrases often seen on books, showing that a reviewer for say, The Sunday Times has read the book and commented on it positiovely. These can be entered and attached to a book so that they are displayed on the book pages with the aim of boosting sales by showing that a trusted source has recommended the book.</p>
                <h3>Users</h3>
                <p>The administrator can control all information regarding Users from these pages. This allows for a password reset etc. The passwords are SHA-512 encrypted so even an admin cannot find out what password is used, only supply a new password.</p>
                <h3>Administrators</h3>
                <p>The administrator can control all information regarding Administrators from these pages. This allows for the management of accounts that can access the Administrator back end.</p>

                <hr />

                <h2>Front End</h2>
                <h3>Includes</h3>
                <p>For repeated content like the footer, menu and the product boxes repeated across the site, the site uses PHP includes so that the site remains easy to maintain. This allows for future developers to update the content in one place and have it reflect sitewide rather than change it in every page.</p>

                <hr />

                <h2>Dynamic Content</h2>
                <h3>Menu</h3>
                <p>The menu options for Genre and Author are fully dynamic and able to be changed by an administrator in the back end. This gives a large amount of control and the ability to change these menus as needed.</p>
                <h3>Special Offers</h3>
                <p>The administrator has the option to set books as being on special offer in the administrator area, these changes are reflected in the special offers section of the frontend of the website</p>
                <h3>Carousel</h3>
                <p>The administrator has the option to set change all elements of the carousel and add new items if required. This allows for a great deal of control over the initial thing that users will see and helps in redirecting customers to special offers or deals currently happening.</p>
                <h3>Featured</h3>
                <p>The administrator has the option to set books as being featured on the homepage, this will allow for up to 4 items to be displayed on the front page for special attention.</p>
                
                <hr />
                <h2>Shopping Basket</h2>
                <p>The shopping basket uses Sessions and AJAX to allow customers to add items to the basket without the need of redirection, which makes for a much smoother shopping experience. Instead, confirmations appear via a CSS/Javascript popup which helps keep the costomer up to date.</p>
                <p>The Basket Button features a rollover effect which displays a basic version of the basket contents so customers can quickly check contents without having to navigate to the basket page itself.</p>
                <p>The Basket page allows a customer to edit their basket fully, adding more items or removing them. This information is stored in a session variable and accessed on each page.</p>

                <hr />

                <h2>Account only Features</h2>
                <h3>Wishlist</h3>
                <p>Customers can make use of the wishlist functionality available throughout the site to add items to a wihlist for future reference. This uses AJAX like the basket and so does not interrupt the shopping experience. By visiting the Wishlist page, customers can remove items they no longer want on their wishlist</p>
                <h3>Saving their basket to the database</h3>
                <p>Once logged in, a customer can save their basket to the database for longterm storage of items they may wish to purchase at a later date. This feature is only available to customers with an account.</p>
                <h3>Checkout</h3>
                <p>Once logged in, a customer can proceed with the checkout process - in this case the checkout completes automatically, saving the basket to an orders table in the database. Once completed, past orders will be available in the Order History page.</p>
                <h3>Order History</h3>
                <p>once a customer has logged in, they have full access to previously completed orders and can use this feature to review their past purchases</p>

                <hr />
                <h2>Comparison to Competitors</h2>
                <p>As discussed in the previous report, I wanted the website to emulate well known book sites such as <a href="http://www.amazon.co.uk" target="_blank">Amazon</a>, <a href="http://www.whsmith.co.uk" target="_blank">WHSmith</a>, <a href="http://www.waterstones.com" target="_blank">Waterstones</a></p>
                <p>The site contains a large percentage of the features that make those sites work so well.  The ability to control menus, carousel, featured items andspecial offers, gives a great way of cross selling. COmbined with the ability to recommend books by the same author or within a given genre, there are many ways to show products to a customer.
                <p>The shopping basket is simple to use and does not interrupt the shopping experience, as does the wishlist. This allows a customer to shop without losing their train of theought by being redirected around the site.</p>
                <p>Additional features like saving the shopping cart or reviewing previous orders make for a feature rich experience which is comparable to the sites mentioned above</p>

                <h2>Third Party Software</h2>
                <p>Micromodal.js - <a href="https://micromodal.now.sh/">https://micromodal.now.sh/</a> was used in the admin section to create popup dialog boxes to house the image selection libraries.</p>




                
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