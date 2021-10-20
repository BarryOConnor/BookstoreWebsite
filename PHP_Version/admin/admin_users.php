
<?php
// start the session
session_start();

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

    <title>Barry's Bargain Books:: Administrator Index</title>
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
                <span class="current">Administrators</span>
            </div>
        </section>

        <h2 class="boc-center">Administrator Index</h2>

    	<div id="paged-list" class="boc-grid-container">
	    	<div class="form-row header">
				<span class="list_actions">Actions</span>
				<span class="list_name">Full Name</span>			
			</div>
      
        	<div class="form-row rollover">
        		<span class="list_name right"><a href="admin_user_add.php" title="Add a new genre">Add a new Administrator</a></span>
			</div>
		

<?php
 
include 'includes/connection.php';
try {
  //query the database to find out many rows in total are in the table 
  $stmt = $connection->prepare("SELECT COUNT(*) as count FROM admin_users");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $number_of_rows = $result['count'];
} catch( PDOExecption $error ) {
	print "Error!: " . $error->getMessage() . "</br>";
}


// set the number of rows per page to show
$rows_per_page = 10;
// calculate the number of pages this result in
$total_pages = ceil($number_of_rows / $rows_per_page);


// check if currentpage is set and a numeric value, if it is set it to that value or default to page 1
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
   $page = (int)$_GET['page'];
} else {
   $page = 1;
} 


//sanity checks for the page being our of the valid range
// if current page is greater than total pages set it to the past page
if ($page > $total_pages) {
   $page = $total_pages;
} 
// if current page is less than first page set current page to first page
if ($page < 1) {
   $page = 1;
}

// the current offset number for how many records to offset by on the current page
$row_offset = ($page - 1) * $rows_per_page;

try {
	// query the database with the page information 
	$stmt = $connection->prepare("SELECT adminID, fullname FROM admin_users LIMIT :offset, :rowsperpage");
	$stmt->bindParam(':offset', $row_offset, PDO::PARAM_INT);
	$stmt->bindParam(':rowsperpage', $rows_per_page, PDO::PARAM_STR);
	$stmt->execute();


	/******  build the html rows ******/
	// display the results in a formatted fashion with icons
	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
  		<div class="form-row rollover">
  			<span class="list_name"><?php echo $result['fullname']; ?></span>
  			<span class="list_edit icon"><a href="admin_user_edit.php?id=<?php echo $result['adminID']; ?>" title="edit this administrator"><i class="fas fa-edit"></i></a></span>
  			<span class="list_delete icon"><a href="javascript:makeSureDelete('admin_user_delete.php?id=<?php echo $result['adminID']; ?>');" title="delete this administrator"><i class="far fa-trash-alt"></i></i></a></span>
  		</div>
  <?php 
	}
} catch( PDOExecption $error ) {
	print "Error!: " . $error->getMessage() . "</br>";
}

//no longer needed so free memory
unset($result);
unset($stmt);

/******  build the pagination links ******/
?>
		<div class="form-row footer">
<?php
// number of pages either side of the current page to link to
$range = 5;

// show links going backward if there are pages to go to otherwise print placeholders
if ($page > 1) {
	$previous_page = $page - 1;
	echo "<a href='{$_SERVER['PHP_SELF']}?page=1' title='previous page'><i class='fas fa-fast-backward'></i></a>"; //link back to page 1
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$previous_page' title='first page'><i class='fas fa-step-backward'></i></a>"; //link back to the previous page
} else {
	echo "<i class='fas fa-fast-backward'></i>"; 
	echo " <i class='fas fa-step-backward'></i>"; 
}

// loop to show links to  the range of pages around current page
for ($loop_count = ($page - $range); $loop_count < (($page + $range) + 1); $loop_count++) {
	if (($loop_count > 0) && ($loop_count <= $total_pages)) {
		//it's a valid page number
		if ($loop_count == $page) {
			echo " [<b>$loop_count</b>] ";  //if it's the current page just highlight
		} else {
			// otherwise make it a link
			echo " <a href='{$_SERVER['PHP_SELF']}?page=$loop_count'>$loop_count</a> ";
		} 
	}  
} 
                 
// if not on last page, show forward and last page links        
if ($page != $total_pages) {
	$next_page = $page + 1;
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$next_page' title='next page'><i class='fas fa-step-forward'></i></a>"; //link forward to the next page
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$total_pages' title='last page'><i class='fas fa-fast-forward'></i></a>"; //link forward to the final page
} else {
	echo " <i class='fas fa-step-forward'></i>"; //link forward to the next page
	echo " <i class='fas fa-fast-forward'></i>"; //link forward to the final page
}
/****** end build pagination links ******/
?>
    	</div>

    </main>

    <footer>
            <!-- Footer bar with copyright -->
            Copyright &copy; 2020 Barry's Bargain Books
    </footer>

<script src="javascript/admin_site.js" lang="javascript"></script>
</body>
</html>