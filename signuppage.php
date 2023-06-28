<?php
include 'datefunction.php';
include 'Navpage.php';
if(isset($_REQUEST['donate'])){
$find=$_REQUEST['donate'];
if($find=="find"){
  echo "<script>window.location.href='infopage.php?text=find';</script>";
}
}

echo "<div class=\"container-fluid\">
    <div class=\"text-center pt-5\">
      <h1>Welcome to Leading Blood Donation Society</h1>
      <p>We are committed to saving lives through blood donations.</p>
      <a class=\"btn btn-primary\" href=\"Loginpage.php\">Login</a>
    </div>
    <div class=\"row pt-5\">
      <div class=\"col-lg-6 pt-4 px-5\">
        <form class=\"form-control\" method=\"post\" action=\"insertdata.php\" autocomplete=\"on\">
          <div class=\"mb-2\">
            <label for=\"Name\" class=\"form-label\"> Name </label>
            <input type=\"text\" placeholder=\"Enter Your Name\" class=\"form-control\" id=\"name\" name=\"name\"  pattern=\"[A-Z][a-zA-Z\s]*\" title=\"Please enter a name with the first letter uppercase\"  required autofocus>
      
          </div>
          <div class=\"mb-2\">
            <label for=\"Password\" class=\"form-label\">Password</label>
            <input type=\"password\" placeholder=\"Enter Your Password\" class=\"form-control\" id=\"password\" name=\"password\"  pattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$\" title=\"Must Include Uppercase, Lowercase, Digit, and Special Character\" required>
          </div>
          <div class=\"mb-2\">
            <label for=\"tel\" class=\"form-label pt-3\">Mobile No</label>
            <input type=\"tel\" placeholder=\"Enter Your Mobile Number\" class=\"form-control\" id=\"tel\" name=\"tel\" aria-describedby=\"telHelp\" pattern=\"01[3-9]\d{8}\" title=\"Please enter 11 digits starting with '01'\" required>
            <div id=\"telHelp\" class=\"form-text\">We'll share your Mobile No. with others
            </div>
          </div>
          <div class=\"mb-2\">
            <label for=\"bloodgroup\" class=\"m-2\">Blood Group</label>
            <select id=\"grp\" class=\"form-control\" name=\"grp\">
                <option>O+</option>
                <option>O-</option>
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option selected>Select Blood Group </option>
            </select>";
if(isset($_REQUEST['message'])){
    $msg=$_REQUEST['message'];
    echo "<div class='text-danger fw-bold fs-5 pt-2'>".$msg."</div>";
}
echo "</div>
        <h5 class=\"py-2\">When was the last time you donated your blood?</h5>
        <div class=\"md-form md-outline\" id=\"customDays\">
            <input type=\"date\" id=\"Customization\" class=\"form-control\" name=\"date\" required>
        </div>
        <div class=\"py-2\">  
            <button type=\"submit\" class=\"btn btn-primary\" formenctype=\"multipart/form-data\">Submit</button>
        </div>
        </form>
      </div>
      <div class=\"col-lg-6 pb-5\">
        <img src=\"Images/Blood Donation.jpg\" alt=\"Blood Donation\" class=\"img-fluid\">
      </div>
    </div>
  </div>";
include 'footer.php';
?>
