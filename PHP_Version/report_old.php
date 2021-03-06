

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
                <h2>Research</h2>
                <p>I wanted the site to look and feel like what it is, a basic e-commerce site. To do this I took inspiration from several e-commerce platforms as well as high street book retailers, finding design features I liked or that were common and therefore expected.</p>
                <ul>
                    <li>Magento (e-commerce) - <a href="http://www.magento.com" target="_blank">http://www.magento.com</a></li>
                    <li>Shopify (e-commerce) - <a href="http://www.shopify.co.uk" target="_blank">http://www.shopify.co.uk</a></li>
                    <li>OpenCart (e-commerce) - <a href="http://www.opencart.com" target="_blank">http://www.opencart.com</a></li>
                    <li>Amazon (book retailer) - <a href="http://www.amazon.co.uk" target="_blank">http://www.amazon.co.uk</a></li>
                    <li>WHSmith (e-commerce) - <a href="http://www.whsmith.co.uk" target="_blank">http://www.whsmith.co.uk</a></li>
                    <li>Waterstones (e-commerce) - <a href="http://www.waterstones.com" target="_blank">http://www.waterstones.com</a></li>
                </ul>
 
                <hr />
                <h2>Overall Design</h2>
                <p>see wireframes section below for reference or <a href="images/wireframes/HomepageDesktop.png">open the homepage wireframe</a></p>
                <h3>Colours</h3>
                <p>Colours play a greater part in our lives than we imagine and their power extends into the web. Many articles have been written regarding this and my <a href="https://www.onlinepsychologydegree.info/psychology-color">research into the subject</a> showed that some colours are universally liked and trusted while some represent negative things and that even the sexes prefer different colours.</p>
                <p>For example, orange or yellow is seen as a cheap product - this is used to great effect by companies such as EasyJet and to a lesser extent Amazon (logo use). Purple is a colour really loved by women but generally not popular with men. Blue is universally liked by both sexes and inspires feelings of trust. This is why I chose blue as the main colour for the website and used variations of that colour to create an attractive palette.</p>
                <h3>Page Header</h3>
                <p>In the header several features were common. A prominent logo which returns the user to the homepage, a search bar to allow the user to search very quickly from anywhere on the site, Account and basket/shopping cart buttons to allow the user to access those features from anywhere on the site.  I incorporated these into my design so that users would feel at home with the website since it has features common to other booksellers. The page header contents change depending on screen size and have many tweaks to give the user a great experience on any screen size.</p>
                <h3>Menu</h3>
                <p>The menu on most sites is at the top of the page and comes in two versions - a desktop version which is horizontal and permanently on view and a mobile version which is vertical and hidden behind a "Burger Menu" (three horizontal lines). I have followed this trend and included some CSS aminations to make the menu visually appealing to use.
                <h3>Carousel</h3>
                <p>A carousel was prominent on the homepage of most of the sites, allowing for a very visual way of gaining the user's attention and displaying special offers or promotions. I wanted to include captions at the bottom of the slides and have used CSS transitions to make the slides animate, helping to gain the user's attention. Each slide is clickable and redirects to the product page for the book.</p>
                <p>for ease of use, I have included buttons on either side of the carousel to allow the user to move through the slides one at a time. I also included dots at the bottom of the carousel which allow the user to move to any of the slides. In terms of accessibility, The W3C Web Accessability Initiative <a href="https://www.w3.org/WAI/tutorials/carousels/animations/">suggests providing a way for users to pause the animated elements</a>, which I have also adopted for the website.</p>
                <p>Due to the letterbox shape of the images, the slideshow images can becomes too small on a mobile screen. To combat this, I have included mobile versions of the images, which are deeper in height and display at the correct screen sizes, making the carousel much easier to read on smaller screens.</p>
                <h3>Product Boxes</h3>
                <p>Many of the sites I looked at have used product boxes as a way of displaying many items together in a grid. These typically contain product imagery and information about the product, it's price and quick links to add the product to the user's shopping basket. I opted to include these and have used CSS to add some variation to the images by rotating and growing them on mouseover - the images themselves are offset at an angle to draw the user's eye.</p>
                <p>The product boxes are used sitewide and all come from the same XML document, various attributes and XPath queries allow for the various pages to only show content relevant to them.</p>
                <h3>Authors & Genres</h3>
                <p>Authors and genres are included with the site. I felt that their inclusion helped users to navigate and to ultimately find books similar or related to those they were purchasing. Reading about an author will be of interest to someone who likes their style of writing and listing other books written by that author offesrs the store owners an opportunity to cross-sell books to fans of the author.</p>
                <h3>Print Styles</h3>
                <p>The website has a custom print style which removes items which are not of use to the user and allows them to save money on ink and paper by only printing out the information they need. The style removes the header and footer, menu and the various buttons on the site which don't contribute to the information regarding the books on the page.</p>

                <hr>
                <h2>Responsive & Accessibility Concerns</h2>
                <h3>Responsive websites</h3>
                <p>Responsive websites are websites which respond to the screen size of the device they are being viewd on, adjusting content layout to give users the best possible experience on whichever device they are using.</p>
                <p>Designing sites in this way is amodern requirement with so many customers opting to view a website on their mobile or tablet as well as on their desktop. It was important to include this feature into the website. There are several reasons to do this,but for businesses the main reason is commercial. Simply put, if a customer cannot use your website on their chosen device, they will simply go elsewhere and not return. This makes it imperitive for businesses who sell any products or services to ensure that their site is usable and that a customer can get the information they need and ultimately buy the products they came to the website to buy.</p>
                <p>This website is fully responsive and works well in all browsers and screen sizes</p>
                <h3>Accessibility</h3>
                <p>Accessibility is the term given to the process of making a website accessible to all, including those with physical disability or impairment. Doing so is a <a href="https://www.gov.uk/guidance/accessibility-requirements-for-public-sector-websites-and-apps">legal requirement under UK law</a> and also constitutes an ethical and commercial issue. Ethically, it's simply unfair to exclude people from your products and services and losing those customers if your site is unusable for them has a real commercial impact.</p>
                <p>I wanted this website to be accessible and have included many features and design choices to enable this. The following lists the main steps I have taken in doing so.</p>
                <h4>Color & Contrast</h4>
                <p>Color blindness and impaired vision can impact a users experience. <a href="https://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-contrast.html">The W3C recommendations discussing contrast</a> are that the background and foreground colours of a website should have a certain ratio in order to be readable. AA standard sets this number at a ratio of 4.5, while at AAA level this number increases to 7.2<p>
                <p>In order to allow my site to be readable by the vast majority of users, I have opted to follow the AAA guidelines and all colour combinations used in this website adhere to the contrast ratio of 7.2 between foreground and background colours</p>
                <h4>Text Size</h4>
                <p>For those with visual impairment, be that through disability or even old age, reading small text can become problematic. This can make the text on a website difficult to read and tiring on the eyes. To make this site as accessible as possible, I have included links at the top of the page which permanently change (using cookies) the base text size for the website. These links allow the user to decide a comfort level in terms of text size which suits them quickly and easily.</p>
                <h3>Input Devices</h3>
                <p>Not everyone access a website using a mouse or via a touchscreen. In every step of building this site I wanted to make it keyboard accessible. To do this I have coded focus events for all links and items that can be interacted with creating a visible cursor which allows someone using a keyboard to tab around the screen and use the website without a mouse.</p>
                <h4>Skip To Content Button</h4>
                <p>When using a screen reader or keyboard, it becomes incredibly frustrating having to work through all of the links in a menu. <a href="https://www.w3.org/TR/WCAG20-TECHS/G1.html">W3C recommend creating a "skip to content" link</a> to help alleviate this. I have included a feature which picks up the first time a user presses Tab and allows them to click an otherwise hidden link which scrolls focus to the main content of the page, skipping the menu. This will make the site much more efficient for users who rely on a keyboard or screenreader.</p>

                <hr>
                <h2>Wireframes</h2>
                <p>I spent a large amount of time wireframing the website before beginning my design. I wanted to experiment with the structure and layout of the site before having to think about colours and code. I have produced wireframes for most major pages on the site, and their mobile versions as well. These are obviously a large amount of space on the report, so I have minimised them on this page. Please use the following links to view any pages you wish to see the wireframes for.</p>

                <div class="boc-4-cols">
                    <div><a href="images/wireframes/HomepageDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/HomepageDesktop.png" alt="wireframes of the homepage on a desktop screen" /><span>Homepage (Desktop)</span></a></div>
                    <div><a href="images/wireframes/HomepageMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/HomepageMobile.png" alt="wireframes of the homepage on a mobile screen" /><span>Homepage (Mobile)</span></a></div>
                    
                    <div><a href="images/wireframes/CategoryDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/CategoryDesktop.png" alt="wireframes of the genre on a desktop screen" /><span>Genre (Desktop)</span></a></div>
                    <div><a href="images/wireframes/CategoryMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/CategoryMobile.png" alt="wireframes of the genre on a desktop screen" /><span>Genre (Mobile)</span></a></div>
                    
                    <div><a href="images/wireframes/ProductDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/ProductDesktop.png" alt="wireframes of the product page on a desktop screen" /><span>Product (Desktop)</span></a></div>
                    <div><a href="images/wireframes/ProductMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/ProductMobile.png" alt="wireframes of the product page on a desktop screen" /><span>Product (Mobile)</span></a></div>
                    
                    <div><a href="images/wireframes/ContentDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/ContentDesktop.png" alt="wireframes of the content page on a desktop screen" /><span>Content (Desktop)</span></a></div>
                    <div><a href="images/wireframes/ContentMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/ContentMobile.png" alt="wireframes of the content page on a desktop screen" /><span>Content (Mobile)</span></a></div>

                    <div><a href="images/wireframes/AuthorDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/AuthorDesktop.png" alt="wireframes of the author page on a desktop screen" /><span>Author (Desktop)</span></a></div>
                    <div><a href="images/wireframes/AuthorMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/AuthorMobile.png" alt="wireframes of the author page on a desktop screen" /><span>Author (Mobile)</span></a></div>

                    <div><a href="images/wireframes/RegisterDesktop.png" target="_blank" class="wireframe"><img src="images/wireframes/RegisterDesktop.png" alt="wireframes of the author page on a desktop screen" /><span>Register (Desktop)</span></a></div>
                    <div><a href="images/wireframes/RegisterMobile.png" target="_blank" class="wireframe"><img src="images/wireframes/RegisterMobile.png" alt="wireframes of the author page on a desktop screen" /><span>Register (Mobile)</span></a></div>
                </div>

                <h3>Changes in the final design</h3>
                <h4>Genre & Author Page changes</h4>
                <p>Some changes to the wireframes were needed as the build progressed. These mainly happened in the Author and Genre sections. These sections were intended to feature a lot of books and would, therefore allow for a lot of information to be presented and gathered about which books were the most popular in that genre etc. The limited number of books in this demo made that layout appear weak onscreen. I changed this to a simpler version which allows the user to view books relating to the author or to the genre in a more compact way.</p>
                <h4>Menu changes</h4>
                <p>The wireframes use a menu which didn't really do as well on the screen. It made more sense for the basket and account buttons to always be onscreen at both mobile and desktop sizes. I changed the design from the wireframes which included these in the menu, to a more east to use design.</p>




                
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