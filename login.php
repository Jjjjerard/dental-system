<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location:index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="navstyle.css">
		<title>Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			
			$(function(){
				
				$(".toggle").on("click", function(){
					
					if($(".item").hasClass("active")){
						$(".item").removeClass("active");
					}
					else{
						$(".item").addClass("active");
					}			
				})
			});
					
		</script>
	
	</head>
<body>

	<nav>
		<ul class="menu">
			<li class="logo"><a href="#"><img src="logo.png"></a></li>
			<li class="item"><a href="#">Home</a></li>
			<li class="item"><a href="#">Services</a></li>	
			<li class="item"><a href="#">About Us</a></li>
			<li class="item button"><a href="#">Log In</a></li>
			<li class="item button secondary"><a href="#">Sign Up</a></li>
			<li class="toggle"><a href="#"><span class="bars"></span></a></li>
		<ul>
	</nav>
	
	<h1>Log In</h1>
    <form action="" class="" method="post" autocomplete="off">
        <!-- <label for="email">Email :</label> -->
        <input type="text" name="email" id="email" required value="" placeholder="Email :"> <br>
        <!-- <label for="password">Password :</label> -->
        <input type="text" name="password" id="password" required value="" placeholder="Password :"> <br>
        <p>Forgot Password?</p>
        <button type="submit" name="submit">Login</button>
        <p>Don't have an account?</p>
		<a href="sign_up.php"><p style="color:black">Sign Up</p></a>
    </form>
	
</body>
</html>
