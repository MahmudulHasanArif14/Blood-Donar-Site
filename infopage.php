<?php
include 'datefunction.php';
include 'Navpage.php';
include 'Connection.php';
$flag = 0;
//how many data wanna show no
$showLimit = 25;
//geting page no to show data
$pageNo = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$start = ($pageNo - 1) * $showLimit;
$showQuery = "SELECT * FROM `userinfoh` LIMIT $start,$showLimit";

$result = $con->query($showQuery);

//For counting How many record are there in db
$resultCountQuery = $con->query("SELECT * FROM `userinfoh`");
$Count = mysqli_num_rows($resultCountQuery);
$pages = ceil($Count / $showLimit);

$previousPage = $pageNo - 1;
if ($previousPage <= 0) {
  $previousPage = $pages;
}
//Next Page
$NextPage = $pageNo + 1;
if ($NextPage > $pages) {
  $NextPage = 1;
}

//For signup page
if (!empty($_SESSION['name']) && !empty($_SESSION['tel']) && !empty($_SESSION['grp'])) {
  
  $donate_dateQuery = "SELECT * FROM `userinfoh` WHERE `Name` = '{$_SESSION['name']}' AND `pwd` = '{$_SESSION['pwd']}'";
  $s_h_w = $con->query($donate_dateQuery);
}

//For login page
if (!empty($_SESSION['name']) && !empty($_SESSION['pwd'])) {
  $donate_dateQuery = "SELECT * FROM `userinfoh` WHERE `Name` = '{$_SESSION['name']}' AND `pwd` = '{$_SESSION['pwd']}'";
  $s_h_w = $con->query($donate_dateQuery);
  $flag=1;


}










if (isset($_REQUEST['text'])) {
  $text = $_REQUEST['text'];
  if ($text == "find") {
    unset($_SESSION['name']);
    unset($_SESSION['tel']);
    unset($_SESSION['grp']);
    unset($_SESSION['pwd']);
    $flag = 0;
  }
}
?>
<style>
  .btn-hidden {
    visibility: hidden;
  }
</style>
<div class="container-fluid ">
  <div class="text-center pt-5">
    <h1>Welcome to Leading University Blood Donation Society</h1>
    <p>We are committed to saving lives through blood donations.</p>
    <a class="btn btn-primary" href="signuppage.php">Donate now</a>

  </div>
  <div class="row pt-5 px-5">
    <div class="col-lg-6 pt-5">
      <div class="row">

        <?php

        if (isset($_REQUEST['status'])) {

          echo "<div class='text-info fw-bold fs-5 pt-2'>Your Donation Status Updated Successfully.</div>";
        }
        //donate date
        if ($flag == 1) {
          echo "<div class='text-success fw-bold fs-5 pt-2'>Your Last Donation Date is ";
          foreach ($s_h_w as $Show_date) {
            echo $Show_date['donatedate'];
          }
          echo "</div>";
        }





        $showQuery = "SELECT * FROM `userinfoh` LIMIT $start,$showLimit";
        $result = $con->query($showQuery);

        if (isset($_REQUEST['m'])) {
          $msg = $_REQUEST['m'];
          echo "<div class='text-info fw-bold fs-5 pt-2'>" . $msg . "</div>";
        }
        ?>
        <div class="col-lg-6 py-3">
          <form class="form-inline" action="search.php" method="Post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search The Blood Group" name="search" aria-label="Search">
        </div>
        <div class="col-lg-3 py-3">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
        <div class="col-lg-3 py-3">
          <a class="btn btn-outline-success my-2 my-sm-0 <?php
                                                          echo ($flag == 0) ? 'btn-hidden' : ''; ?> " href="edit.php">Edit</a>
        </div>

      </div>
      </form>

      <div class="table-responsive table-responsive-xl">

        <table class="table table-striped table-bordered table-primary table-hover">
          <caption>List of Donner</caption>
          <thead>
            <tr>
              <th scope="col">Serial No </th>
              <th scope="col">Name </th>
              <th scope="col">Mobile No </th>
              <th scope="col">Blood Group </th>
              <th scope="col">Donation Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php

              if ($result) {
                $serial = $start + 1;


                foreach ($result as $row) {
                  $name = $row['Name'];
                  $tel = $row['Tel'];
                  $grp = $row['Grp'];
                  $status = $row['Status'];

                  // Output the data
                  echo "<tr>";
                  echo "<td>$serial</td>";
                  echo "<td>$name</td>";
                  echo "<td>$tel</td>";
                  echo "<td>$grp</td>";
                  echo "<td><button type='button' class='btn " . ($status == 'Eligible' ? 'btn-success' : 'btn-danger') . " btn-sm'>$status</button></td>";
                  echo "</tr>";

                  $serial++;
                }
              } else {
                echo "Error executing query: " . mysqli_error($con);
              }

              ?>


          </tbody>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination">


            <li class="page-item"><a class="page-link" href="infopage.php?page=<?php echo $previousPage ?>">Previous</a></li>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
            ?>
              <li class="page-item <?php echo ($pageNo == $i) ? 'active' : ''; ?>"><a class="page-link" href="infopage.php?page=<?php echo $i ?>">
                  <?php
                  echo $i;
                  ?></a></li><?php
                          } ?>
            <li class="page-item"><a class="page-link" href="infopage.php?page=<?php echo $NextPage ?>">Next</a></li>
          </ul>
        </nav>

      </div>
    </div>

    <div class="col-lg-6 pb-5">
      <img src="Images/Blood donation.jpg" data-aos="fade-up-left" alt="Blood Donation" class="img-fluid">
      <img src="Images/2.png" data-aos="fade-up-left" alt="Blood Donation" class="img-fluid donate">


    </div>
  </div>
</div>




<?php
include 'footer.php';


?>