<?php 
include 'db_connect.php';
if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $company=$_POST['company'];
    $industry=$_POST['industry'];
    $pass=$_POST['pass'];
    $a="INSERT INTO `recruiter`(`rec_name`, `rec_email`, `rec_phone`, `rec_company`, `rec_industry`,`rec_pass`) VALUES('$name','$email','$phone','$company','$industry','$pass')";
    if (mysqli_query($con,$a)) {
        echo "<script>window.location.replace('login_rec.php');</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Recruiters | Hephares</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');
      body{font-family: 'Montserrat', sans-serif !important;}
      </style>
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

</div>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-balance"></i></label>
                                <input type="text" name="company" id="company" placeholder="Company Name"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-globe-alt"></i></label>
                                <input type="text" name="industry" id="industry" placeholder="Industry"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/rec-signup-image.jpg" alt="sign up image"></figure>
                        <a href="login_rec.php" class="signup-image-link" style="color:#03cafc;">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>