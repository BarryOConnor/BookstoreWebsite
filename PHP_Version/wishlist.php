<?php session_start(); 

include('admin/includes/connection.php');

if (!isset($_SESSION["current_user"])) { header("Location: account-login.php"); }
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

- This site uses fontawesome (https://fontawesome.com) for icons
- This page uses XML code and the getXMLContent function which are adapted from the XPath tutorials 
  available on W3CSchools at https://www.w3schools.com/xml/xpath_examples.asp

     ####################################################################### -->

    <title>Barry's Bargain Books :: Wishlist</title>
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


    include('includes/header.php'); ?>



    <main id="main">
        <section class="boc-white-bg">
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Wishlist</h1>

            <div id="breadcrumb" class="boc-lgrey-bg">
                <!-- Breadcrumb to shop position in site -->
                <div class="boc-grid-container">
                    <a href="index.php">Home</a>
                    <span class="separator">></span>
                    <a href="account.php">My Account</a>
                    <span class="separator">></span>
                    <span class="current">Wishlist</span>
                </div>
            </div>
            <div id="specials" class="boc-grid-container boc-grid-gap boc-pad-2 boc-4-cols">
                
                    <?php 
                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT contents FROM wishlist WHERE userID=:id;");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->execute();
                    while ($contents = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $wishlist = $contents['contents'];
                        $wishlist = substr($wishlist, 1, strlen($wishlist)-2);
                        
                    }

                    //PDO has to have matching ? for each parameter so we need to generate a matching list then supply the array of values
                    $param_array = explode('||', $wishlist);
                    $in_list = str_repeat('?,', count($param_array) - 1) . '?';
                    $sql = "SELECT * FROM books WHERE bookID IN ($in_list)";
                    $stmt = $connection->prepare($sql);
                    
                        $stmt->execute($param_array);
                        include('includes/book-box-wishlist.php');
                    
                    
                    
                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
                ?>  
                <div id="no-wishlist">You can add books to your wishlist at any time, simply click on the "Add to Wishlist" button</div>
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