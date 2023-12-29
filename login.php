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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d287206300.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Title</title>
</head>
<body>
    <section class="bg-img">
        <div class="top-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md col-xl-5 d-flex align-items-center">
                        <a class="navbar-brand   align-items-center" href="index.html">
                            EnLightment
                            <div class="sub">Cloud Based Evaluation Tool</div>
                        </a>
                    </div>
                    <div class="textcon col-md d-flex align-items-center">
                        <div class="con d-flex">
                            <div class="icon">
                                <span class="symbol-input">
                                    <i class="fa fa-thin fa-clock"></i>
                                </span>
                            </div>
                            <div class="text">
                                <span>Monday - Saturday</span>
                                <strong>8:00AM-8:00PM</strong>
                            </div>
                        </div>
                    </div>
                    <div class="textcon col-md d-flex align-items-center">
                        <div class="con d-flex">
                            <div class="icon">
                                <span class="symbol-input">
                                    <i class="fa fa-regular fa-phone"></i>
                                </span>
                            </div>
                            <div class="text">
                                <div>Reach to us</div>
                                <strong>+91 8976768978</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-end align-items-center">
                        <div class="social-media">
                            <p class="mb-0 d-flex">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <span class="symbol-input">
                                        <img src="images/fb.png" alt="">
                                    </span>
                                </a>
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <span class="symbol-input">
                                        <img src="images/tw.png" alt="">
                                    </span>
                                </a>
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <span class="symbol-input">
                                        <img src="images/ig.png" alt="">
                                    </span>
                                </a>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="login-container" name="val_form" method="post">
            <span class="Login-title">
                Student Login
            </span>
            <div class="Email validate">
                <input class="input" type="text" name="user_name" placeholder="Class Code">
                <span class="symbol">
                    <i class="fa fa-envelope">
                    </i>
                </span>
              
                <!-- <input class="input" type="email" placeholder="Email" name="email"> -->
                
            </div>

            <div class="Pass validate">
                <input class="input" type="password" placeholder="Password" name="password">
                <span class="symbol">
                    <i class="fa fa-lock"></i>
                </span>
            </div>

            <div class="btn">       
			<!-- <input id="button" type="submit" value="Login"><br><br>    -->      
                <input type="submit" name="submit" value="Login" id="login_button" class="login-btn"></input>
            </div>
            <div class="forgot">
                <span class="txt1">Forgot</span>
                <a href="#" class="txt2" id="fpass"> Password? </a>
            </div>
            <div class="new">
                <span class="txt1">New User?</span>
                <a href="signup.php" class="txt2"> "Create your Account"</a>
            </div>
        </form>
    </section>
    <section class="testimonial">
        <div class="container">
            <div class="title">
                <strong>TESTIMONIALS</strong>
                <hr class="bar">
            </div>
        
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="test">
                        <p class="tm d-block w-100">We have been using the portal services for managing pre-admission process for our reputed courses since last 3 years. We have found the system very user-friendly.</p>
                        <div class="d-block w-100 author">
                            Dr. Robert S, Director, Delhi Public School 
                        </div>
                    </div>
                    <div class="test">
                        <p class="tm d-block w-100">We are very satisfied with the portal services who have been providing excellent service to us through online assessment. They are prompt and efficient in their dealings with us and have always provided the best solutions to all our problems.</p>
                        <div class="d-block w-100 author">
                            Dr. M Viswanathan, Chancellor, VIT Vellore
                        </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            
        </div>

    </section>
    <section class="newsletter">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-lg-5">
                        <h2 class="mb-0">Newsletter - Stay tune and get the latest updates</h2>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <form action="" class="subscribe-form">
                            <div class="form-group d-flex align-items-center">
                                <input type="email" class="form-control" placeholder="Enter Email Address">
                                <a href="#" class="btn-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <a href="#">FAQ</a>
            <a href="#">Contact Us</a>
            <a href="#">Terms Of Use</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Exam Policy</a>
            <a class="copyright flex-align-left" href="#">&copy; 2022 | Dev Sinha | Aryan Patel | Kushal Bansal</a>
        </div>
    </footer>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d287206300.js" crossorigin="anonymous"></script>
