

<?php
session_start();
error_reporting(E_ALL);
$login_failed = false;

if (!empty($_POST)) {

    include 'includes/connection.php';

    // prepare and bind
    $stmt = $connection->prepare("SELECT COUNT(adminID) as results, adminID FROM admin_users WHERE username = :username AND password = :password;");

    $username = isset($_POST['login-username']) ? trim($_POST['login-username']) : null;
    $password = isset($_POST['login-password']) ? trim($_POST['login-password']) : null;
    $password = hash('sha512', $password);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row['results'] > 0){
            //login complete
            $_SESSION["admin_user"] = $row['adminID'];
            header("Location: index.php");
        } else {
            $login_failed = true;
        }


 } ?>
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

    <title>Barry's Bargain Books:: Admin Login</title>
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


    <main id="main" class="login">
        <form id="login-form" method="post" onSubmit="return validateForm(this);" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
            <div class="form-row center logo">

            </div> 
            <div class="form-row">
                <label for="username">Username</label>
                <input id="login-username" name="login-username" type="text" maxlength="20" placeholder="username" data-validate="true" data-validation-type="required">
                <span id="login-username-msg"><!--content generated by javascript --></span>
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input id="login-password" name="login-password" type="password" maxlength="20" placeholder="password" data-validate="true" data-validation-type="required">
                <span id="login-password-msg"><!--content generated by javascript --></span>
            </div>
            
            <div class="form-row center">
                <button type="reset">Reset</button>
                <button type="submit">Login</button>
            </div>
            <?php if ($login_failed) { ?>
            <div id="login-error" class="error">
                <p><i class="fas fa-exclamation-circle"></i>Invalid credentials</p>
            </div>
            <?php }; ?>
        </form>
    </main>


<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>