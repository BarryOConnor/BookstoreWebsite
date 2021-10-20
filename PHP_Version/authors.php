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

     ####################################################################### -->

    <title>Barry's Bargain Books :: Authors</title>
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
        <section class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Authors</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Authors</span>
                </div>
            </div>
            
            <div id="authors" class="boc-pad-2">
                <?php 
                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT authorID, CONCAT(firstname, ' ', surname) AS name, image, biography FROM authors WHERE is_active=1 ORDER BY surname, firstname ASC;");
                    $stmt->bindParam(':offset', $row_offset, PDO::PARAM_INT);
                    $stmt->bindParam(':rowsperpage', $rows_per_page, PDO::PARAM_STR);
                    $stmt->execute();


                    /******  build the html rows ******/
                    // display the results in a formatted fashion with icons
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <article id="<?php echo $result['name'];?>" class="boc-author-box boc-grid-container boc-grid-gap boc-1-3-cols">
                            <div class="image-col">
                                <a href="author.php?id=<?php echo $result['authorID'];?>"><img src="<?php echo $result['image'];?>" alt="Portrait of <?php echo $result['name'];?>"></a>
                            </div>
                            <div class="content-col">
                                <h2><?php echo $result['name'];?></h2>
                                <p><?php echo $result['biography'];?></p>
                            </div>
                        </article>
                        <hr />
                  <?php 
                    }
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
</body>
</html>