<?php 
session_start();

include('admin/includes/connection.php');

if(isset($_GET['action'])){

    switch ($_GET['action']) {
        case "add":
            
            if(isset($_GET['id'])){
                try {
                    // query the database with the page information 
                    $stmt = $connection->prepare("SELECT * FROM books WHERE bookID=:id;");
                    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();


                    $book = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    $price = $book['special'] ? $book['offer_price'] : $book['price'];

                    if(empty($_SESSION['basket'])){  
                        $_SESSION['basket'] = array();
                        $_SESSION['basket'][$_GET['id']] = array('id' => $book['bookID'], 'title' => $book['title'], 'quantity' => $_GET['amount'], 'price' => $price, 'image' => $book['image'] );
                    } else  {

                        if(isset($_SESSION['basket'][$_GET['id']]) == $book['bookID']) {
                            $_SESSION['basket'][$_GET['id']]['quantity']+= $_GET['amount'];
                        } else { 
                            $_SESSION['basket'][$_GET['id']] = array('id' => $book['bookID'], 'title' => $book['title'], 'quantity' => $_GET['amount'], 'price' => $price, 'image' => $book['image'] );
                        }

                    }

                } catch( PDOExecption $error ) {
                    print "Error!: " . $error->getMessage() . "</br>";
                }
            }

            break;
        case "update":
            
            if(isset($_GET['id'])){
                if(isset($_SESSION['basket'][$_GET['id']])) {
                    $_SESSION['basket'][$_GET['id']]['quantity'] = $_GET['amount'];
                } 
            }

            break;
        case "remove":
            
            if(isset($_GET['id'])){
                unset($_SESSION['basket'][$_GET['id']]);
            }


            break;
        case "empty":
            unset($_SESSION['basket']);
            break;

        case "save":
            if(!empty($_SESSION['basket'])){
                $stmt = $connection->prepare("DELETE FROM basket WHERE userID=:id;");
                $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                $stmt->execute();
                    
                $basket = "";
                foreach ($_SESSION['basket'] as $item) {
                    $basket.="[" . $item['id'] . "|" . $item['title'] . "|" . $item['quantity'] . "|" . $item['price'] . "|" . $item['image'] . "]";
                };

                $stmt = $connection->prepare("INSERT INTO basket (userID, contents) VALUES (:id, :contents);");
                $stmt->bindParam(':id', $_SESSION["current_user"], PDO::PARAM_INT);
                $stmt->bindParam(':contents', $basket, PDO::PARAM_STR);
                $stmt->execute();

            };
            break;
    }


    if(!empty($_SESSION['basket'])){  
        echo '<div id="basket-items">';
        $total = 0.00;
        foreach ($_SESSION['basket'] as $item) {
            echo '<div class="basket-item"><span class="title">' . $item['title'] . '</span><span class="quantity"> x ' . $item['quantity'] . ' = </span><span class="price">£' . $item['quantity'] * $item['price'] . '</span></div>';
            $total += $item['quantity'] * $item['price'];
        }
        echo '</div>';
        echo '<div class="basket-total">Total £' . $total . '</div>';
    } else  {

       echo '<div id="basket-items">';
        echo '<div class="basket-item">Your Basket is empty</div>';
        echo '</div>';
        echo '<div class="basket-total">Total £0.00</div>';

    }

    


}



?>             
                        