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

    <title>Barry's Bargain Books:: Add an Administrator</title>
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
                <a href="admin_users.php" title="retrun to the user index">Administrators</a>
                <span class="separator">></span>
                <span class="current">Add an Administrator</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (!empty($_POST)) { 
/**********************    form has been posted so handle the database event   **********************/
	try {
        
	    // prepare and bind
	    $stmt = $connection->prepare("INSERT INTO admin_users(fullname, username, password) VALUES (:fullname, :username, :password);");

        $fullname = isset($_POST['user-fullname']) ? trim($_POST['user-fullname']) : null;
        $username = isset($_POST['user-username']) ? trim($_POST['user-username']) : null;
        $password = isset($_POST['user-password']) ? trim($_POST['user-password']) : null;
        $password = hash('sha512', $password);
       

	    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
       
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Administrator Added</h2>";
            echo "<p class='boc-center'>You will be returned to the Administrator Index in 3 seconds or you can <a href='admin_users.php'>return to the Administrator Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Administrator Index in 3 seconds or you can <a href='admin_users.php'>return to the Administrator Index now</a></p>";
        };
        header( "refresh:3;url=admin_users.php" );

	} catch( PDOExecption $e ) {
    	print "Error!: " . $e->getMessage() . "</br>";
	}

} else { 
/**********************    page was not posted so display the form   **********************/

    ?>
        <h2 class="boc-center">Add an Administrator</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
            <form id="user-add" name="user-add" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm(this)" method="post">
				<div class="form-row">
                    <label for="user-fullname">Full Name</label>
                    <input id="user-fullname" name="user-fullname" type="text" placeholder="full name" data-validate="true" data-validation-type="required">
                    <span id="user-fullname-msg"></span>
                </div>

                <div class="form-row">
                    <label for="user-username">Userame</label>
                    <input id="user-username" name="user-username" type="text" placeholder="username" data-validate="true" data-validation-type="required">
                    <span id="user-username-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-password">Password</label>
                    <input id="user-password" name="user-password" type="text" placeholder="password" data-validate="true" data-validation-type="required">
                    <span id="user-password-msg"></span>
                </div>
                
                <div class="form-row boc-center">
                    <button type="reset">Reset</button>
                    <button type="submit">Add Administrator</button>
                    <span id="testme"></span>
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



<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php 
//flush the output buffer to the browser
ob_end_flush(); ?>