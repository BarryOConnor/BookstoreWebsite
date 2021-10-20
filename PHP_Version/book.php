<?php session_start();  
    include('admin/includes/connection.php');
if(isset($_GET['id'])){
    try {
        // query the database with the page information 
        $stmt = $connection->prepare("SELECT * FROM books WHERE bookID=:id;");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();


        $book = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch( PDOExecption $error ) {
        print "Error!: " . $error->getMessage() . "</br>";
    }
}?> 

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

     ####################################################################### -->

    <title>Barry's Bargain Books :: <?php echo isset($_GET['id']) ? $book['title'] : "No Book Selected"; ?></title>
    <meta name="description" content="Barry's Bargain Books: Discover your next favourite book from our list of fantastic books to read!">
    <meta name="keywords" content="<?php echo isset($_GET['id']) ? $book['title'] : "No Book Selected"; ?>books, buy books, books online, paperback books, favourite book, reading, discounted, cheap">
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

    <?php  include('admin/includes/connection.php');
include('includes/header.php'); ?>




    <main id="main">
        <section class="boc-white-bg">
            
            <h1 id="replace-title" class="boc-mblue-bg boc-pad-1 boc-center"><?php echo isset($_GET['id']) ? $book['title'] : "No Book Selected"; ?></h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span id="replace-breadcrumb" class="current"><?php echo isset($_GET['id']) ? $book['title'] : "No Book Selected"; ?></span>
                </div>
            </div>
                    <?php if(isset($_GET['id'])){ 

                        try {
                            // query the database with the page information 
                            $stmt = $connection->prepare("SELECT * FROM authors WHERE authorID=:id;");
                            $stmt->bindParam(':id', $book['authorID'], PDO::PARAM_INT);
                            $stmt->execute();

                            $author = $stmt->fetch(PDO::FETCH_ASSOC);

                        } catch( PDOExecption $error ) {
                            print "Error!: " . $error->getMessage() . "</br>";
                        } ?>

                        


            <div id="product-full" class="boc-grid-container boc-grid-gap boc-pad-2 boc-1-2-1-cols">
                <div class="image-col">
                    <img src="<?php echo $book['image']; ?>" alt="Book cover of the book <?php echo $book['title']; ?>">
                </div>
                <div class="content-col">
                    <h2><?php echo $book['title']; ?></h2>
                    <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$book['short_desc'].'</p>'); ?>
                    <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$book['long_desc'].'</p>'); ?>
                    <div id="reviews">
                        <?php try {
                            // query the database with the page information 
                            $stmt = $connection->prepare("SELECT * FROM reviews WHERE bookID=:id;");
                            $stmt->bindParam(':id', $book['bookID'], PDO::PARAM_INT);
                            $stmt->execute();

                            while ($review = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="review">
                                <p>"<?php echo $review['content']; ?>"<em> - <?php echo $review['source']; ?></em></p>
                            </div>
                        <?php }
                        } catch( PDOExecption $error ) {
                            print "Error!: " . $error->getMessage() . "</br>";
                        } ?>
                    </div>
                    <div id="related">
                        <div class="boc-grid-gap boc-4-cols"></div>
                    </div>
                </div>
                <div class="info-col">
                    <h3><a href="authors.php?id=<?php echo $book['authorID']; ?>"><?php echo $author['firstname'] . " " . $author['surname']; ?></a></h3>
                    <p class="rating"><img src="images/ratings/stars<?php echo floor($book['score']);?>.gif" alt="rating:<?php echo $book['score'];?> out of 5 stars"><span><?php echo $book['score'];?></span></p>
                    <p class="price"><?php echo $book['special'] ? "<s>£".$book['price']."</s> £".$book['offer_price'] : "£".$book['price'];?></p>
                    <div class="product-buttons">
                        <a href="javascript:void(0);" onclick="wishlistAction('add',<?php echo $book['bookID'];?><?php if(isset($_SESSION["current_user"])){ echo ',true'; } ?>)"><span><i class="fas fa-heart"></i>Add to Wishlist</span></a>
                        <a href="javascript:void(0);" onclick="basketAction('add',<?php echo $book['bookID'];?>)"><span><i class="fas fa-shopping-cart"></i>Add to Basket</span></a>
                    </div>
                </div>
            </div>
            <h2 class="boc-grid-container">Books in this Genre</h2>
            <div id="books" class="boc-grid-container boc-grid-gap boc-pad-2 boc-4-cols">

            <?php 
            try {
                // query the database with the page information 
                $stmt = $connection->prepare("SELECT * FROM books WHERE is_active=1 AND genreID=:genre AND bookID!=:id ORDER BY title ASC");
                $stmt->bindParam(':genre', $book['genreID'], PDO::PARAM_INT);
                $stmt->bindParam(':id', $book['bookID'], PDO::PARAM_INT);
                $stmt->execute();

                include('includes/book-box.php');
                
            } catch( PDOExecption $error ) {
                print "Error!: " . $error->getMessage() . "</br>";
            }
            ?>       
    
            </div>
                        
     
                    <?php } ?>



            


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