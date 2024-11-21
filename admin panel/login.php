<?php 
	include '../components/connect.php';


/*if (isset($_POST['submit'])) {
    
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
   
    $select_seller = $conn->prepare("SELECT * FROM `seller` WHERE email = ? AND password = ?");
    $select_seller->execute([$email, $pass]);
    $row = $select_seller->fetch(PDO::FETCH_ASSOC);


    if($select_seller->rowCount() > 0){

        setcookie('seller_id',$row['id'], time()+60*60*24*30, '/');
        header('location:dashboard.php')
    }

    
}*/
if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = $_POST['pass']; 
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    
    $select_seller = $conn->prepare("SELECT * FROM `seller` WHERE email = ? AND password = ?");
    $select_seller->execute([$email, $pass]);
    $row = $select_seller->fetch(PDO::FETCH_ASSOC);

    
    if ($select_seller->rowCount() > 0){
        
        setcookie('seller_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('Location: dashboard.php');
        exit(); 
    } else {
       
        $warning_msg[]= "Invalid email or password.";
    }
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
    <div class="form-container">
        <form action = "" method="post" enctype="multipart/form-data" class="login">

            <h3>LOGIN NOW</h3>

            <div class="input-field">
                        <p>Your Email <span>*</span></p>
                        <input type="email" name="email" placeholder="enter yoyr email" maxlength="50" required class="box">
                        

                    </div>
                    <div class="input-field">
                        <p>Your Password <span>*</span></p>
                        <input type="password" name="pass" placeholder="enter yoyr password" maxlength="50" required class="box">


                    </div>

            
               

                        <p class="link"> do not have an account? <a href="register.php">register now</a></p>
                        <input type="submit" name="submit" value="login now" class="btn">


            

            


        </form>
    </div>

<script src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="../js/script.js"></script>




<?php 
    include '../components/alert.php';

?>

</body>
</html>
