<?php 
	include '../components/connect.php';

if(isset($_COOKIE['seller_id'])){
    $seller_id = $_COOKIE['seller_id'];
}else{
    $seller_id = '';
    header('location:loging.php')
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLUE SKY SUMMER - seller register page</title>
    <link rel ="stylesheet" type = "text/css" href ="../css/admin_style.css">

    
</head>
<body class="body">
    
    <div>
        <?php 
    include '../components/admin_header.php';

?>
        
    </div>




<script src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="../js/script.js"></script>




<?php 
    include '../components/alert.php';

?>

</body>
</html>
