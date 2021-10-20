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

    <title>Barry's Bargain Books:: Edit a Genre</title>
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
                <a href="genres.php" title="retrun to the genre index">Genres</a>
                <span class="separator">></span>
                <span class="current">Edit a Genre</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (!empty($_POST)) {
/**********************    form has been posted with the updated information   **********************/

	try {
	    // prepare and bind
	    $stmt = $connection->prepare("UPDATE genres SET name=:name, description=:description, image=:image, image_alt=:image_alt, is_active=:is_active WHERE genreID=:id;");

	    
        $name = isset($_POST['genre-name']) ? trim($_POST['genre-name']) : null;
        $description = isset($_POST['genre-description']) ? trim($_POST['genre-description']) : null;
        $image = isset($_POST['content-image']) ? trim($_POST['content-image']) : null;
        $image_alt = isset($_POST['content-image-alt']) ? trim($_POST['content-image-alt']) : null;
        $is_active = isset($_POST['genre-active']) ? trim($_POST['genre-active']) : null;
        $id = isset($_POST['genre-id']) ? trim($_POST['genre-id']) : null;

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':image_alt', $image_alt, PDO::PARAM_STR);
        $stmt->bindParam(':is_active', $is_active, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

        //check if the operation succeeded
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Genre Updated</h2>";
            echo "<p class='boc-center'>You will be returned to the Genre Index in 3 seconds or you can <a href='genres.php'>return to the Genre Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Genre Index in 3 seconds or you can <a href='genres.php'>return to the Genre Index now</a></p>";
        };
        header( "refresh:3;url=genres.php" );

	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}
	

} elseif (isset($_GET['id'])) { 
/**********************    display the selected genre    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("SELECT genreID, name, description, image, image_alt, is_active FROM genres WHERE genreID=:id;");

	    $id = isset($_GET['id']) ? trim($_GET['id']) : null;
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		$stmt->execute();

	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}

	?>
        <h2 class="boc-center">Edit a Genre</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
			<form id="genre-add" method="post" onsubmit="return validateForm(this);" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
				<input id="genre-id" name="genre-id" type="hidden" value="<?php echo $result['genreID']; ?>">
				<div class="form-row">
					<label for="genre-name">Name</label>
					<input id="genre-name" name="genre-name" type="text" placeholder="genre name" value="<?php echo $result['name']; ?>" data-validate="true" data-validation-type="required">
					<span id="genre-name-msg"></span>
				</div>
                <div class="form-row">
                    <label for="genre-description">Description</label>
                    <textarea id="genre-description" name="genre-description" rows="5" placeholder="genre description" data-validate="true" data-validation-type="required"><?php echo $result['description']; ?></textarea>
                    <span id="genre-description-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image">Image</label>
                    <input id="content-image" name="content-image" type="hidden" placeholder="genre image" value="<?php echo is_null($result['image']) ? "images/genres/default.jpg": $result['image']; ?>" data-validate="true" data-validation-type="required">
                    <img src="<?php echo is_null($result['image']) ? "../images/genres/default.jpg": "../".$result['image']; ?>" id="selected-image" />
                    <button type="button" onclick="MicroModal.show('image-modal');">Choose Genre Image</button>
                    <span id="content-image-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image-alt">Image Alt</label>
                    <input id="content-image-alt" name="content-image-alt" type="text" placeholder="image alt text" value="<?php echo $result['image_alt']; ?>" data-validate="true" data-validation-type="required">
                    <span id="content-image-alt-msg"></span>
                </div>
				<div class="form-row">
					<label for="genre-active">Active?</label>
					<select id="genre-active" name="genre-active">
						<option value="0"<?php if($result['is_active'] == 0) { echo ' selected'; } ?>>Hidden</option>
						<option value="1"<?php if($result['is_active'] == 1) { echo ' selected'; } ?>>Visible</option>
					</select>
					<span id="genre-active-msg"></span>
				</div>
				<div class="form-row boc-center">
	                <button type="reset">Reset</button>
	                <button type="submit">Update Genre</button>
	            </div>
	        </form>
			<div class="form-row footer"></div>
		</div>

<?php } else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> A genre was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the Genre Index in 3 seconds or you can <a href='genres.php'>return to the Genre Index now</a></p>";
 header( "refresh:3;url=genres.php" );
} ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>



<?php $image_type = "genres";
include('includes/select-images.php'); ?>


<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>