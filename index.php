<?php
// DON'T TOUCH THIS
// Avoiding direct access to the script files
define('UNLOCK_ACCESS', TRUE);

// INCLUDE THE FILE WITH THE FUNCTIONS
require_once 'config.php';
require_once 'functions.php';


// Show the empty form
if(empty($_POST)){
    include('form-login.php');

}

// What happens when the CAPTCHA was entered incorrectly
else if (!empty($_POST['password']) && empty($_POST['g-recaptcha-response'])) {
    
    // Error message to display above the form
    $msg = 'The reCAPTCHA is incorrect. Try again!';

    include('form-login.php');
    exit();       

} 

// If the CAPTCHA is correct, begins the authentication
else {
    
    // If the form has a password submitted, runs the first step
    if($_POST['password']){
        theVerification($_POST['username'], $_POST['password'], 1);
        
    }

    // if the form has a code submitted, runs the second step
    else if($_POST['code']) {
        theVerification($_POST['username'], $_POST['code'], 2);
        
    }
}

?>