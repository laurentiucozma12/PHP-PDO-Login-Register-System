<?php 
include "../../app/config/config.php";
include ROOT_PATH."/app/services/postService.php";
include ROOT_PATH."/assets/html/head.php";
new postService;
responseService::get();
?>
<div class="wrap d-flex justify-content-center">
    <div class="container wrap col-12">
        <h1 class="mb-4 text-center">Signup</h1>
        <form method="post" class="mb-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <div id="passwordHelpBlock" class="form-text">Password should be at least 8 characters in length, 20 character maximum and should include at least one upper case letter, one number, and one special character.</div>
            </div>
            <div class="mb-3">
                <label for="repeat_password" class="form-label">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" id="repeat_password">
                <div id="passwordHelpBlock" class="form-text">
                    Passwords must be the same  
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Signup</button>
        </form>
        <div class="otherPage">
            <a href="<?php echo WEB_PATH; ?>/app/pages/login.php">Already have an account? Go to login.</a>
        </div>
    </div>
</div>
<?php include ROOT_PATH."/assets/html/footer.php" ?>