<?php
session_start();
include 'db_connect.php';
$connection = mysqli_connect('localhost', 'root', '', 'hephares');
// execute a SELECT statement to retrieve the most recently updated row from the table
$query = "SELECT * FROM resume ORDER BY res_id DESC LIMIT 1";
$result = mysqli_query($connection, $query);

// check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

// output the data from the most recently updated row
$row = mysqli_fetch_assoc($result);


//make the multiple datas in the table into an array divided by commas so as to call them individually.
$skills = explode(',', $row['res_skill']);
$hobbies = explode(',', $row['res_hobby']);
$institute = explode(',', $row['res_institute']);
$degree = explode(',', $row['res_degree']);
$fromedu = explode(',', $row['res_from']);
$toedu = explode(',', $row['res_to']);
$gpa = explode(',', $row['res_grade']);
$title = explode(',', $row['res_title']);
$employer = explode(',', $row['employer']);
$expfrom = explode(',', $row['expfrom']);
$expto = explode(',', $row['expto']);
$resdesc = explode(',', $row['res_description']);

//counting how many elements are there in the array.
$degreecount=count($degree);
$expcount=count($title);

// close the MySQL connection
mysqli_close($connection);

?>
<html>
<head>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
	<style type="text/css">
		* {
  margin: 0;
  padding: 0;
}
		html, body {
	border: 1px solid;
    width: 210mm;
    height: 297mm;
    margin: 0 auto;
    padding: 0;
  }
	body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.6;
      color: #333;
    }
    h1 {
      font-size: 36px;
      font-weight: bold;
      margin: 0;
    }
    h2 {
      font-size: 24px;
      font-weight: bold;
    }
    ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .section {
      margin-bottom: 30px;
    }
    .section h2 {
      margin-top: 0;
    }
    .grid-container {
  display: grid;
  grid-template-columns: 40% 60%;
}
	.grid-item1{
		background-color: #0d315f;
		color: white;
		height: 297mm;
		padding-left: 20px;
	}
	.grid-item2{
		color:black;
		height: 297mm;
		padding-left: 20px;
	}
	.banner{
		padding-top: 10px;
		padding-bottom: 10px;
		font-weight: bold;
		background-color: #1d334f;
	}
	.bold{
		font-weight: bold;
	}
	.email{
		padding:0 !important;
		margin:0 !important;

	}
	.spacetop{
		padding-top: 15px;
	}
	ul{
		line-height: 1.8em;
	}
	.space{
		padding-top: 15px;
	}
	.topspace{
		margin-top: 10px;
	}
	.botspace{
		padding-bottom: 10px;
	}
	.smallspace{
		position: relative;
		top:-10px;
	}
	.buttons{
		text-align: center;
		padding-top: 20px;
		padding-bottom: 20px;
	}
.button-9 {
  background-color: #405cf5;
  border-radius: 6px;
  border-width: 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-size: 100%;
  height: 44px;
  line-height: 1.15;
  margin: 12px 0 0;
  outline: none;
  overflow: hidden;
  padding: 0 25px;
  position: relative;
  text-align: center;
  touch-action: manipulation;
  width: 100%;
}

.button-9:disabled {
  cursor: default;
}

.button-9:focus {
  box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
}
	}
	.printbtn{
		margin-left: 10px;
	}
	@media print {
  body * {
    visibility: hidden;
  }
  #resumepart * {
    visibility: visible;
    webkit-print-color-adjust: exact;
  }
}
  </style>
