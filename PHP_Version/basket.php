<?php session_start(); 
include('admin/includes/connection.php'); ?>
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

    <title>Barry's Bargain Books :: Basket</title>
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

     <?php include('includes/header.php'); ?>




    <main id="main">
        <section class="boc-white-bg">
            
            <h1 class="boc-mblue-bg boc-pad-1 boc-center">Basket</h1>
            <div id="breadcrumb" class="boc-lgrey-bg">
                <div class="boc-grid-container">
                    <a href="index.php" title="retrun to the home page">Home</a>
                    <span class="separator">></span>
                    <span class="current">Basket</span>
                </div>
            </div>
            <div class="boc-grid-container boc-pad-2">
                <h2>My Basket</h2>

                <?php if(!empty($_SESSION['basket'])){ 
                        echo '<div id="basket-list">';
                        $total = 0.00;
                        foreach ($_SESSION['basket'] as $item) {
                            echo '<div id="item_' . $item['id'] . '" class="basket-list-item">';
                            echo '<img src="' . $item['image'] . '">';
                            echo '<input type="hidden" id="base_' . $item['id'] . '" value="' . number_format((float)$item['price'], 2, '.', '') . '">';
                            echo '<span class="title">' . $item['title'] . '</span>';
                            echo ' x <input type="number" id="quantity_' . $item['id'] . '" name="quantity_' . $item['id'] . '" min="0" max="50" value="' . $item['quantity'] . '" onchange="quantityChange(this)"><span> = </span>';
                            echo '<span id="price_' . $item['id'] . '" class="item-total">£' . number_format((float)$item['price']*$item['quantity'], 2, '.', '') . '</span><hr class="spacer"></div>';
                            $total += $item['quantity'] * $item['price'];
                            
                        }
                        echo '</div>';
                        echo '<div id="basket-list-total">Total: <em>£' . number_format((float)$total, 2, '.', '') . '</em></div>';
                    } else {
                        echo '<div id="basket-list">';
                        echo '<div class="basket-list-item">Your Basket is empty</div>';
                        echo '</div>';
                        echo '<div id="basket-list-total">Total: <em>£0.00</em></div>';
                    }
                    ?>   
                        <div id="basket-full">
                            <div class="product-buttons <?php if (isset($_SESSION["current_user"])) { echo 'boc-grid-container boc-grid-gap boc-pad-2 boc-2-cols'; } else { echo 'boc-center'; }; ?>">
                                <?php if (isset($_SESSION["current_user"]) && isset($_SESSION["basket"])) { ?>
                                <a href="javascript:void(0);" onclick="basketAction('save');"><span><i class="fas fa-heart"></i>Save this Basket</span></a>
                                <?php }; ?> 
                                <?php if (isset($_SESSION["basket"])) { ?>
                                <a href="checkout.php"><span><i class="far fa-credit-card"></i>Checkout</span></a>
                                <?php }; ?> 
                            </div>
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