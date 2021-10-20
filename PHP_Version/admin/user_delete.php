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

    <title>Barry's Bargain Books:: Delete a User</title>
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
                <a href="users.php" title="retrun to the user index">Users</a>
                <span class="separator">></span>
                <span class="current">Delete a User</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (isset($_GET['id'])) { 
/**********************    delete the selected user    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("DELETE FROM users WHERE userID=:id;");

	    $id = isset($_GET['id']) ? trim($_GET['id']) : null;
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		//check if the operation succeeded
	    $return_value = $stmt->execute();

		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> User Deleted</h2>";
            echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
        };
        header( "refresh:3;url=users.php" );
		
	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}

} else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> A user was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
 header( "refresh:3;url=users.php" );
} 
 ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>

<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>