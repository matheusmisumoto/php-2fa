<?php
// Avoid direct access to file
if(!defined('UNLOCK_ACCESS')) { die(); }

function registerUser($username, $email, $password){

    // Create array with new user
    $newUser = array(
        'username' => $username,
        'email' => $email,
        'password' => hash_hmac('sha256', $password, SETTINGS_SECRET),
        'verificationCode' => ''
    );

    // If database file doesn't exists, create one
    if(!file_exists(SETTINGS_FILE.".php")){
        $createFile = fopen(SETTINGS_FILE.".php", "w");
        if($createFile === FALSE){
            die(ERROR01);
        }
    }

    $handle[$username] = include (SETTINGS_FILE.".php");

    // Verify if database is empty
    if(is_array($handle[$username])){
        // If database is not empty, add new user to the end of the array
        array_push($handle[$username], $newUser);
        $register = $handle[$username];
    } else {
        // If database is empty, create the array
        $register = array($newUser);
    }

    // Write the data to file, and unset all variables
    $update = file_put_contents(SETTINGS_FILE.".php",  '<?php if(!defined(\'UNLOCK_ACCESS\')) { die(); } return ' . var_export($register, true) . ';');
    unset($handle, $register, $newUser);
    fclose(SETTINGS_FILE.".php");

    return $update;
}


function sendVerificationMail($address, $code){
    $message = EMAIL_MSG . $code;
    $headers = 'From: '. SETTINGS_SCRIPTNAME .' <'. SETTINGS_NOREPLY .'>';
    $subject = MFA;
    return mail($address, $subject, $message, $headers);
}


function theVerification($username, $password, $step){
    $database = include (SETTINGS_FILE.".php");

    // Search for the username in the array under the key 'username'
    $searchUsername = array_search($username, 
        array_column($database, 'username')
    );

    if($searchUsername === FALSE){
        // Returns that user can't be found
        $msg = ERROR02;
        include 'form-login.php';

    } else {
        // First step: password verification
        if($step == 1){
            // Check if password submitted is the same as the encrypted one
            if($database[$searchUsername]['password'] == hash_hmac('sha256', $password, SETTINGS_SECRET)){
                // If matches, generate and send verification code to the user email, 
                // and register that code on database
                $code = mt_rand(100000,999999);
                $sendMail = sendVerificationMail($database[$searchUsername]['email'], $code);
                $database[$searchUsername]['verificationCode'] = hash_hmac('sha256', $code, SETTINGS_SECRET);
                file_put_contents(SETTINGS_FILE.".php",  '<?php if(!defined(\'UNLOCK_ACCESS\')) { die(); } return ' . var_export($database, true) . ';');
                
                // Check if email was successfully sent
                if(!$sendMail){
                    // If fails, display a error message on form page
                    $msg = ERROR03;
                    include('form-login.php');
                } else {
                    // Otherwise, display the form to enter the verification code
                    include 'form-verification.php';
                }
            } else {
                // Incorrect password error
                $msg = ERROR02;
                include('form-login.php');
            }            
        }
        
        // Second step: email code verification
        else if($step == 2){
            // Check if the code submitted is the same as encrypted one
            if($database[$searchUsername]['verificationCode'] == hash_hmac('sha256', $password, SETTINGS_SECRET)){
                // If matches, user is logged in
                include 'success.php';
            } else {
                // Incorrect code error
                $msg = ERROR04;
                include 'form-verification.php';
            }

        }
    }
}

?>