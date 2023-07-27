<?php
    session_start();
    
    $_SESSION["orders"] = "";
    $_SESSION["total"] = 0;
    
    echo "<script>window.location='shoppingcart.php'</script>";
    exit();
?>