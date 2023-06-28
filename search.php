<?php
include 'datefunction.php';
include 'Connection.php';
include 'Navpage.php';


$dataFound = false; // Flag variable

if (!empty($_REQUEST['search'])) {
  $searchVal = $_REQUEST['search'];
  $searchQuery = "SELECT * FROM `userinfoh` WHERE CONCAT(SI,Name,Tel,Grp) LIKE '%$searchVal%';";
  $query_run = $con->query($searchQuery);
  $datafoundnum = mysqli_num_rows($query_run);
  if ($datafoundnum > 0) {
    $dataFound = true; // Data found, set the flag to true
  }
}

if ($dataFound) {
?> <div class="container-fluid">
    <div class="text-center pt-5">
      <h1>Welcome to Leading University Blood Donation Society</h1>
      <p>We are committed to saving lives through blood donations.</p>
      <a class="btn btn-primary" href="Loginpage.php">Login</a>
    </div>
    <div class="row pt-5">
      <div class="col-lg-6 pt-5 px-5">
        <div class="row">
          <div class="col-lg-6 py-3">
            <form class="form-inline" action="search.php" method="Post">
              <input class="form-control mr-sm-2" type="search" placeholder="Search The Blood Group" name="search" aria-label="Search">
          </div>
          <div class="col-lg-6 py-3">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
          </form>
        </div>
        <div class="table-responsive table-responsive-sm">
          <table class="table table-striped table-bordered table-primary table-hover ">
            <caption>List of Donors</caption>
            <thead>
              <tr>
                <th scope="col">Serial No</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Donation Status</th>
              </tr>
            </thead>
            <tbody> 
<?php
foreach ($query_run as $row) {
  $status = $row['Status']; // Retrieve the donation status from the $row array
  ?>
  <tr>
    <td><?php echo $row['SI']; ?></td>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['Tel']; ?></td>
    <td><?php echo $row['Grp']; ?></td>
    <td><button type="button" class="btn <?php echo ($status == 'Eligible' ? 'btn-success' : 'btn-danger'); ?> btn-sm"><?php echo $status; ?></button></td>
  </tr>
<?php
}
?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-6 pb-5">
        <img src="Images/Blood donation.jpg" alt="Blood Donation" class="img-fluid">
      </div>
    </div>
  </div><?php
      } else {
        echo '<script>window.location.href="infopage.php?m=No Data Found!";</script>';
      }

      include 'footer.php';
        ?>