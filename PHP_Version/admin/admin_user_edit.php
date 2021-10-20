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

    <title>Barry's Bargain Books:: Edit an Administrator</title>
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
                <span class="current">Edit an Administrator</span>
            </div>
        </section>
<?php 
include 'includes/connection.php';

if (!empty($_POST)) {
/**********************    form has been posted with the updated information   **********************/

	try {
	    // prepare and bind
        $password = isset($_POST['user-password']) ? trim($_POST['user-password']) : null;
        if(is_null($password)||$password==""){
            //user hasn't changed the password value so don't change it in the database
            $stmt = $connection->prepare("UPDATE admin_users SET fullname=:fullname, username=:username WHERE adminID=:id;");
        } else {
            $stmt = $connection->prepare("UPDATE admin_users SET fullname=:fullname, username=:username, password=:password WHERE adminID=:id;");
            $password = hash('sha512', $password);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        }
	    

        $fullname = isset($_POST['user-fullname']) ? trim($_POST['user-fullname']) : null;
        
        $username = isset($_POST['user-username']) ? trim($_POST['user-username']) : null;
        
        $id = isset($_POST['user-id']) ? trim($_POST['user-id']) : null;

        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

        //check if the operation succeeded
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> Administrator Updated</h2>";
            echo "<p class='boc-center'>You will be returned to the Administrator Index in 3 seconds or you can <a href='admin_users.php'>return to the Administrator Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the Administrator Index in 3 seconds or you can <a href='admin_users.php'>return to the Administrator Index now</a></p>";
        };
        header( "refresh:3;url=admin_users.php" );

	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}
	

} elseif (isset($_GET['id'])) { 
/**********************    display the selected user    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("SELECT * FROM admin_users WHERE adminID=:id;");

	    $id = isset($_GET['id']) ? trim($_GET['id']) : null;
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

		$stmt->execute();

	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}

	?>
        <h2 class="boc-center">Edit a User</h2>

		<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header"></div>
			<form id="user-add" method="post" onsubmit="return validateForm(this);" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
				<input id="user-id" name="user-id" type="hidden" value="<?php echo $result['adminID']; ?>">
                <div class="form-row">
                    <label for="user-fullname">Name</label>
                    <input id="user-fullname" name="user-fullname" type="text" placeholder="full name" value="<?php echo $result['fullname']; ?>" data-validate="true" data-validation-type="required">
                    <span id="user-fullname-msg"></span>
                </div>

                <div class="form-row">
                    <label for="user-username">Userame</label>
                    <input id="user-username" name="user-username" type="text" placeholder="username" value="<?php echo $result['username']; ?>" data-validate="true" data-validation-type="required">
                    <span id="user-username-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-password">Password</label>
                    <input id="user-password" name="user-password" type="text" placeholder="password" data-validate="true" data-validation-type="required">
                    <span id="user-password-msg"></span>
                    <p>for security, the password is encrypted before being stored in the database. It CANNOT be retrieved but you can specify a new password using this field</p>
                </div>
                
                <div class="form-row boc-center">
                    <button type="reset">Reset</button>
                    <button type="submit">Update Administrator</button>
                    <span id="testme"></span>
                </div>
	        </form>
			<div class="form-row footer"></div>
		</div>

<?php } else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> A user was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='admin_users.php'>return to the User Index now</a></p>";
 header( "refresh:3;url=admin_users.php" );
} ?>
    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>






<script src="javascript/micromodal.min.js" lang="javascript"></script>
<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>