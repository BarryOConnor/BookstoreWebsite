<?php 
session_start();

include('admin/includes/connection.php');

$wishlist = "";
if (isset($_SESSION["current_user"])) {
    $stmt = $connection->prepare("SELECT contents FROM wishlist WHERE userID=:id;");
    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
    $stmt->execute();
    while ($contents = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $wishlist = $contents['contents'];
    }
}
echo($wishlist);

$book = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_GET['action'])){

    switch ($_GET['action']) {
        case "add":
            
            if(isset($_GET['id'])){

                if(strpos($wishlist, '|' . $_GET['id'] . '|') === false) {
                    $wishlist .= '|' . $_GET['id'] . '|';
                }
                try {
                    $stmt = $connection->prepare("DELETE FROM wishlist WHERE userID=:id;");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->execute();
                        
                    $stmt = $connection->prepare("INSERT INTO wishlist (userID, contents) VALUES (:id, :contents);");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->bindParam(':contents', $wishlist, PDO::PARAM_STR);
                    $stmt->execute();

                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
            }

            break;
        case "remove":
            
            if(isset($_GET['id'])){
                $wishlist = str_replace('|' . $_GET['id'] . '|', '', $wishlist);
                try {
                    $stmt = $connection->prepare("DELETE FROM wishlist WHERE userID=:id;");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->execute();
                        
                    $stmt = $connection->prepare("INSERT INTO wishlist (userID, contents) VALUES (:id, :contents);");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->bindParam(':contents', $wishlist, PDO::PARAM_STR);
                    $stmt->execute();

                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
            }
            break;
        case "empty":
            try {
                    $stmt = $connection->prepare("DELETE FROM wishlist WHERE userID=:id;");
                    $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                    $stmt->execute();

                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
            break;
    }
}
?>             
                        