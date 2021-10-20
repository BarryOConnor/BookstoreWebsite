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

    <title>Barry's Bargain Books:: Edit a User</title>
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
                <span class="current">Edit a User</span>
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
            $stmt = $connection->prepare("UPDATE users SET title=:title, name=:name, dob=:dob, email=:email, profile=:profile, genres=:genres, newsletter=:newsletter, username=:username WHERE userID=:id;");
        } else {
            $stmt = $connection->prepare("UPDATE users SET title=:title, name=:name, dob=:dob, email=:email, profile=:profile, genres=:genres, newsletter=:newsletter, username=:username, password=:password WHERE userID=:id;");
            $password = hash('sha512', $password);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        }
	    

	    $genres ="";
        if(isset($_POST['genre'])){
            foreach($_POST['genre'] as $selected){
                $genres .= $selected . "|";
            }
            $genres = rtrim($genres, "|");
        }

        $title = isset($_POST['user-title']) ? trim($_POST['user-title']) : null;
        $name = isset($_POST['user-name']) ? trim($_POST['user-name']) : null;
        $dob = isset($_POST['user-dob']) ? trim($_POST['user-dob']) : null;
        $email = isset($_POST['user-email']) ? trim($_POST['user-email']) : null;
        
        $profile = isset($_POST['user-profile']) ? trim($_POST['user-profile']) : null;
        
        $newsletter = isset($_POST['user-newsletter']) ? trim($_POST['user-newsletter']) : 0;
        $username = isset($_POST['user-username']) ? trim($_POST['user-username']) : null;
        
        $id = isset($_POST['user-id']) ? trim($_POST['user-id']) : null;

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindParam(':newsletter', $newsletter, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        

        $stmt->bindParam(':genres', $genres, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

        //check if the operation succeeded
	    $return_value = $stmt->execute();
		
		if($return_value) {   
            echo "<h2 class='boc-center'><i class='far fa-check-circle green'></i> User Updated</h2>";
            echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
        } else { 
            echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> Action failed. Please try again</h2>";
            echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
        };
        header( "refresh:3;url=users.php" );

	} catch( PDOExecption $error ) {
    	print "Error!: " . $error->getMessage() . "</br>";
	}
	

} elseif (isset($_GET['id'])) { 
/**********************    display the selected user    **********************/
	try {
	    // prepare and bind
	    $stmt = $connection->prepare("SELECT * FROM users WHERE userID=:id;");

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
				<input id="user-id" name="user-id" type="hidden" value="<?php echo $result['userID']; ?>">
				<div class="form-row">
                    <label for="user-title">Title</label>
                    <select id="user-title" name="user-title">
                        <option value="0">-- Select a Title --</option>
                        <option value="Mr"<?php if($result['title'] == "Mr") { echo ' selected'; } ?>>Mr</option>
                        <option value="Mrs"<?php if($result['title'] == "Mrs") { echo ' selected'; } ?>>Mrs</option>
                        <option value="Miss"<?php if($result['title'] == "Miss") { echo ' selected'; } ?>>Miss</option>
                        <option value="Dr"<?php if($result['title'] == "Dr") { echo ' selected'; } ?>>Doctor</option>
                        <option value="Rev"<?php if($result['title'] == "Rev") { echo ' selected'; } ?>>Reverend</option>
                    </select>
                    <span id="user-title-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-name">Name</label>
                    <input id="user-name" name="user-name" type="text" placeholder="full name" value="<?php echo $result['name']; ?>" data-validate="true" data-validation-type="required">
                    <span id="user-name-msg"></span>
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
                <div class="form-row">
                    <label for="user-dob">Date of Birth</label>
                    <input id="user-dob" name="user-dob" type="date" value="<?php echo $result['dob']; ?>" data-validate="true" data-validation-type="required date">
                    <span id="user-dob-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-email">email</label>
                    <input id="user-email" name="user-email" type="text" placeholder="email address" value="<?php echo $result['email']; ?>" data-validate="true" data-validation-type="required email">
                    <span id="user-email-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-profile">Profile Text</label>
                    <textarea id="user-profile" name="user-profile" placeholder="Profile text" data-validate="true" data-validation-type="required" rows="5"><?php echo $result['profile']; ?></textarea>
                    <span id="user-profile-msg"></span>
                </div>
                
                <div class="form-row">
                    <label for="content-image">Favourite Genres</label>
                    <fieldset>
                        <legend>Users:</legend>
                                <?php try {
                                        $result['genres'] = "|" . $result['genres'] . "|";
                                        // prepare and bind
                                        $stmt = $connection->prepare("SELECT genreID, name FROM genres ORDER BY name ASC;");

                                        $stmt->execute();
                    
                                        $select_content = "";

                                        while ($genre = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                            echo '<label for="genre-' . $genre['genreID'] . '">' . $genre['name'] . '<input id="genre-' . $genre['genreID'] . '" name="genre[]" value="' . $genre['genreID'] . '" type="checkbox" class="radio" data-validate="true" data-validation-type="checkbox" onChange="validateBoxes(this);"';
                                            if(strpos($result['genres'], "|".$genre['genreID']."|") !== false) { echo " checked"; }
                                            echo '></label>';
                                        }
                                    } catch( PDOExecption $error ) {
                                        print "Error!: " . $error->getMessage() . "</br>";
                                    } ?>
                        </fieldset>
                    <span id="user-msg"></span>
                </div>
                <div class="form-row">
                    <label for="user-newsletter">Newsletter</label>
                    <input type="checkbox" id="user-newsletter" name="user-newsletter" value="1"<?php if($result['newsletter'] == 1) { echo ' checked'; } ?>>
                    <span id="user-newsletter-msg"></span>
                </div>
                <div class="form-row boc-center">
                    <button type="reset">Reset</button>
                    <button type="submit">Update User</button>
                    <span id="testme"></span>
                </div>
	        </form>
			<div class="form-row footer"></div>
		</div>

<?php } else {
/**********************    no id specified display an error    **********************/

 echo "<h2 class='boc-center'><i class='far fa-times-circle red'></i> A user was not selected</h2>";
 echo "<p class='boc-center'>You will be returned to the User Index in 3 seconds or you can <a href='users.php'>return to the User Index now</a></p>";
 header( "refresh:3;url=users.php" );
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