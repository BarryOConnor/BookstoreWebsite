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

    <title>Barry's Bargain Books:: Add a Review</title>
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
                <a href="reviews.php" title="retrun to the Review Index">Reviews</a>
                <span class="separator">></span>
                <span class="current">Add a Review</span>
            </div>
        </section>
<?php 
    include 'includes/connection.php';




if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("INSERT INTO reviews (bookID, source, content, is_active) VALUES (:book, :source, :content, :is_active);");

	    $book = isset($_POST['book-id']) ? trim($_POST['book-id']) : null;
        $source = isset($_POST['review-source']) ? trim($_POST['review-source']) : null;
        $content = isset($_POST['review-content']) ? trim($_POST['review-content']) : null;
	    $is_active = isset($_POST['review-active']) ? trim($_POST['review-active']) : null;

	    $stmt->bindParam(':book', $book, PDO::PARAM_INT);
        $stmt->bindParam(':source', $source, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
	    $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);

	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Review Added</h2>";
            echo "<p class='boc-center'>You will be returned to the Review Index in 3 seconds or you can <a href='reviews.php'>return to the Review Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Review Index in 3 seconds or you can <a href='reviews.php'>return to the Review Index now</a></p>";
        };
        header( "refresh:3;url=reviews.php" );
	} catch( PDOExecption $e ) {
    	print "Error!: " . $e->getMessage() . "</br>";
	}

} else { 
/**********************    page was not posted so display the form   **********************/

    ?>
        <h2 class="boc-center">Add a Review</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
            <form id="review-add" name="review-add" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this)" method="post">
                <div class="form-row">
                    <label for="book-id">Book Name</label>
                    <select id="book-id" name="book-id" data-validate="true" data-validation-type="required">
                        <option value="0">-- Select a Book --</option>
                        <?php try {
                                // prepare and bind
                                $stmt = $connection->prepare("SELECT bookID, title FROM books ORDER BY title ASC;");

                                $stmt->execute();
            
                                $select_content = "";

                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                    echo '<option value="'.$result['bookID'].'">'.$result['title'].'</option>';
                                }
                            } catch( PDOExecption $error ) {
                                print "Error!: " . $error->getMessage() . "</br>";
                            } ?>
                    </select>
                    <span id="book-id-msg"></span>
                </div>
				<div class="form-row">
					<label for="review-source">Review Source</label>
					<input id="review-source" name="review-source" type="text" placeholder="review source" data-validate="true" data-validation-type="required">
					<span id="review-source-msg"></span>
				</div>
                <div class="form-row">
                    <label for="review-content">Review Content</label>
                    <textarea id="review-content" name="review-content" placeholder="review content" rows="5" data-validate="true" data-validation-type="required"></textarea>
                    <span id="review-content-msg"></span>
                </div>
				<div class="form-row">
					<label for="review-active">Review Active</label>
					<select id="review-active" name="review-active">
						<option value="0">Review is not visible on the website</option>
						<option value="1" selected>Review is visible on the website</option>
					</select>
					<span id="review-active-msg"></span>
				</div>
				<div class="form-row boc-center">
	                <button type="reset">Reset</button>
	                <button type="submit">Add Review</button>
	            </div>
	        </form>
			<div class="form-row footer"></div>
		</div>
<?php }; ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>



<script src="javascript/admin_site.js" lang="javascript"></script>

</body>
</html>
<?php 
//flush the output buffer to the browser
ob_end_flush(); ?>