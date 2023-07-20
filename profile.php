<?php 
session_start();
include 'db_connect.php';
    if (isset($_SESSION['u_id'])) {
    // Retrieve the user ID from the session data
    $u_id = $_SESSION['u_id'];
    // Use the user ID in a SQL query or other code
    // For example:
    }
    $query = "SELECT * FROM usertbl WHERE u_id = '$u_id'";
    $count = "SELECT COUNT(*) AS count_value FROM resume WHERE u_id = '$u_id'";
    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $count);

// check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($con));
}
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		.gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
	</style>
</head>
<body>
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="images/profile.png"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><?php echo $row['u_firstname']?>&nbsp;<?php echo $row['u_lastname']?></h5>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $row['u_email']?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $row['u_phone']?></p>
                  </div>
                </div>
                <h6>Resume Info</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted"><a href="resume.php">Resume</a></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Number of Resume Made :</h6>
                    <p class="text-muted"><?php echo $row2['count_value'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>