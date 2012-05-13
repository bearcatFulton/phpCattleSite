<?php
session_start();
$noRedundance = true;
        for($lcv = 0; $lcv < $_SESSION['cattleInCart']; $lcv++){
            
            $currentCattleName = "name" . $lcv;
            echo $_SESSION[$currentCattleName] . "<br />";
            $cattleInCart = $_SESSION['cattleInCart'];
            $baseCattleName = "name" . $cattleInCart;
            
            if($_SESSION[$currentCattleName] = $_POST[$baseCattleName] && $cattleInCart != $lcv) {
                
                echo "You have already added this item to the trailer. <br />";
                echo "<a href=\"shultsCattle.php\" title=\"Angus Cattle\" id=\"current\">Back to Angus Cattle for Sale</a>";
                $noRedundance = false;
               $lcv = $_SESSION['cattleInCart'];
            }else{
                
            }
        }
        if($noRedundance){
            $_SESSION['cattleInCart']++;
            $_SESSION[$baseCattleName] = $_POST[$baseCattleName];
            echo $_SESSION['name'] . " has been added to your cart." . " You have " . $_SESSION['cattleInCart'] . " cattle in your trailer. <br/>";
            echo "<a href=\"shultsCattle.php\" title=\"Angus Cattle\" id=\"current\">Back to Angus Cattle for Sale</a>";
        }
?>