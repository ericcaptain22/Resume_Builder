<?php 
session_start();
include 'db_connect.php';
if(isset($_POST['generate']))
{
    if (isset($_SESSION['u_id'])) {
    // Retrieve the user ID from the session data
    $u_id = $_SESSION['u_id'];
    // Use the user ID in a SQL query or other code
    // For example:
    }
    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $profession=$_POST['profession'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $expno=$_POST['expno'];

    $skill = '';
    // Loop through the $_POST array to concatenate all the institute values
    foreach ($_POST['skill'] as $value) {
    $skill .= $value . ', '; // Concatenate values with a separator
    }
    // Remove the trailing separator
    $skill = rtrim($skill, ', ');
    // Insert the concatenated value into the 'skill' field in the SQL table

    $hobby = '';
    foreach ($_POST['hobby'] as $value) {
    $hobby .= $value . ', ';
    }
    $hobby = rtrim($hobby, ', ');

    $aboutme=$_POST['about_me'];

    $institute = '';
    foreach ($_POST['institute'] as $value) {
    $institute .= $value . ', ';
    }
    $institute = rtrim($institute, ', ');

    $degree = '';
    foreach ($_POST['degree'] as $value) {
    $degree .= $value . ', ';
    }
    $degree = rtrim($degree, ', ');

    $from = '';
    foreach ($_POST['from'] as $value) {
    $from .= $value . ', ';
    }
    $from = rtrim($from, ', ');

    $to = '';
    foreach ($_POST['to'] as $value) {
    $to .= $value . ', ';
    }
    $to = rtrim($to, ', ');

    $grade = '';
    foreach ($_POST['grade'] as $value) {
    $grade .= $value . ', ';
    }
    $grade = rtrim($grade, ', ');

    $title = '';
    foreach ($_POST['title'] as $value) {
    $title .= $value . ', ';
    }
    $title = rtrim($title, ', ');

    $employer = '';
    foreach ($_POST['employer'] as $value) {
    $employer .= $value . ', ';
    }
    $employer = rtrim($employer, ', ');

    $expfrom = '';
    foreach ($_POST['expfrom'] as $value) {
    $expfrom .= $value . ', ';
    }
    $expfrom = rtrim($expfrom, ', ');

    $expto = '';
    foreach ($_POST['expto'] as $value) {
    $expto .= $value . ', ';
    }
    $expto = rtrim($expto, ', ');

    $description = '';
    foreach ($_POST['description'] as $value) {
    $description .= $value . ', ';
    }
    $description = rtrim($description, ', ');


    $a = "INSERT INTO `resume` (`res_fname`,`res_lname`,`res_profession`,`res_email`,`res_phone`,`res_country`,`res_city`,`res_skill`,`res_hobby`,`res_aboutme`,`res_institute`,`res_degree`,`res_from`,`res_to`,`res_grade`,`res_title`,`employer`,`expfrom`,`expto`,`expno`,`res_description`,`u_id`) VALUES ('$fname','$lname','$profession','$email','$phone','$country','$city','$skill','$hobby','$aboutme','$institute','$degree','$from','$to','$grade','$title','$employer','$expfrom','$expto','$expno','$description','$u_id')";
    //var_dump($a);
    if (mysqli_query($con,$a)) {
        echo "<script>window.location.replace('resume.php');</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/loginrec.css">
    <style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');
      body{font-family: 'Montserrat', sans-serif !important;}
      </style>
</head>
<body>
<style type="text/css">
.error
{ color: #ff0000; }
</style>

    <div class="container">
    <h1 class="text-center my-5 fw-bold">Resume Form</h1>
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="token" value="HGsZOXpfNC">
            <div class="border border-dark p-3 mb-3">    
                <h2>Contact</h2>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <label class="form-label">First Name</label>&nbsp;
                        <input type="text" name="first_name" id="first_name" class="form-control"/> 
                    </div>
                    <div>
                        <label class="form-label">Last Name</label>&nbsp;
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profession</label>&nbsp;
                    <input type="text" class="form-control" name="profession" id="profession">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>&nbsp;
                    <input type="email" class="form-control" name="email" id="email" />
                    <div class="form-text text-light">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone number</label>&nbsp;
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Country</label>&nbsp;
                    <input type="text" class="form-control" id="country" name="country"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">City</label>&nbsp;
                    <input type="text" class="form-control" id="city" name="city"/>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Skills</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Skillset Name</label>&nbsp;
                    <input type="text" class="form-control" name="skill[]">
                </div>
                <div id="addSkill"></div>
                <div class="mb-3">
                    <button type="button" id="skill_hide" class="btn btn-primary form-control" onclick="addSkill()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Hobbies</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hobby</label>&nbsp;
                    <input type="text" name="hobby[]" class="form-control" />
                </div>
                <div id="addHobby"></div>
                <div class="mb-3">
                    <button type="button" id="hobby_hide" class="btn btn-primary form-control" onclick="addHobby()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>About Me</h2>
                <div class="form-floating">
                    <textarea class="form-control" name="about_me" style="height:100px;"></textarea>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Education</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">School/College/University</label>&nbsp;
                    <input type="text" name="institute[]" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Study Program</label>&nbsp;
                    <input type="text" name="degree[]" class="form-control">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <label for="exampleInputEmail1" class="form-label">From</label>&nbsp;
                        <input type="text" name="from[]" class="form-control">
                    </div>
                    <div>
                        <label for="exampleInputEmail1" class="form-label">To</label>&nbsp;
                        <input type="text" name="to[]" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CGPA</label>&nbsp;
                    <input type="text" name="grade[]" class="form-control">
                </div>
                <div id="addEducation"></div>
                <div class="mb-3">
                    <button type="button" id="education_hide" class="btn btn-primary form-control" onclick="addEducation()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Experience</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Job Title</label>&nbsp;
                    <input type="text" name="title[]" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Employer</label>&nbsp;
                    <input type="text" name="employer[]" class="form-control">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <label class="form-label">From</label>&nbsp;
                        <input type="text" name="expfrom[]" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">To</label>&nbsp;
                        <input type="text" name="expto[]" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>&nbsp;
                    <input type="text" name="description[]" class="form-control">
                </div>
                <div id="addExperience"></div>
                <div class="mb-3">
                    <button type="button" id="experience_hide" class="btn btn-primary form-control" onclick="addExperience()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">
                    <div class="mb-3">
                    <label class="form-label">Number of Years of Experience Including Months (in decimal)</label>&nbsp;
                    <input type="text" name="expno" class="form-control">
                    </div>
            </div>
            <input style="background:#0d6efd; color:white;" type="submit" class="form-control my-2" name="generate">
        </form>
    </div>
    </div>
    <script src="js/loginform.js"></script>
</body>
</html>