</head>
<body>
<div class="grid-container" id="resumepart">
	<div class="grid-item1">
		  <section class="section">
		    <h1><?php echo $row['res_fname'];?><br><?php echo $row['res_lname'];?></h1><br>
		    <span class="smallspace"><?php echo $row['res_profession'];?></span>
		    <div class="banner topspace">About Me</div>
		    <div class="botspace"> 
			<p><?php echo $row['res_aboutme'];?></p>
			</div>
		    <div class="banner">Personal Info</div>
		    <div class="spacetop">
		    <p class="bold">Email</p> 
			<p><?php echo $row['res_email'];?></p>
			</div>
			<div class="spacetop">
		    <p class="bold">Phone</p> 
			<p><?php echo $row['res_phone'];?></p>
			</div>
			<div class="spacetop">
		    <p class="bold">Country</p> 
			<p><?php echo $row['res_country'];?></p>
			</div>
			<div class="spacetop">
		    <p class="bold">City</p> 
			<p><?php echo $row['res_city'];?></p>
			</div>
		  </section>

		  <section class="section">
		    <div class="banner">Skills</div>
		    <ul>
		      <?php 
		  		foreach ($skills as $value) {
    			echo $value . "<br>";
			}
		  	?>
		    </ul>
		  </section>

		  <section class="section">
		    <div class="banner">Hobbies</div>
		    <ul>
		      <?php 
		  		foreach ($hobbies as $value) {
    			echo $value . "<br>";
			}
		  	?>
		    </ul>
		  </section>
		  
	</div>
	<div class="grid-item2">
  
		  <section class="section">
		    <h2>Education</h2>
		    <ul>
		      <li class="space">
		        <h3><?php 
    			echo $degree[0];?></h3>
		        <p><strong><?php 
    			echo $institute[0];?></strong></p>
		        <p><em><?php 
    			echo $fromedu[0];?> - <?php 
    			echo $toedu[0];?></em></p>
		        <p><?php 
    			echo "GPA: $gpa[0]"?></p>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($degreecount > 1) {
  				echo $degree[1];
				}
    			?></h3>
		        <p><strong><?php if ($degreecount > 1) {
    			echo $institute[1];}?></strong></p>
		        <p><em><?php if ($degreecount > 1) {
    			echo $fromedu[1];?> - <?php 
    			echo $toedu[1];}?></em></p>
		        <p><?php if ($degreecount > 1) { 
    			echo "GPA: $gpa[1]";}?></p>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($degreecount > 2) {
  				echo $degree[2];
				}
    			?></h3>
		        <p><strong><?php if ($degreecount > 2) {
    			echo $institute[2];}?></strong></p>
		        <p><em><?php if ($degreecount > 2) {
    			echo $fromedu[2];?> - <?php 
    			echo $toedu[2];}?></em></p>
		        <p><?php if ($degreecount > 2) { 
    			echo "GPA: $gpa[2]";}?></p>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($degreecount > 3) {
  				echo $degree[3];
				}
    			?></h3>
		        <p><strong><?php if ($degreecount > 3) {
    			echo $institute[3];}?></strong></p>
		        <p><em><?php if ($degreecount > 3) {
    			echo $fromedu[3];?> - <?php 
    			echo $toedu[3];}?></em></p>
		        <p><?php if ($degreecount > 3) { 
    			echo "GPA: $gpa[3]";}?></p>
		      </li>
		    </ul>
		  </section>
		  <section class="section">
		    <h2>Experience</h2>
		    <ul>
		      <li>
		        <h3 class="space"><?php 
		        echo $title[0]; ?></h3>
		        <p><strong><?php 
    			echo $employer[0];?></strong></p>
		        <p><em><?php echo $expfrom[0] ?> - <?php echo $expto[0] ?></em></p>
		        <p><em><?php echo $resdesc[0] ?></em>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($expcount > 1){
    			echo $title[1];}?></h3>
		        <p><strong><?php if ($expcount > 1){
    			echo $employer[1];}?></strong></p>
		        <p><em><?php if ($expcount > 1){
		        echo "$expfrom[1] - $expto[1]";} ?></em></p>
		        <p><em><?php if ($expcount > 1){
		        echo $resdesc[1];} ?></em></p>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($expcount > 2){
    			echo $title[2];}?></h3>
		        <p><strong><?php if ($expcount > 2){
    			echo $employer[2];}?></strong></p>
		        <p><em><?php if ($expcount > 2){
		        echo "$expfrom[2] - $expto[2]";} ?></em></p>
		        <p><em><?php if ($expcount > 2){
		        echo $resdesc[2];} ?></em></p>
		      </li>
		      <li>
		        <h3 class="space"><?php if ($expcount > 3){
    			echo $title[3];}?></h3>
		        <p><strong><?php if ($expcount > 3){
    			echo $employer[3];}?></strong></p>
		        <p><em><?php if ($expcount > 3){
		        echo "$expfrom[3] - $expto[3]";} ?></em></p>
		        <p><em><?php if ($expcount > 3){
		        echo $resdesc[3];} ?></em></p>
		      </li>
		    </ul>
		  </section>
	</div>
</div>
<div class="buttons" id="buttons">
<button class="button-9" onclick="downloadPDF()">Download</button>
<button class="button-9" onclick="window.print()">Print</button>
</div>
<script type="text/javascript">
	window.jsPDF = window.jspdf.jsPDF
	function downloadPDF(){
  var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#buttons').click(function () {
        doc.fromHTML($('#resumepart').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
}
</script>
</body>
</html>