</body>
<style>
    body{
    font-family: 'roboto', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
    line-height: 1.8;
    font-weight: 400;
    color: #3892b8;
}
strong{
    font-weight:bolder;
}
.bg-img{
    background-image: url(./Images/9175118_6461.jpg);
    background-size: 65%;
    background-repeat: no-repeat;
    background-position: left center;
    background-attachment: fixed;
}
.top-wrap{
    /* background: transparent !important; */
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 3;
    padding: 1.2em 0;
}
.sub{
    font-size: 12px;
    font-family: 'roboto';
}
div
{
    display: block;
}
.container{
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    padding-right: 0.75rem;
    padding-left: 0.75rem;
}
.row{
    display: flex;
    flex-wrap: wrap;
    margin-top: 2px;
    margin-left: 10px;
    margin-right: 10px;
}
.align-items-center{
    -webkit-box-align: center !important;
    align-items: center !important;
}
.d-flex{
    display: flex !important;
}
.col-xl-5{
    -webkit-box-flex: 0;
    flex: 0 0 auto;
    width: 50%;
}
.navbar-brand{
    font-weight: 800;
    font-size: 30px;
    /* color: #fff; */
    z-index: 3;
    position: relative;
    line-height: 1.1;
    text-transform: uppercase;
    margin-right: 0rem;
    margin-bottom: 4px;
}
.icon{
    /* color: #fff; */
    padding-top: 31px;
    font-size: 32 px;
    line-height: 1.5;
}
.top-wrap .text{
    padding-left: 10px;
}
.social-media{
    display: inline-block;
}
img{
    padding-right: 4px;
    max-width: 42px;
}
.login-container{
    width: 290px;
    display: block;
    margin-right: 30px;
}
a{
    font-family: 'roboto';
    font-size: 14px;
    line-height: 1.7;
    color: #3892b8;
    touch-action: manipulation;
    text-decoration: none;
    background-color: transparent;
}
.Login-title{
    font-family: 'roboto';
    font-size: 24px;
    color: #10749e;
    line-height: 1.2;
    text-align: center;
    width: 100%;
    display: block;
    padding: 0 0 20px 0;
}
.validate{
    position: relative;
    margin-bottom: 10px;
    width: 100%;
}
.input{
    font-family: 'roboto', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 15px;
    line-height: 1.5;
    color: #3892b9;
    display: block;
    width: 100%;
    background: #ffffff;
    height: 50px;
    border-radius: 25px;
    border-color:#3892b9;
    padding: 0 30px 0 68px;
}
.symbol{
    font-size: 15px;
    display: flex;
    align-items: center;
    position: absolute;
    border-radius: 25px;
    bottom: 0;
    left: 0;
    width: 10%;
    height: 100%;
    padding-left: 35px;
    color: #3892b9;
}
.btn{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 20px;
    text-align: center;
}

.login-btn{
    text-align: center;
    font-family: 'roboto';
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
.forgot,.new{
    padding-top: 12px;
    text-align: center!important;
}
.txt1{
    font-family: 'roboto';
    font-size: 13px;
    line-height: 1.5;
    color: #3892b8;;
}
.txt2{
    font-family: 'roboto';
    font-size: 13px;
    line-height: 1.5;
    color: #0f5db0;
    font-weight: 400;
}
.login-container{
    margin: 40px 0 0 800px;
    padding-top: 105px;
    font-family: 'roboto',system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}
.testimonial{
    font-family: 'roboto';
    padding: 80px;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    background-color: rgb(245, 249, 250);
}
.title{
    text-align: center;
    padding-bottom: 20px;
    font-size: 18px;
}
.bar{
    width: 75px;
    height: 4px;
}
.test{
    padding: 24px 30px;
    position: relative;
    font-size: 14px;
    line-height: 20px;
    text-align: center;
    width: 100%;
    color: #000;
    font-style: italic;
}
.tm{
    padding-bottom: 18px;
    font-size: 18px;
}
.author{
    color: #0f5db0;
    font-style: normal;
}
.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230f5db0' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
   }   
.carousel-control-next-icon {
     background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230f5db0' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
   }
.carousel-inner{
    width: 90%;
    padding-left: 120px;
}
.newsletter{
    width: 100%;
    position: relative;
    padding: 3rem 0 !important;
    font-size: 16px;
    line-height: 1.8;
    font-weight: 400;
    display: grid;
    justify-content: center;
}
.justify-content-center{
    justify-content: center !important;
}
.d-flex{
    display: flex !important;
}
.col-md-7{
    flex: 0 0 auto;
    width: 100%;
}
.ftco-intro h2{
    font-size: 20px;
    font-weight: 500;
}
.ftco-intro .subscribe-form{
    width: 100%;
}
/* .ftco-intro .subscribe-form .form-group{
    position: relative;
    margin-bottom: 0;
    border-bottom: 8px solid blue;
    border-radius: 0;
}  */
.ftco-intro .subscribe-form .form-group input{
    background: transparent !important;
    color: white !important;
    font-size: 12px;
    padding: 0;
    border-radius: 5px 0 0 5px;
    border: none !important;
    color: #3892b9;
}
.form-control{
    height: 45px;
    display: block;
    width: 100%;
    font-weight: 400;
    line-height: 1.5;
    border: none;
    border-bottom: 2px solid rgb(216, 228, 229);
    color: #3892b9 !important;
    border-color:#3892b9;
}
.mb-0{
    font-size: 18px;
    width: 100%;
    margin-right: 2%;
}
.row{
    display: flex;
    flex-wrap: wrap;
}
.g-lg-5{
    max-width: 100%;
}
.col-md-5{
    width: 100% !important;
    flex: 0 0 auto;
    margin-right: 2%;
    padding-top: 15px;
}
.footer{
    background-color: rgb(245, 249, 250);
    padding-bottom: 20px;
}
footer a{
    display: flex;
    color: #3892b8;
    text-decoration: none;
    padding: 14px 20px;
    float: left;
    font-size: 14px;
    margin-top: 50x;
}
.copyright{
    float: right;
    font-size: 14px;
}
.login-btn:hover{
    cursor: pointer;
    background-color:#0f5db0;
}
a:hover{
    color: #0f5db0;
}
</style>
</html>

