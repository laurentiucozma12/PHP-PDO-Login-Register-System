<?php 
include "../../app/config/config.php";
include ROOT_PATH."/app/services/postService.php";
include ROOT_PATH."/assets/html/head.php";
new postService;
$response = responseService::get();
echo $response["message"];
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
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Repeat Password</label>
                <input type="password" name="repeatPassword" class="form-control" id="repeatPassword">
                <div id="passwordHelpBlock" class="form-text">
                    Passwords must be the same  
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Signup</button>
        </form>
        <div class="otherPage">
            <a href="<?php echo ROOT_PATH; ?>/app/pages/login.php">Already have an account? Go to login.</a>
        </div>
    </div>
</div>
<?php include ROOT_PATH."/assets/html/footer.php" ?>