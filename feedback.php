<?php 
session_start();
include 'db_connect.php';
    $query = "SELECT * FROM feedback";
    $result = mysqli_query($con, $query);

// check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($con));
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
</head>
<style type="text/css">
	.heading{
		text-align: center;
		font-weight: bold;
		font-family: 'Poppins', sans-serif;
		font-size: 25px;
		margin-top: 50px;
		margin-bottom: 50px;
	}
		table { border-collapse: collapse; }
		tr:nth-child(3) { border: solid thin; }
		th, td{
			padding-top: 15px;
			padding-bottom: 15px;
			padding-left: 5px;
			padding-right: 5px;
			width: 30px;
			text-align: center;
			border:solid black;
		}
		tr{
			border: solid;
		}
		table{
			border: solid;
			margin-right: 20px;
		}
		td{
			white-space: pre-wrap;
		}
		.blue{
			background-color: #03cafc;
			color: white;
		}
		.grey{
			background-color: #666666;
		}
</style>
<body>
<div class="heading">Review Feedbacks from Users !</div>
<table width="100%">
			<thead>
				<tr>
					<th name="firstname" class="blue" style="width: 20%">Name</th>
					<th name="lastname" class="blue" style="width: 20%">Phone</th>
					<th name="profile" class="blue" style="width: 20%">Mail Address</th>
					<th name="skillset" class="blue" style="width: 40%">Feedback</th>
				</tr>
			</thead>
<?php 
if(mysqli_num_rows($result) > 0) {
					// Loop through results and display them
					while($row = mysqli_fetch_assoc($result)) {
							$mail = $row['f_from'];
							$phone = $row['f_phone'];
							echo "<tr>";
							echo "<td>" . $row['f_name'] . "</td>";
							echo "<td>" . $row['f_phone'] . "</td>";
							echo "<td>" . $row['f_from'] . "</td>";
							echo "<td>" . $row['f_message'] . "</td>";
							//echo "<td><a href='tel:$phone'><img src='images/phone.png' height='30px' width='30px'></a>&nbsp;&nbsp;&nbsp;<a href='mailto:$mail'><img src='images/gmail.png' height='30px' width='30px'></a></td>";
							//echo "<td>" . $row['res_city'] . "," . $row['res_country'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='4'>No data found.</td></tr>";
					} ?>
		</table>
</body>
</html>