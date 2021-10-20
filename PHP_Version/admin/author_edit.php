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

    <title>Barry's Bargain Books:: Edit an Author</title>
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
                <a href="authors.php" title="retrun to the Author Index">Authors</a>
                <span class="separator">></span>
                <span class="current">Edit an Author</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (!empty($_POST)) {
/**********************    form has been posted with the updated information   **********************/

	try {
	    // prepare and bind
	    $stmt = $connection->prepare("UPDATE authors SET firstname=:firstname, surname=:surname, biography=:biography, image=:image, is_active=:is_active WHERE authorID=:id;");

        $firstname = isset($_POST['author-first-name']) ? trim($_POST['author-first-name']) : null;
        $surname = isset($_POST['author-last-name']) ? trim($_POST['author-last-name']) : null;
	    $biography = isset($_POST['author-biography']) ? trim($_POST['author-biography']) : null;
        $image = isset($_POST['content-image']) ? trim($_POST['content-image']) : null;
	    $is_active = isset($_POST['author-active']) ? trim($_POST['author-active']) : null;
	    $id = isset($_POST['author-id']) ? trim($_POST['author-id']) : null;

	    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':biography', $biography, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
	    $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //check if the operation succeeded
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Author Updated</h2>";
            echo "<p class='boc-center'>You will be returned to the Author Index in 3 seconds or you can <a href='authors.php'>return to the Author Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Author Index in 3 seconds or you can <a href='authors.php'>return to the Author Index now</a></p>";
        };
        header( "refresh:3;url=authors.php" );

	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}
	

} elseif (isset($_GET['id'])) { 
/**********************    display the selected author    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("SELECT authorID, firstname, surname, biography, image, is_active FROM authors WHERE authorID=:id;");

	    $id = isset($_GET['id']) ? trim($_GET['id']) : null;
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		$stmt->execute();

	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}

	?>
        <h2 class="boc-center">Edit an Author</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
			<form id="author-edit" method="post" onsubmit="return validateForm(this);" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
				<input id="author-id" name="author-id" type="hidden" value="<?php echo $result['authorID']; ?>">
                <div class="form-row">
                    <label for="author-first-name">Author Firstname</label>
                    <input id="author-first-name" name="author-first-name" type="text" placeholder="author firstname" value="<?php echo $result['firstname']; ?>" data-validate="true" data-validation-type="required">
                    <span id="author-first-name-msg"></span>
                </div>
                <div class="form-row">
                    <label for="author-last-name">Author Surname</label>
                    <input id="author-last-name" name="author-last-name" type="text" placeholder="author surname" value="<?php echo $result['surname']; ?>" data-validate="true" data-validation-type="required">
                    <span id="author-last-name-msg"></span>
                </div>
                <div class="form-row">
                    <label for="author-biography">Author Biography</label>
                    <textarea id="author-biography" name="author-biography" placeholder="author biography" data-validate="true" data-validation-type="required" rows="5"><?php echo $result['biography']; ?></textarea>
                    <span id="author-biography-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image">Author Image</label>
                    <input id="content-image" name="content-image" type="hidden" value="<?php echo is_null($result['image']) ? "images/authors/no-portrait-male.jpg": $result['image']; ?>" placeholder="author image" data-validate="true" data-validation-type="required">
                    <img src="<?php echo is_null($result['image']) ? "../images/authors/no-portrait-male.jpg": "../".$result['image']; ?>" id="selected-image" />
                    <button type="button" onclick="MicroModal.show('image-modal');">Choose Author Image</button>
                    <span id="content-image-msg"></span>
                </div>
				<div class="form-row">
					<label for="author-active">Author Name</label>
					<select id="author-active" name="author-active">
						<option value="0"<?php if($result['is_active'] == 0) { echo ' selected'; } ?>>Author is not visible on the website</option>
						<option value="1"<?php if($result['is_active'] == 1) { echo ' selected'; } ?>>Author is visible on the website</option>
					</select>
					<span id="author-active-msg"></span>
				</div>
				<div class="form-row boc-center">
	                <button type="reset">Reset</button>
	                <button type="submit">Update Author</button>
	            </div>
	        </form>
			<div class="form-row footer"></div>
		</div>

<?php } else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> An Author was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the Author Index in 3 seconds or you can <a href='authors.php'>return to the Author Index now</a></p>";
 header( "refresh:3;url=authors.php" );
} ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>


<?php $image_type = "authors";
include('includes/select-images.php'); ?>


<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>