<?php 
include "../../app/config/config.php";
include "../../app/config/connect.php";
include "../../assets/html/head.php";
?>
<div class="wrap d-flex justify-content-center">
    <div class="container wrap col-12">
        <h1 class="mb-4 text-center">Signup</h1>
        <form action="<?php echo WEB; ?>/app/includes/signup.inc.php" method="post" class="mb-4">
            <div class="mb-3">
                <label for="uid" name="uid" class="form-label">Username</label>
                <input type="text" class="form-control" id="uid">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" name="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" name="pwd" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="mb-3">
                <label for="repeatPassword" name="pwdrepeat " class="form-label">Repeat Password</label>
                <input type="password" class="form-control" id="repeatPassword">
                <div id="passwordHelpBlock" class="form-text">
                    Passwords must be the same  
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Signup</button>
        </form>
        <div class="otherPage">
            <a href="<?php echo WEB; ?>/app/pages/login.php">Already have an account? Go to login.</a>
        </div>
    </div>
</div>
<?php include "../../assets/html/footer.php" ?>