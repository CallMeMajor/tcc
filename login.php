<?php
session_start();
// require './assets/navbar.php';
if(isset($_POST['btn'])){
    $na=$_POST['na'];
    $em=$_POST['em'];
    $pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $con_pass=password_hash($_POST['con_pass'],PASSWORD_DEFAULT);
    $gen=$_POST['gen'];
    $conn=mysqli_connect('localhost','root','','tcc');
    $query="insert into users(username,email,Pass,con_pass,gender) values ('$na','$em','$pass','$con_pass','$gen')";
    $res=mysqli_query($conn,$query);
    if($res){
        header("location:login.php");
    }
}
?>
<?php
if(isset($_POST['btn1'])){
$em1=$_POST['em1'];
$pass1=$_POST['pass1'];
$conn=mysqli_connect('localhost','root','','tcc');
if($conn){
    $query="select * from users where email='$em1'";
    $res=mysqli_query($conn,$query);
    if($res){
        $data=mysqli_fetch_assoc($res);
        if(password_verify($pass1,$data['Pass'])){
            $_SESSION['status']=$data['status'];
            header('location:index.php');
        }
    }
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

   

</head>
<style>
    :root {
    --primary-color: #000c58;
    --secondary-color: #ff7c00;
    --black: #000000;
    --white: #ffffff;
    --gray: #efefef;
    --gray-2: #757575;

    --facebook-color: #4267B2;
    --google-color: #DB4437;
    --twitter-color: #1DA1F2;
    --insta-color: #E1306C;
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    height: 100vh;
    overflow: hidden;
    background-image: url(pexels-tima-miroshnichenko-6169668.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.container {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
}

.row {
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
}

.col {
    width: 50%;
}

.align-items-center {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.form-wrapper {
    width: 100%;
    max-width: 28rem;
}

.form {
    padding: 1rem;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 1.5rem;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transform: scale(0);
    transition: .5s ease-in-out;
    border: 2px solid var(--primary-color);
    transition-delay: 1s;
}

.input-group {
    position: relative;
    width: 100%;
    margin: 1rem 0;
}

.input-group i {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    font-size: 1.4rem;
    color: var(--gray-2);
}

.input-group input {
    width: 100%;
    padding: 1rem 3rem;
    font-size: 1rem;
    background-color: transparent;
    border-radius: .5rem;
    border: 0.125rem solid var(--primary-color);
    outline: none;
}

.input-group input::placeholder {
  color: white;
}

.input-group input:focus {
    border: 0.125rem solid var(--primary-color);
    color: white;
}

.form button {
    cursor: pointer;
    width: 100%;
    padding: .6rem 0;
    border-radius: .5rem;
    border: none;
    background-color: var(--primary-color);
    color: var(--white);
    font-size: 1.2rem;
    outline: none;
}

.form p {
    margin: 1rem 0;
    font-size: .7rem;
}

.flex-col {
    flex-direction: column;
}

.social-list {
    margin: 2rem 0;
    padding: 1rem;
    border-radius: 1.5rem;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transform: scale(0);
    transition: .5s ease-in-out;
    transition-delay: 1.2s;
}

.social-list>div {
    color: var(--white);
    margin: 0 .5rem;
    padding: .7rem;
    cursor: pointer;
    border-radius: .5rem;
    cursor: pointer;
    transform: scale(0);
    transition: .5s ease-in-out;
}

.social-list>div:nth-child(1) {
    transition-delay: 1.4s;
}

.social-list>div:nth-child(2) {
    transition-delay: 1.6s;
}

.social-list>div:nth-child(3) {
    transition-delay: 1.8s;
}

.social-list>div:nth-child(4) {
    transition-delay: 2s;
}

.social-list>div>i {
    font-size: 1.5rem;
    transition: .4s ease-in-out;
}

.social-list>div:hover i {
    transform: scale(1.5);
}

.facebook-bg {
    background-color: var(--facebook-color);
}

.google-bg {
    background-color: var(--google-color);
}

.twitter-bg {
    background-color: var(--twitter-color);
}

.insta-bg {
    background-color: var(--insta-color);
}

.pointer {
    cursor: pointer;
}

.container.sign-in .form.sign-in,
.container.sign-in .social-list.sign-in,
.container.sign-in .social-list.sign-in>div,
.container.sign-up .form.sign-up,
.container.sign-up .social-list.sign-up,
.container.sign-up .social-list.sign-up>div {
    transform: scale(1);
}

.content-row {
    position: absolute;
    top: 0;
    left: 0;
    pointer-events: none;
    z-index: 6;
    width: 100%;
}

.text {
    margin: 4rem;
    color: var(--white);
}

.text h2 {
    font-size: 3.5rem;
    font-weight: 800;
    margin: 2rem 0;
    transition: 1s ease-in-out;
}

.text p {
    font-weight: 600;
    transition: 1s ease-in-out;
    transition-delay: .2s;
}

.img img {
    width: 30vw;
    transition: 1s ease-in-out;
    transition-delay: .4s;
}

.text.sign-in h2,
.text.sign-in p,
.img.sign-in img {
    transform: translateX(-250%);
}

.text.sign-up h2,
.text.sign-up p,
.img.sign-up img {
    transform: translateX(250%);
}

.container.sign-in .text.sign-in h2,
.container.sign-in .text.sign-in p,
.container.sign-in .img.sign-in img,
.container.sign-up .text.sign-up h2,
.container.sign-up .text.sign-up p,
.container.sign-up .img.sign-up img {
    transform: translateX(0);
}

/* BACKGROUND */

.container::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    height: 100vh;
    width: 300vw;
    transform: translate(35%, 0);
    background-image: linear-gradient(-45deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    transition: 1s ease-in-out;
    z-index: 6;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-bottom-right-radius: max(50vw, 50vh);
    border-top-left-radius: max(50vw, 50vh);
}

.container.sign-in::before {
    transform: translate(0, 0);
    right: 50%;
}

.container.sign-up::before {
    transform: translate(100%, 0);
    right: 50%;
}

/* RESPONSIVE */

@media only screen and (max-width: 425px) {

    .container::before,
    .container.sign-in::before,
    .container.sign-up::before {
        height: 100vh;
        border-bottom-right-radius: 0;
        border-top-left-radius: 0;
        z-index: 0;
        transform: none;
        right: 0;
    }

    /* .container.sign-in .col.sign-up {
        transform: translateY(100%);
    } */

    .container.sign-in .col.sign-in,
    .container.sign-up .col.sign-up {
        transform: translateY(0);
    }

    .content-row {
        align-items: flex-start !important;
    }

    .content-row .col {
        transform: translateY(0);
        background-color: unset;
    }

    .col {
        width: 100%;
        position: absolute;
        padding: 2rem;
        background-color: var(--white);
        border-top-left-radius: 2rem;
        border-top-right-radius: 2rem;
        transform: translateY(100%);
        transition: 1s ease-in-out;
    }

    .row {
        align-items: flex-end;
        justify-content: flex-end;
    }

    .form,
    .social-list {
        box-shadow: none;
        margin: 0;
        padding: 0;
    }

    .text {
        margin: 0;
    }

    .text p {
        display: none;
    }

    .text h2 {
        margin: .5rem;
        font-size: 2rem;
    }
}
.main{
    display: flex;
    align-items: center;
    padding-left: 20px;
    height: 40px;
}
.main1{
    padding-left: 10px;
}
.main2{
    display: flex;
}
.more{
    color: white;
}
.sign{
    color: #ff7c00;
    padding-bottom: 15px;
    padding-top: 10px;
}
.sign1{
    color: #000c58;
    padding-bottom: 15px;
    padding-top: 10px;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 30px;
}
</style>
<body>
<div id="container" class="container">
		<!-- FORM SECTION -->
        <form action="" method="post">
		<div class="row">
			<!-- SIGN UP -->
             
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up" style="border:2px solid #ff7c00;">
                        <h1 class="sign">Sign Up</h1>
						<div class="input-group" style="border:2px solid #ff7c00;border-radius:.5rem;">
							<i class='bx bxs-user'></i>
							<input type="text" name="na" placeholder="Username">
						</div>
						<div class="input-group" style="border:2px solid #ff7c00;border-radius:.5rem;">
							<i class='bx bx-mail-send'></i>
							<input type="email" name="em" placeholder="Email">
						</div>
						<div class="input-group" style="border:2px solid #ff7c00;border-radius:.5rem;">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="pass" placeholder="Password">
						</div>
						<div class="input-group" style="border:2px solid #ff7c00;border-radius:.5rem;">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name='con_pass'  placeholder="Confirm password">
						</div>
                        <div class="col-lg-12" >
                                    <div class="radio-wrapper main mb-30 mt-15">
                                        <label style="color:white;">Gender:</label>
                                        <div class="select-radio main2">
                                            <div class="radio main1">
                                                <input id="radio-1" name="gen" type="radio" value="male">
                                                <label for="radio-1" style="color:white;" class="radio-label">Male</label>
                                            </div>
                                            <div class="radio main1">
                                                <input id="radio-2" name="gen" type="radio" value="female">
                                                <label for="radio-2" style="color:white;" class="radio-label">Female</label>
                                            </div>
                                           
                                        </div>
                                    </div> 
                                </div>
						<button name="btn" style="background-color: #ff7c00;" type="submit" value="submit">
							Sign up
						</button>
						<p style="color: white;">
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
				</div>
			
			</div>
            </form>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
        
		<div class="col align-items-center flex-col sign-in">
            <form action="" method="post">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <h1 class="sign1">Sign In</h1>
						<div class="input-group">
							<i class='bx bxs-user'></i>

							<input type="email" name="em1" placeholder="email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="pass1" placeholder="Password">
						</div>
						<button name="btn1" type="submit" value="submit">
							Sign in
						</button>
						<p class="more">
							<b>
								Forgot password?
							</b>
						</p>
						<p class="more">
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
				</div>
                
				<div class="form-wrapper">
		
				</div>
                </form>
			</div>
        
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Join with us
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
</body>
<script>
       
    let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)
</script>
</html>