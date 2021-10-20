<?php
// start the session
session_start();
//buffer the output because we want to redirect if successful after a timed event
ob_start();
//check the session to see if anyone is logged in, otherwise redirect to the login page
if (!isset($_SESSION["admin_user"])) { header("Location: login.php"); }
?>

<!DOCTYPE html>
<html lang="en" class="text-100">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">

    <!-- ############################# INFORMATION #############################

### ACKNOWLEDGEMENTS ###

- This site uses fontawesome (https://fontawesome.com) for icons

*/

     ####################################################################### -->

    <title>Barry's Bargain Books:: Edit a Book</title>
    <meta name="description" content="Barry's Bargain Books">
    <meta name="keywords" content="Barry's Bargain Books">
    <meta name="author" content="Barry's Bargain Books">
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/fontawesome.css">
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="../images/favicon.png" />

</head>
<body>
    <!-- screenreader / keyboard link displayed offscreen to allow skipping the menu and accessing main content -->
    <a class="skip-main" href="#main">Skip to main content</a>

    <!-- main header for the site -->
    <header>
        <div >
            <a href="index.php"><img src="images/logo.png" alt="Barry's Bargain Books Logo"></a>
        </div>
    </header>

    <!--include main nav -->
    <?php include 'includes/main_nav.php'; ?>
    

    <main id="main">
    	<section class="breadcrumb">
            <div id="breadcrumb" class="boc-grid-container">
                <a href="index.php" title="retrun to the home page">Home</a>
                <span class="separator">></span>
                <a href="books.php" title="retrun to the book index">Books</a>
                <span class="separator">></span>
                <span class="current">Edit a Book</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (!empty($_POST)) {
/**********************    form has been posted with the updated information   **********************/

	try {
	    // prepare and bind
	    $stmt = $connection->prepare("UPDATE books SET title=:title, image=:image, authorID=:author, genreID=:genre, price=:price, 
            special=:special,  offer_price=:offer_price, year=:year, score=:score, short_desc=:short_desc, long_desc=:long_desc, 
            release_date=:release_date, featured=:featured, format=:format, is_active=:is_active WHERE bookID=:id");

	    $title = isset($_POST['book-title']) ? trim($_POST['book-title']) : null;
        $image = isset($_POST['content-image']) ? trim($_POST['content-image']) : null;
        $author = isset($_POST['book-author']) ? trim($_POST['book-author']) : null;
        $genre = isset($_POST['book-genre']) ? trim($_POST['book-genre']) : null;
        $price = isset($_POST['book-price']) ? trim($_POST['book-price']) : null;
        $special = isset($_POST['book-special']) ? trim($_POST['book-special']) : null;
        $offer_price = isset($_POST['book-offer-price']) ? trim($_POST['book-offer-price']) : null;
        $year = isset($_POST['book-year']) ? trim($_POST['book-year']) : null;
        $score = isset($_POST['book-score']) ? trim($_POST['book-score']) : null;
        $short_desc = isset($_POST['book-short-desc']) ? trim($_POST['book-short-desc']) : null;
        $long_desc = isset($_POST['book-long-desc']) ? trim($_POST['book-long-desc']) : null;
        $release_date = isset($_POST['book-release']) ? trim($_POST['book-release']) : null;
        $featured = isset($_POST['book-featured']) ? trim($_POST['book-featured']) : null;
        $format = isset($_POST['book-format']) ? trim($_POST['book-format']) : null;
        $is_active = isset($_POST['book-active']) ? trim($_POST['book-active']) : null;
        $id = isset($_POST['book-id']) ? trim($_POST['book-id']) : null;

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':special', $special, PDO::PARAM_STR);
        $stmt->bindParam(':offer_price', $offer_price, PDO::PARAM_STR);
        $stmt->bindParam(':year', $year, PDO::PARAM_STR);
        $stmt->bindParam(':score', $score, PDO::PARAM_STR);
        $stmt->bindParam(':short_desc', $short_desc, PDO::PARAM_STR);
        $stmt->bindParam(':long_desc', $long_desc, PDO::PARAM_STR);
        $stmt->bindParam(':release_date', $release_date, PDO::PARAM_STR);
        $stmt->bindParam(':featured', $featured, PDO::PARAM_STR);
        $stmt->bindParam(':format', $format, PDO::PARAM_STR);
        $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);


        //check if the operation succeeded
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Book Updated</h2>";
            echo "<p class='boc-center'>You will be returned to the Book Index in 3 seconds or you can <a href='books.php'>return to the Book Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Book Index in 3 seconds or you can <a href='books.php'>return to the Book Index now</a></p>";
        };
        header( "refresh:3;url=books.php" );

	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}
	

} elseif (isset($_GET['id'])) { 
/**********************    display the selected book    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("SELECT bookID, title, image, authorID, genreID, price, special, offer_price, year, score, short_desc, long_desc, release_date, featured, format, is_active FROM books WHERE bookID=:id;");

	    $id = isset($_GET['id']) ? trim($_GET['id']) : null;
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		$stmt->execute();

	    $book = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}

	?>
        <h2 class="boc-center">Edit a Book</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
			<form id="book-add" method="post" onsubmit="return validateForm(this);" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
				<input id="book-id" name="book-id" type="hidden" value="<?php echo $book['bookID']; ?>">
				<div class="form-row">
                    <label for="book-title">Title</label>
                    <input id="book-title" name="book-title" type="text" placeholder="book title" value="<?php echo $book['title']; ?>" data-validate="true" data-validation-type="required">
                    <span id="book-title-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image">Cover Artwork Image</label>
                    <input id="content-image" name="content-image" type="hidden" placeholder="book image" value="<?php echo $book['image']; ?>" data-validate="true" data-validation-type="required">
                    <img src="<?php echo is_null($book['image']) ? "../images/books/default.jpg": "../".$book['image']; ?>" id="selected-image" />
                    <button type="button" onclick="MicroModal.show('image-modal');">Choose Book Image</button>
                    <span id="content-image-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-author">Author</label>
                    <select id="book-author" name="book-author" data-validate="true" data-validation-type="required">
                        <option value="0">-- Select an Author --</option>

                        <?php try {
                                // prepare and bind
                                $stmt = $connection->prepare("SELECT authorID, CONCAT(firstname, ' ', surname) as name FROM authors ORDER BY surname, firstname ASC;");

                                $stmt->execute();
            
                                $select_content = "";

                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                    echo '<option value="'.$result['authorID'].'"';
                                    if($book['authorID'] == $result['authorID']) { echo ' selected'; };
                                    echo '>'.$result['name'].'</option>';
                                }
                            } catch( PDOExecption $error ) {
                                print "Error!: " . $error->getMessage() . "</br>";
                            } ?>
                    </select>
                    <span id="book-author-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-genre">Genre</label>
                    <select id="book-genre" name="book-genre" data-validate="true" data-validation-type="required">
                        <option value="0">-- Select a Genre --</option>
                        <?php try {
                                // prepare and bind
                                $stmt = $connection->prepare("SELECT genreID, name FROM genres ORDER BY name ASC;");

                                $stmt->execute();
            
                                $select_content = "";

                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                    echo '<option value="'.$result['genreID'].'"';
                                    if($book['genreID'] == $result['genreID']) { echo ' selected'; };
                                    echo '>'.$result['name'].'</option>';
                                }
                            } catch( PDOExecption $error ) {
                                print "Error!: " . $error->getMessage() . "</br>";
                            } ?>
                    </select>
                    <span id="book-author-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-price">Price</label>
                    <input id="book-price" name="book-price" type="number" placeholder="0.00" step="0.01" min="0.00" max="1000.00" value="<?php echo $book['price']; ?>" data-validate="true" data-validation-type="required">
                    <span id="book-price-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-special">On Offer?</label>
                    <select id="book-special" name="book-special">
                        <option value="0"<?php if($book['special'] == 0) { echo ' selected'; } ?>>Not on Offer</option>
                        <option value="1"<?php if($book['special'] == 1) { echo ' selected'; } ?>>On Offer</option>
                    </select>
                    <span id="book-special-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-offer-price">Special Offer Price</label>
                    <input id="book-offer-price" name="book-offer-price" type="number" placeholder="0.00" step="0.01" min="0.00" max="1000.00" value="<?php echo $book['offer_price']; ?>">
                    <span id="book-offer-price-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-year">Year Published</label>
                    <input id="book-year" name="book-year" type="number" placeholder="2020" step="1" min="1800" max="2050" value="<?php echo $book['year']; ?>" data-validate="true" data-validation-type="required">
                    <span id="book-year-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-score">Score</label>
                    <input id="book-score" name="book-score" type="number" placeholder="0.0" step="0.5" min="0.0" max="5.0" value="<?php echo $book['score']; ?>" data-validate="true" data-validation-type="required">
                    <span id="book-score-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-short-desc">Short Description</label>
                    <textarea id="book-short-desc" name="book-short-desc" placeholder="Short Description" rows="5" data-validate="true" data-validation-type="required"><?php echo $book['short_desc']; ?></textarea>
                    <span id="book-short-desc-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-long-desc">Long Description</label>
                    <textarea id="book-long-desc" name="book-long-desc" placeholder="Long Description" rows="5" data-validate="true" data-validation-type="required"><?php echo $book['long_desc']; ?></textarea>
                    <span id="book-long-desc-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-release">Release Date</label>
                    <input id="book-release" name="book-release" type="date" value="<?php echo $book['release_date']; ?>" data-validate="true" data-validation-type="required">
                    <span id="book-release-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-featured">Featured on Homepage?</label>
                    <select id="book-featured" name="book-featured">
                        <option value="0"<?php if($book['featured'] == 0) { echo ' selected'; } ?>>Not Featured</option>
                        <option value="1"<?php if($book['featured'] == 1) { echo ' selected'; } ?>>Featured</option>
                    </select>
                    <span id="book-active-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-format">Book Format</label>
                    <select id="book-format" name="book-format">
                        <option value="0"<?php if($book['format'] == 0) { echo ' selected'; } ?>>Book is a paperback</option>
                        <option value="1"<?php if($book['format'] == 1) { echo ' selected'; } ?>>Book is a hardback</option>
                        <option value="2"<?php if($book['format'] == 2) { echo ' selected'; } ?>>Book is an audiobook</option>
                    </select>
                    <span id="book-active-msg"></span>
                </div>
                <div class="form-row">
                    <label for="book-active">Book Active?</label>
                    <select id="book-active" name="book-active">
                        <option value="0"<?php if($book['is_active'] == 0) { echo ' selected'; } ?>>Hidden</option>
                        <option value="1"<?php if($book['is_active'] == 1) { echo ' selected'; } ?>>Visible</option>
                    </select>
                    <span id="book-active-msg"></span>
                </div>
				<div class="form-row boc-center">
	                <button type="reset">Reset</button>
	                <button type="submit">Update Book</button>
	            </div>
	        </form>
			<div class="form-row footer"></div>
		</div>

<?php } else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> A book was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the Book Index in 3 seconds or you can <a href='books.php'>return to the Book Index now</a></p>";
 header( "refresh:3;url=books.php" );
} ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>


<?php $image_type = "books";
include('includes/select-images.php'); ?>


<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>