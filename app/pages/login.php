<?php 
include "../../app/config/config.php";
include "../../app/config/connect.php";
include "../../assets/html/head.php";
?>
<div class="wrap d-flex justify-content-center">
    <div class="container wrap col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3 col-xxl-3">
        <h1 class="mb-4 text-center">Login</h1>
        <form class="mb-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="otherPage">
            <a href="<?php echo WEB; ?>/Template/app/pages/signup.php">Dont have an account? Go to signup.</a>
        </div>
    </div>
</div>
<?php include "../../assets/html/footer.php" ?>