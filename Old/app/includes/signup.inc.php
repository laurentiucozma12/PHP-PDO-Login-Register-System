<?php
include "../../app/config/config.php";

// Grabbing the data
if (isset($_POST["submit"])) {
    $uid = isset($_POST["uid"]);
    $pwd = isset($_POST["pwd"]);
    $pwdRepeat = isset($_POST["pwdrepeat"]);
    $email = isset($_POST["email"]);

    // Instantiate SignupContr class
    include "../../app/classes/dbh.classes.php";
    include "../../app/classes/signup.classes.php";
    include "../../app/classes/signup-contr.classes.php";
    /* 
    include "<?php echo ROOT; ?>/app/classes/signup.classes.php";
    include "<?php echo ROOT; ?>/app/classes/signup-contr.classes.php";
    */
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Running error handler and user signup
    $signup->signupUser();

    // Going to back to front page
    header("location: ../../app/pages/dashboard.php");
}


