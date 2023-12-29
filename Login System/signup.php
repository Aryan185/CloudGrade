<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			
			$user_id = random_num(20);
			$json_string = [];
			$obj = json_encode($json_string);
			$query = "insert into users (user_id,user_name,password, data) values ('$user_id','$user_name','$password','$obj')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!-- <!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<h2>Enter user name:</h2><br>
			<input id="text" type="text" name="user_name"><br><br>
			<h2>Enter password:</h2><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <title>Registration Page</title>
</head>
<body>
    <div class="content bg-img">
        <form action="login.php" method="post" name="val_form">
            <header class="banner">
                <h1 class="head">Registration Form</h1>
            </header>
            <p>Required fields are followed by <label style="color:red;">*</label></p>
            <h2 class="head">Personal Details</h2>

            <p>Name<label style="color:red;">*</label>: <select name="Title" required>
                <option value="Title" selected disabled>Title</option>
                <option required value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
            </select> <input type="text" name="fname" placeholder="First Name" required> <input type="text" name="lname" id="" placeholder="Last Name" required></p>
            <!-- <p class="prof" required>Profession<label style="color:red;">*</label>: <input type="text" name="prof" required>-->            
            <p class="dob" required>Date of Birth<label style="color:red;">*</label>: <input type="date" name="dob" required></p>
            <!-- <label>Gender<label style="color:red;">*</label>:</label>
            <span> Male <input type="radio" name="Gender" checked required > Female <input name="Gender" type="radio"></span> -->
            <p required>Class Code<label style="color:red;">*</label>: <input type="text" name="user_name" id="" required></p>
            <!-- <p>Address</p> 
            <p></p>
            <textarea name="address" id="add" cols="45" rows="8" placeholder="Type in your address here"></textarea>
            <p>Pincode<label style="color:red;">*</label>: <input type="number" name="pincode" maxlength="6" required></p>
            <p>Phone<label style="color:red;">*</label>: <input type="tel" name="phone"></p>
            <p>Your current fitness level<label style="color:red;">*</label><br> Beginner<input type="radio" name="bg" required>
                                                                 Intermediate<input type="radio" name="bg">
                                                                Advanced<input type="radio" name="bg" class="pad">
                                                                 Focused<input type="radio" name="bg" class="pad"> 
            </p> -->
            
            
            <p required>Password<label style="color:red;">*</label>: <input type="password" name="password" class="pass" minlength="8" placeholder="Min 8 characters" required oncopy="false"></p>
            <p required>Re-enter Password<label style="color:red;">*</label>: <input type="password" minlength="8" name="repass" class="pass"></p>
            <div class="btn">
                <input id="button" type="submit" value="Signup" class="signup-btn">
            </div>
        </form>
    </div>
</body>
<style>
body{
    margin: 0;
    font-family: 'Poppins';
    color: #3892b8;
    background-color: rgb(245, 249, 250);
} 
.content{
    justify-content: center;
    display: flex;
    margin: 0 auto;
    text-align: center;
}
h1{
    margin: 0;
}
.head
{
    color: #10749e;;
}
.btn{
    width: 80%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px 0 0 50px;
    text-align: center;
}

.signup-btn{
    text-align: center;
    font-family: 'Poppins';
    font-size: 15px;
    line-height: 1.5;
    color: #fff;
    text-transform: uppercase;
    width: 80%;
    height: 50px;
    border-radius: 25px; 
    background: #3892b8;;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 25px;
}
.signup-btn:hover{
    cursor: pointer;
    background-color: #10749e;;
}
</style>


</html>