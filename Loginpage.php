<?php
include 'datefunction.php';
include 'Connection.php';
include 'Navpage.php';

?>







<div class="container-fluid ">
    <div class="text-center pt-5">
      <h1>Welcome to Leading Blood Donation Society</h1>
      <p>We are committed to saving lives through blood donations.</p>
      <a class="btn btn-primary" href="signuppage.php">Donate Now</a>

    </div>
    <div class="row pt-5">
      <div class="col-lg-6 pt-4 px-5">
        <form class="form-control" method="post" action="profile.php" autocomplete="on">
          <div class="mb-2">
            <label for="Name" class="form-label">Name </label>
            <input type="text" placeholder="Enter Your Name" class="form-control" id="name" name="name"  pattern="[A-Z][a-zA-Z\s]*" title="Please enter a name with the first letter uppercase" required autofocus>
          </div>
          <div class="mb-2">
            <label for="Password" class="form-label">Password</label>
            <input type="password" placeholder="Enter Your Password" class="form-control" id="password" name="password"required>
          </div>
            <div class="py-2">  
                <button type="submit" class="btn btn-primary " formenctype="multipart/form-data" >Login</button>
            </div>
        </form>
       <?php
        if(isset($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
        echo "<div class='text-danger fw-bold fs-5 pt-2'>".$msg."</div>";
        }
        if(isset($_REQUEST['txt'])){
            $msg=$_REQUEST['txt'];
            echo "<div class='text-danger fw-bold fs-5 pt-2'>".$msg."</div>";
        }


        ?>
      </div>

      <div class="col-lg-6 pb-5">
        <img src="Images/Blood Donation.jpg" alt="Blood Donation" class="img-fluid">

      </div>
    </div>
  </div> 





<?php

include'footer.php';
?>