<?php
session_start();
include('db_connect.php');
if(isset($_POST['login']))
{


    $username=$_POST['email'];
    $password=$_POST['pass'];
    $key="SELECT * FROM recruiter where rec_email='$username'and rec_pass='$password'";
    $eqr=mysqli_query($con,$key);
    $check=$eqr->fetch_assoc();
    if($check)
    {
        echo $rec_id=$check['rec_id'];
        echo $_SESSION['rec_id']=$rec_id;
        echo "<script>window.location.replace('Rec_DashBorad/dash_rec.php');</script>";
    }
    else
    {
        echo "<script>alert('Username and Password Mismatch')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in - Recruiters | Hephares</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<SECTION>
<div class="expand">
<h2>
<span class="b1">H</span><span class="b-1">ighlight</span>
<span class="b2">E</span><span class="b-2">xperience</span>
<span class="b3">P</span><span class="b-3">erfect</span>
<span class="b4">H</span><span class="b-4">onest</span>
<span class="b5">A</span><span class="b-5">nd</span>
<span class="b6">R</span><span class="b-6">esume</span>
<span class="b7">E</span><span class="b-7">mitting</span>
<span class="b8">S</span><span class="b-8">ource</span>
</h2> 
<style>
section
{
font-family: 'Poppins', sans-serif;
display: flex;
justify-content: center;
align-items: center;
min-height: 2vh;
}

h2
{
   margin: 0;
   padding-bottom: 5%;
   font-size: 35px;
   font-weight: bolder;
   text-transform: uppercase;
}
h2 span
{
   display: inline-flex;
   color: #03cafc;
}
h2 span:nth-child(even)
{
   overflow: hidden;
   transition: ease-in-out 0.5s;
   color: black;
   border-bottom: 4px solid #03cafc;
   letter-spacing: -3rem;
 
}
h2:hover span:nth-child(even)
{
   letter-spacing: 0;
}
h2:hover span:nth-child(2)
{
   transition-delay: 0s;
}
h2:hover span:nth-child(4)
{
   transition-delay: 0.5s;
}
h2:hover span:nth-child(6)
{
   transition-delay: 1s;
}
h2:hover span:nth-child(8)
{
   transition-delay: 1.5s;
}
h2:hover span:nth-child(10)
{
   transition-delay: 2s;
}
h2:hover span:nth-child(12)
{
   transition-delay: 2.5s;
}
h2:hover span:nth-child(14)
{
   transition-delay: 3s;
}
h2:hover span:nth-child(16)
{
   transition-delay: 3.5s;
}


   </style>
</div>
</SECTION>

<div class="main">
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                     
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>