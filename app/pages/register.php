<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/services/registerService.php';
include ROOT_PATH.'/assets/html/head.php';
?>
<div class='wrap d-flex justify-content-center'>
    <div class='container wrap col-12'>
        <h1 class='mb-4 text-center'>Register</h1>
        <form class='mb-4' action='./login.php' method='POST'>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email address</label>
                <input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp'>
                <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
            </div>
            <div class='mb-3'>
                <label for='password' class='form-label'>Password</label>
                <input type='password' name='password' class='form-control' id='password'>
                <div id='passwordHelpBlock' class='form-text'>
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class='mb-3'>
                <label for='repeat_password' class='form-label'>Repeat Password</label>
                <input type='password' name='repeat_password' class='form-control' id='repeat_password'>
                <div id='passwordHelpBlock' class='form-text'>
                    Passwords must be the same  
                </div>
            </div>
            <button type='submit' name='register' class='btn btn-primary'>Register</button>
        </form>
        <div class='otherPage'>
            <a href='./login.php'>Already have an account? Go to login.</a>
        </div>
    </div>
</div>
<?php include ROOT_PATH.'/assets/html/footer.php' ?>