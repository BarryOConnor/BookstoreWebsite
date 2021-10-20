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

    <title>Barry's Bargain Books:: Add a Carousel Image</title>
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
                <a href="carousels.php" title="retrun to the carousel index">Carousel Images</a>
                <span class="separator">></span>
                <span class="current">Add a Carousel Image</span>
            </div>
        </section>
<?php if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/
    
    include 'includes/connection.php';

	try {
	    // prepare and bind
	    $stmt = $connection->prepare("INSERT INTO carousel (image, mobile_image, image_alt, description, link, is_active) VALUES (:image, :mobile_image, :image_alt, :description, :link, :is_active);");

	    
        $image = isset($_POST['content-image']) ? trim($_POST['content-image']) : null;
        $mobile_image = isset($_POST['content-image-two']) ? trim($_POST['content-image-two']) : null;
        $image_alt = isset($_POST['content-image-alt']) ? trim($_POST['content-image-alt']) : null;
        $description = isset($_POST['carousel-description']) ? trim($_POST['carousel-description']) : null;
        $link = isset($_POST['carousel-link']) ? trim($_POST['carousel-link']) : null;
	    $is_active = isset($_POST['carousel-active']) ? trim($_POST['carousel-active']) : null;

	    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':mobile_image', $mobile_image, PDO::PARAM_STR);
        $stmt->bindParam(':image_alt', $image_alt, PDO::PARAM_STR);
        $stmt->bindParam(':link', $link, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
	    $stmt->bindParam(':is_active', $is_active, PDO::PARAM_STR);

	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i>Carousel Image Added</h2>";
            echo "<p class='boc-center'>You will be returned to the Carousel Image Index in 3 seconds or you can <a href='carousels.php'>return to the Carousel Image Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Carousel Image Index in 3 seconds or you can <a href='carousels.php'>return to the Carousel Image Index now</a></p>";
        };
        header( "refresh:3;url=carousels.php" );
	} catch( PDOExecption $e ) {
    	print "Error!: " . $e->getMessage() . "</br>";
	}

} else { 
/**********************    page was not posted so display the form   **********************/

    ?>
        <h2 class="boc-center">Add a Carousel Image</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
            <form id="carousel-add" name="carousel-add" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this)" method="post">
				<div class="form-row">
					<label for="carousel-description">Carousel Text</label>
					<input id="carousel-description" name="carousel-description" type="text" placeholder="carosuel text" data-validate="true" data-validation-type="required">
					<span id="carousel-description-msg"></span>
				</div>
                <div class="form-row">
                    <label for="content-image">Image</label>
                    <input id="content-image" name="content-image" type="hidden" placeholder="Image" value="" data-validate="true" data-validation-type="required">
                    <img src="" id="selected-image" class="hidden" />
                    <button type="button" onclick="MicroModal.show('image-modal');">Choose Carousel Image</button>
                    <span id="content-image-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image-two">Mobile Image</label>
                    <input id="content-image-two" name="content-image-two" type="hidden" placeholder="Mobile Image" value="" data-validate="true" data-validation-type="required">
                    <img src="" id="selected-image-two" class="hidden" />
                    <button type="button" onclick="MicroModal.show('mobile-image');">Choose Carousel Image (mobile)</button>
                    <span id="content-image-two-msg"></span>
                </div>
                <div class="form-row">
                    <label for="content-image-alt">Image Alt</label>
                    <input id="content-image-alt" name="content-image-alt" type="text" placeholder="Alt text for carousel image" data-validate="true" data-validation-type="required">
                    <span id="content-image-alt"></span>
                </div>
                <div class="form-row">
                    <label for="carousel-link">Carousel link</label>
                    <input id="carousel-link" name="carousel-link" type="text" placeholder="carousel link" data-validate="true" data-validation-type="required">
                    <span id="carousel-link-msg"></span>
                </div>
				<div class="form-row">
					<label for="carousel-active">Active?</label>
					<select id="carousel-active" name="carousel-active">
						<option value="0">Hidden</option>
						<option value="1" selected>Visible</option>
					</select>
					<span id="carousel-active-msg"></span>
				</div>
				<div class="form-row boc-center">
	                <button type="reset">Reset</button>
	                <button type="submit">Add Carousel Image</button>
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


<?php $image_type = "carousel";
include('includes/select-images.php'); ?>
<?php $image_type = "carousel-small";
$handler = "updateImageNameAlt(this);";
$modal_name ="mobile-image";
include('includes/select-images.php'); ?>
<?php 
//flush the output buffer to the browser
ob_end_flush(); ?>
<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php 
//flush the output buffer to the browser
ob_end_flush(); ?>