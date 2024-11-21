<?php 
	include '../components/connect.php';


if (isset($_POST['submit'])) {
    $id = unique_id();
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $cpass = password_hash($_POST['cpass'], PASSWORD_DEFAULT);
    
    // Handle file upload
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_file/' . basename($image_name);
    
    
    $select_seller = $conn->prepare("SELECT * FROM `seller` WHERE email = ?");
    $select_seller->execute([$email]);

    if ($select_seller->rowCount() > 0) {
        $warning_msg[] = 'Email already exists';
    } else {
        
        if (!password_verify($_POST['cpass'], $pass)) {
            $warning_msg[] = 'Confirm password does not match';
        } else {
           
            if (move_uploaded_file($image_tmp_name, $image_folder)) {
                
                $insert_seller = $conn->prepare("INSERT INTO `seller` (id, name, email, password, image) VALUES (?, ?, ?, ?, ?)");
                $insert_seller->execute([$id, $name, $email, $cpass, $image_folder]);
                $success_msg[] = 'New seller registered! Please login now';
            } else {
                $warning_msg[] = 'Failed to upload image';
            }
        }
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
        <form action = "" method="post" enctype="multipart/form-data" class="register">
            <h3>REGISTER NOW</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your name <span>*</span></p>
                        <input type="text" name="name" placeholder="enter yoyr name" maxlength="50" required class="box">


                    </div>
                    <div class="input-field">
                        <p>Your Email <span>*</span></p>
                        <input type="email" name="email" placeholder="enter yoyr email" maxlength="50" required class="box">
                        

                    </div>

                </div>
                <div class="col">
                    <div class="input-field">
                        <p>Your Password <span>*</span></p>
                        <input type="password" name="pass" placeholder="enter yoyr password" maxlength="50" required class="box">


                    </div>
                    <div class="input-field">
                        <p> confirm Password <span>*</span></p>
                        <input type="password" name="cpass" placeholder=" confirm password" maxlength="50" required class="box">


                    </div>
                </div>   
            </div>
                <div class="input-field">
                        <p>Your profile <span>*</span></p>
                        <input type="file" name="image"  accept="image" required class="box">
                </div>

                        <p class="link"> already have an account? <a href="login.php">login now</a></p>
                        <input type="submit" name="submit" value="register" class="btn">


            

            


        </form>
    </div>

<script src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="../js/script.js"></script>




<?php 
    include '../components/alert.php';

?>

</body>
</html>
