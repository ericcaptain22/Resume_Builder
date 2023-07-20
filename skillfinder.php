<?php
			session_start();
			include 'db_connect.php';
			$connection = mysqli_connect('localhost', 'root', '', 'hephares');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Skill Finder</title>
	<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');
      body{font-family: 'Montserrat', sans-serif !important;}
      </style>
	<style type="text/css">
		*{
			border: 0;
			padding: 0;
			font-family: 'Poppins', sans-serif; 
			font-size: 1rem;
		}
		.maindiv{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			border: solid;
			margin-right: 40%;
			margin-left: 40%;
		}
		input[type="text"]{
			border: solid black;
			line-height: 28px;
			padding: 5px;
		}
		select{
			padding: 5px;
			border:solid;
		}
		.submit{
			padding: 10px;
		}
		.submit:hover{
			cursor: pointer;
		}
		.results{
			padding: 20px;
		}
		th, td{
			padding-top: 15px;
			padding-bottom: 15px;
			padding-left: 5px;
			padding-right: 5px;
			width: 30px;
			text-align: center;
			border: solid black;
		}
		table{
			border-collapse: collapse;
			border: solid;
		}
		td{
			white-space: pre-wrap;
		}
		.profile{
			width: 10%;
		}
		.blue{
			background-color: #03cafc;
			color: white;
		}
		.grey{
			background-color: #666666;
		}
	</style>
</head>
<body>
	<div class="maindiv">
		<form method="post">
		Enter the <b>skill</b> to search for :<br><br>
		<input type="text" size="20" placeholder="ex: HTML,CSS,PHP" name="skill" value="<?php echo isset($_POST['skill']) ? $_POST['skill'] : ''; ?>"><br><br>
		Sort By :
		<select name="skillsort">
			<option value="1" selected>Experience</option>
			<option value="2">Newest First</option>
			<option value="3">Oldest First</option>
		</select><br><br>
		<input type="submit" class="submit" name="submit">
		</form>
	</div>
	<div class="results">
		<table width="100%">
			<thead>
				<tr>
					<th name="firstname" class="blue">First Name</th>
					<th name="lastname" class="blue">Last Name</th>
					<th name="profile" class="blue">Profile</th>
					<th name="skillset" class="blue">Skillset</th>
					<th name="profession" class="blue">Profession</th>
					<th name="contact" class="blue">Contact</th>
					<th name="residence" class="blue">Residence</th>
				</tr>
			</thead>
		<?php
			if(isset($_POST['submit']))
			{
				$skill=$_POST['skill'];
				$skillsort=$_POST['skillsort'];
				if($skillsort==1)
				{
					// execute a SELECT statement to retrieve the most recently updated row from the table
					$query = "SELECT * FROM resume WHERE res_skill LIKE '%$skill%' ORDER BY expno DESC";
					$result = mysqli_query($connection, $query);

					// check if the query was successful
					if (!$result) {
	    			die('Query failed: ' . mysqli_error($connection));
					}

					// Check if any results were found
					if(mysqli_num_rows($result) > 0) {
					// Loop through results and display them
					while($row = mysqli_fetch_assoc($result)) {
							$mail = $row['res_email'];
							$phone = $row['res_phone'];
							echo "<tr>";
							echo "<td>" . $row['res_fname'] . "</td>";
							echo "<td>" . $row['res_lname'] . "</td>";
							echo "<td>" . $row['res_aboutme'] . "</td>";
							echo "<td>" . $row['res_skill'] . "</td>";
							echo "<td>" . $row['res_profession'] . "</td>";
							echo "<td><a href='tel:$phone'><img src='images/phone.png' height='30px' width='30px'></a>&nbsp;&nbsp;&nbsp;<a href='mailto:$mail'><img src='images/gmail.png' height='30px' width='30px'></a></td>";
							echo "<td>" . $row['res_city'] . "," . $row['res_country'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='7'>No data found.</td></tr>";
					}
					// output the data from the most recently updated row
					$row = mysqli_fetch_assoc($result);
				}

				if($skillsort==2)
				{
					// execute a SELECT statement to retrieve the most recently updated row from the table
					$query = "SELECT * FROM resume WHERE res_skill LIKE '%$skill%' ORDER BY res_id DESC";
					$result = mysqli_query($connection, $query);

					// check if the query was successful
					if (!$result) {
	    			die('Query failed: ' . mysqli_error($connection));
					}

					// Check if any results were found
					if(mysqli_num_rows($result) > 0) {
					// Loop through results and display them
					while($row = mysqli_fetch_assoc($result)) {
							$mail = $row['res_email'];
							$phone = $row['res_phone'];
							echo "<tr>";
							echo "<td>" . $row['res_fname'] . "</td>";
							echo "<td>" . $row['res_lname'] . "</td>";
							echo "<td>" . $row['res_aboutme'] . "</td>";
							echo "<td>" . $row['res_skill'] . "</td>";
							echo "<td>" . $row['res_profession'] . "</td>";
							echo "<td><a href='tel:$phone'><img src='images/phone.png' height='30px' width='30px'></a>&nbsp;&nbsp;&nbsp;<a href='mailto:$mail'><img src='images/gmail.png' height='30px' width='30px'></a></td>";
							echo "<td>" . $row['res_city'] . "," . $row['res_country'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='7'>No data found.</td></tr>";
					}
					// output the data from the most recently updated row
					$row = mysqli_fetch_assoc($result);
				}

				if($skillsort==3)
				{
					// execute a SELECT statement to retrieve the most recently updated row from the table
					$query = "SELECT * FROM resume WHERE res_skill LIKE '%$skill%' ORDER BY res_id ASC";
					$result = mysqli_query($connection, $query);

					// check if the query was successful
					if (!$result) {
	    			die('Query failed: ' . mysqli_error($connection));
					}

					// Check if any results were found
					if(mysqli_num_rows($result) > 0) {
					// Loop through results and display them
					while($row = mysqli_fetch_assoc($result)) {
							$mail = $row['res_email'];
							$phone = $row['res_phone'];
							echo "<tr>";
							echo "<td>" . $row['res_fname'] . "</td>";
							echo "<td>" . $row['res_lname'] . "</td>";
							echo "<td>" . $row['res_aboutme'] . "</td>";
							echo "<td>" . $row['res_skill'] . "</td>";
							echo "<td>" . $row['res_profession'] . "</td>";
							echo "<td><a href='tel:$phone'><img src='images/phone.png' height='30px' width='30px'></a>&nbsp;&nbsp;&nbsp;<a href='mailto:$mail'><img src='images/gmail.png' height='30px' width='30px'></a></td>";
							echo "<td>" . $row['res_city'] . "," . $row['res_country'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='7'>No data found.</td></tr>";
					}
					// output the data from the most recently updated row
					$row = mysqli_fetch_assoc($result);
				}

				// close the MySQL connection
				mysqli_close($connection);

			}
		?>
	</div>
</body>
</html>