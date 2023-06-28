<?php
include 'datefunction.php';
include 'Navpage.php';

?>




<div class="container-fluid ">
    <div class="text-center pt-5">
        <h1>Welcome to Leading University Blood Donation Society</h1>
        <p>We are committed to saving lives through blood donations.</p>
        <a class="btn btn-primary" href="Loginpage.php">Login</a>

    </div>
    <div class="row pt-5">
        <div class="col-lg-6 pt-5 px-5">
            <form class="form-control p-5" method="get" action="status.php">

                <h5 class="py-3">When was the last time you donated your blood?</h5>
                <div class="md-form md-outline" id="customDays">
                    <input type="date" id="Customization" class="form-control" name="date" required>
                </div>
                <div class="py-2">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>



        </div>

        <div class="col-lg-6 pb-5">
            <img src="Images/Blood Donation.jpg" alt="Blood Donation" data-aos="fade-up-left"  class="img-fluid">

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>