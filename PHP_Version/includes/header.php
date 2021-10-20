
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
                <form id="search-form" action="search.php">
                    <input type="search" id="search-field" placeholder="Search..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <span id="search-field-msg"></span>
                </form>
            </div>
            <div id="header-buttons">
                <!-- Buttons to access Shopping Basket and Account -->
                <button type="button" onclick="openAccount();" onkeypress="openAccount();"><i class="fas fa-user"></i>Account</button>
                <div class="dropdown">
                    <button class ="dropbtn" type="button" onclick="openBasket();" onkeypress="openBasket();"><i class="fas fa-shopping-cart"></i>Basket</button>
                    <div id="basket" class="dropdown-basket">
                            <?php 
                                
                            if(!empty($_SESSION['basket'])){ 
                                    echo '<div id="basket-items">';
                                    $total = 0.00;
                                    foreach ($_SESSION['basket'] as $item) {
                                        echo '<div class="basket-item"><span class="title">' . $item['title'] . '</span><span class="quantity"> x ' . $item['quantity'] . ' = </span><span class="price">£' . number_format((float)$item['quantity'] * $item['price'], 2, '.', '') . '</span></div>';
                                        $total += $item['quantity'] * $item['price'];
                                    }
                                    echo '</div>';
                                    echo '<div class="basket-total">£' . number_format((float)$total, 2, '.', '') . '</div>';
                                } else {
                                    echo '<div id="basket-items">';
                                    echo '<div class="basket-item">Your Basket is empty</div>';
                                    echo '</div>';
                                    echo '<div class="basket-total">Total £0.00</div>';
                                }
                                ?>                            

                    </div>
                </div>
            </div>  
        </div>
    </header>



    <?php 
    $genre_menu = "";

                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT genreID, name FROM genres WHERE is_active=1 ORDER BY name ASC;");
                    $stmt->execute();

                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $genre_menu .= '<li';
                        if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/genre.php?id=" . $result['genreID']) { $genre_menu .= " active"; };
                        $genre_menu .= '><a href="genre.php?id=' . $result['genreID'] .'"><span><i class="fas fa-book-reader" aria-hidden="true"></i>' . $result['name'] . '</span></a></li>';
                   
                    }
                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
                ?>

<?php 
    $author_menu = "";

                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT authorID, CONCAT(firstname, ' ', surname) AS name FROM authors WHERE is_active=1 ORDER BY surname, firstname ASC;");
                    $stmt->execute();

                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $author_menu .= '<li';
                        if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/author.php?id=" . $result['authorID']) { $author_menu .= " active"; };
                        $author_menu .= '><a href="author.php?id=' . $result['authorID'] .'"><span><i class="far fa-id-badge" aria-hidden="true"></i>' . $result['name'] . '</span></a></li>';
                   
                    }
                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
                ?>     
         

<nav id="main-menu" class="boc-black-bg">
        <!-- menu on tablets and screens -->
        <ul class="boc-grid-container boc-hide-mobile">
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/index.php") { echo " class='active'"; } ?>><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/coming-soon.php") { echo " class='active'"; } ?>><a href="coming-soon.php"><span><i class="far fa-book" aria-hidden="true"></i>Coming Soon</span></a></li>
            <li class="dropdown<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/genres.php") { echo " active"; } ?>">
                <a href="genres.php"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a>
                <ul class="dropdown-content">

                    <?php echo $genre_menu; ?>
                 
                    
                </ul>
            </li>

            <li class="dropdown<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/authors.php") { echo " active"; } ?>">
                <a href="authors.php"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a>
                <ul class="dropdown-content">


                <?php echo $author_menu; ?>   
                    
                </ul>
            </li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/special-offers.php") { echo " class='active'"; } ?>><a href="special-offers.php"><span><i class="fas fa-tags" aria-hidden="true"></i>Special Offers</span></a></li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/report.php") { echo " class='active'"; } ?>><a href="report.php"><span><i class="far fa-file-code" aria-hidden="true"></i>Report</span></a></li>
        </ul>

        <!-- menu for mobiles -->
        <a class="boc-menu-button boc-show-inline-mobile" href="javascript:void(0);" onclick="toggleMenu()" onkeypress="toggleMenu()" title="Toggle Navigation Menu"><span class="fa fa-bars"></span></a>
        <a class="boc-account boc-show-inline-mobile" href="basket.php"><i class="fas fa-shopping-cart"></i>Basket</a>
        <a class="boc-account boc-show-inline-mobile" href="account.php"><i class="fas fa-user"></i>Account</a>
        <ul id="dropdown-nav" class="boc-black-bg boc-grid-container boc-hide">
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/index.php") { echo " class='active'"; } ?>><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/coming-soon.php") { echo " class='active'"; } ?>><a href="coming-soon.php"><span><i class="far fa-book" aria-hidden="true"></i>Coming Soon</span></a></li>
            <li class="dropdown<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/genres.php") { echo " active"; } ?>">
                <a href="genres.php"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a>
                <ul class="dropdown-content">

                    <?php echo $genre_menu; ?>
                 
                    
                </ul>
            </li>
            <li class="dropdown<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/authors.php") { echo " active"; } ?>">
                <a href="authors.php"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a>
                <ul class="dropdown-content">


                <?php echo $author_menu; ?>   
                    
                </ul>
            </li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/special-offers.php") { echo " class='active'"; } ?>><a href="special-offers.php"><span><i class="fas fa-tags" aria-hidden="true"></i>Special Offers</span></a></li>
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/report.php") { echo " class='active'"; } ?>><a href="report.php"><span><i class="far fa-file-code" aria-hidden="true"></i>Report</span></a></li>
        </ul>
    </nav>