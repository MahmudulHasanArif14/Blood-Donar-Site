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
            <div class="ask">
                <h4>Want To Donate Blood or Looking For Blood Donor?</h4>
                <form class="form-control p-3" method="Get" action="signuppage.php">
                    <div class="form-check py-1">
                        <input class="form-check-input" type="radio" name="donate" value="donate">
                        <label class="form-check-label" for="donate">
                            Donate Blood
                        </label>
                    </div>
                    <div class="form-check py-1">
                        <!--for taking input from radio button use value attr-->
                        <input class="form-check-input" type="radio" name="donate" value="find" checked>
                        <label class="form-check-label f-r" for="find">
                            Find Donor
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-lg-6 pb-5">
            <img src="Images/Blood Donation.jpg" data-aos="fade-up-left" alt="Blood Donation" class="img-fluid">

        </div>
    </div>
</div>
<?php
include 'footer.php';

?>