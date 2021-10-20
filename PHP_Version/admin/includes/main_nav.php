    




<?php 
if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/genres.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/genre_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/genre_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/genre_delete.php") { $menu_genres = " class='active'"; } else { $menu_genres = "";}

if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/books.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/book_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/book_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/book_delete.php") { $menu_books = " class='active'"; } else { $menu_books = "";}

if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/users.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/user_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/user_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/user_delete.php") { $menu_users = " class='active'"; } else { $menu_users = "";}

if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/admin_users.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/admin_user_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/admin_user_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/admin_user_delete.php") { $menu_admin_users = " class='active'"; } else { $menu_admin_users = "";}

if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/reviews.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/review_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/review_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/review_delete.php") { $menu_reviews = " class='active'"; } else { $menu_reviews = "";}

if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/authors.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/author_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/author_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/author_delete.php") { $menu_authors = " class='active'"; } else { $menu_authors = "";}

    if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/carousels.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/carousel_add.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/carousel_edit.php" 
    || $_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/carousel_delete.php") { $menu_carousel = " class='active'"; } else { $menu_carousel = "";}

?>







    <nav id="main-menu">
        <!-- menu on tablets and screens -->
        <ul class="boc-grid-container boc-hide-mobile">
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/index.php") { echo " class='active'"; } ?>><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li<?php echo $menu_carousel; ?>><a href="carousels.php"><span><i class="far fa-book" aria-hidden="true"></i>Carousel Images</span></a></li>
            <li<?php echo $menu_books; ?>><a href="books.php"><span><i class="far fa-book" aria-hidden="true"></i>Books</span></a></li>
            <li<?php echo $menu_genres; ?>><a href="genres.php"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a></li>
            <li<?php echo $menu_authors; ?>><a href="authors.php"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a></li>
            <li<?php echo $menu_reviews; ?>><a href="reviews.php"><span><i class="fas fa-pen-fancy" aria-hidden="true"></i>Reviews</span></a></li>
            <li<?php echo $menu_users; ?>><a href="users.php"><span><i class="fas fa-users" aria-hidden="true"></i>Users</span></a></li>
            <li<?php echo $menu_admin_users; ?>><a href="admin_users.php"><span><i class="fas fa-users" aria-hidden="true"></i>Administrators</span></a></li>
        </ul>

        <!-- menu for mobiles -->
        <a class="boc-menu-button boc-show-inline-mobile" href="javascript:void(0);" onclick="toggleMenu()" onkeypress="toggleMenu()" title="Toggle Navigation Menu"><span class="fa fa-bars"></span></a>
        <a class="boc-account boc-show-inline-mobile" href="basket.html"><i class="fas fa-shopping-cart"></i>Basket</a>
        <a class="boc-account boc-show-inline-mobile" href="account.html"><i class="fas fa-user"></i>Account</a>
        <ul id="dropdown-nav" class="boc-black-bg boc-grid-container boc-hide">
            <li<?php if($_SERVER['PHP_SELF'] == "/web/soft20181/N0813926/admin/index.php") { echo " class='active'"; } ?>><a href="index.php"><span><i class="fas fa-home" aria-hidden="true"></i>Home</span></a></li>
            <li<?php echo $menu_carousel; ?>><a href="carousels.php"><span><i class="far fa-book" aria-hidden="true"></i>Carousel Images</span></a></li>
            <li<?php echo $menu_books; ?>><a href="books.php"><span><i class="far fa-book" aria-hidden="true"></i>Books</span></a></li>
            <li<?php echo $menu_genres; ?>><a href="genres.php"><span><i class="fas fa-book-reader" aria-hidden="true"></i>Genres</span></a></li>
            <li<?php echo $menu_authors; ?>><a href="authors.php"><span><i class="far fa-id-badge" aria-hidden="true"></i>Authors</span></a></li>
            <li<?php echo $menu_reviews; ?>><a href="reviews.php"><span><i class="fas fa-pen-fancy" aria-hidden="true"></i>Reviews</span></a></li>
            <li<?php echo $menu_users; ?>><a href="users.php"><span><i class="fas fa-users" aria-hidden="true"></i>Users</span></a></li>
            <li<?php echo $menu_admin_users; ?>><a href="admin_users.php"><span><i class="fas fa-users" aria-hidden="true"></i>Administrators</span></a></li>
        </ul>
    </nav>