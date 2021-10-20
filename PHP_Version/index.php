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

- This site uses fontawesome (https://fontawesome.com) for icons
- This page uses XML code and the getXMLContent function which are adapted from the XPath tutorials 
  available on W3CSchools at https://www.w3schools.com/xml/xpath_examples.asp
*/

     ####################################################################### -->

    <title>Barry's Bargain Books :: Home</title>
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


<?php  include('admin/includes/connection.php');
include('includes/header.php'); ?>


    <div id="carousel" class="boc-grey-bg">
        <div class="boc-lgrey-bg boc-max-container">
            <ul id="slideholder">
                <?php try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT * FROM carousel WHERE is_active=1 ORDER BY carouselID ASC;");
                    $stmt->execute();
                    $initial = " initial";
                    $slide_count=0;
                    while ($carousel = $stmt->fetch(PDO::FETCH_ASSOC)) { ?> 
                        <li class="slide<?php echo $initial; ?>" data-href="<?php echo $carousel['link']; ?>">
                            <img src="<?php echo $carousel['image']; ?>" alt="<?php echo $carousel['image_alt']; ?>" class="boc-hide-mobile" />
                            <img src="<?php echo $carousel['mobile_image']; ?>" alt="<?php echo $carousel['image_alt']; ?>" class="boc-show-mobile" />
                            <div class="caption"><?php echo $carousel['description']; ?></div>
                        </li>
                    <?php $initial= "";
                    $slide_count ++;
                    }
                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
                ?>
            </ul>
            <div id="carousel-dots" class="boc-grid-container">
                <button id="play-pause" type="button" title="play or pause the slideshow" tabindex="17"><span class="fas fa-pause"></span></button>
                <?php
                for ($loopcount = 0; $loopcount < $slide_count; $loopcount++) {
                    echo '<a href="javascript:gotoSlide(' . $loopcount . ',true)" onkeypress="javascript:gotoSlide(' . $loopcount . ',true)" class="dot active" title="go to slide number ' . $loopcount .'" tabindex="18"></a>';
                }?>
            </div>
            <!-- Next and previous buttons -->
            <a href="javascript:gotoSlide(-1,false)" class="prev" title="go to the previous slide" tabindex="15"><i class="fas fa-chevron-circle-left"></i></a>
            <a href="javascript:gotoSlide(1,false)" class="next" title="go to the next slide" tabindex="16"><i class="fas fa-chevron-circle-right"></i></a>
        </div>
                
    </div>




    <main id="main">
        <section class="boc-white-bg">
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Special Offers</h1>
            <div id="specials" class="boc-grid-container boc-grid-gap boc-pad-2 boc-4-cols">
                
                    <?php 
                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT * FROM books WHERE is_active=1 AND special=1 AND featured=1 ORDER BY title ASC");
                    
                    $stmt->execute();

                    include('includes/book-box.php');
                    
                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
                ?>  

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
<script type="text/javascript">

/* ----------------------------------------
               Carousel Code
---------------------------------------- 
Set up variables needed for the carousel
*/
var slideholder = document.getElementById("slideholder");
var slides = document.getElementsByClassName("slide");
var dots = document.getElementsByClassName("dot");
var pauseButton = document.getElementById('play-pause');
var currentIndex = 0, oldIndex = 0;
var playing = true;
var pauselength = 5000;
var slideInterval = setInterval(nextSlide, pauselength);

//function which selects the next item in the carousel and displays it
function nextSlide(){
    if (currentIndex + 1 > slides.length -1 ) { currentIndex = 0; oldIndex = slides.length -1; } else { oldIndex = currentIndex; currentIndex ++; };
    slides[oldIndex].className = "slide inactive";
    slides[currentIndex].className = "slide active"; 
    dots[oldIndex].className = "dot";
    dots[currentIndex].className = "dot active";
    setTimeout(function () { slides[oldIndex].className = "slide"; }, 2500);  
}

//function which handles the dots and next/prev buttons on the carousel
function gotoSlide(slideNo,dotPressed) {
    //stop the autoplay function while we change slide, otherwise the next slide won't have the full delay
    clearInterval(slideInterval);
    oldIndex = currentIndex;
    if(dotPressed){
        //go to the slide represented by the clicked dot
        if (slideNo > slides.length - 1) { currentIndex = 0 } else { currentIndex = slideNo };
    } else {
        if (slideNo == 1){
            //next button clicked
            if (currentIndex + 1 > slides.length - 1) { currentIndex = 0 } else { currentIndex ++};
        } else {
            //prev button clicked
            if (currentIndex + slideNo < 0) { currentIndex = (slides.length) + slideNo } else { currentIndex += slideNo};
        }
    }
    slides[oldIndex].className = "slide inactive";
    slides[currentIndex].className = "slide active"; 
    dots[oldIndex].className = "dot";
    dots[currentIndex].className = "dot active";
    setTimeout(function () { slides[oldIndex].className = "slide"; }, 2500);
    slideInterval = setInterval(nextSlide, pauselength);
}

//function to change the play/pause function and allow users to stop the carousel - required for accessibility as it can irritate people with some conditions
pauseButton.onclick = function(){
    if(playing){ 
        pauseButton.innerHTML = '<span class="fas fa-play">';
        playing = false;
        clearInterval(slideInterval);
    }
    else{ 
        pauseButton.innerHTML = '<span class="fas fa-pause">';
        playing = true;
        slideInterval = slideInterval = setInterval(nextSlide, pauselength);
    }
};


slideholder.addEventListener('click', function (e) {
    var target = e.target; // Clicked element
    while (target && target.parentNode !== slideholder) {
        target = target.parentNode; // If the clicked element isn't a direct child
        if(!target) { return; } // If element doesn't exist
    }
    if (target.tagName === 'LI'){
      document.location = target.getAttribute('data-href'); // Check if the element is a LI
    }
});

</script>
</body>
</html>