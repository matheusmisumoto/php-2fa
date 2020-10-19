<?php
// DON'T TOUCH THIS
// Avoiding direct access to the script files
define('UNLOCK_ACCESS', TRUE);

// INCLUDE THE FILE WITH THE FUNCTIONS
require_once 'config.php';
require_once 'functions.php';

if($_POST['action'] == 'resetdb'){
    // First close the database file, then delete it
    fclose(SETTINGS_FILE.".php");
    $deleteFile = unlink(SETTINGS_FILE.".php");
    if($deleteFile == FALSE){
        $error = ERROR06;
    } else {
        $confirmation = SUCCESS_DELETE;
    }
}
if($_POST['action'] == 'addUser'){
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $addNewUser = registerUser($_POST['username'], $_POST['email'], $_POST['password']);
        if($addNewUser == FALSE){
            $error = ERROR07;
        } else {
            $confirmation = SUCCESS_NEWUSER;
        }
    } else {
        $error = ERROR08;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><? echo SETTINGS_SCRIPTNAME .' - '. MFA; ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <style type="text/css">
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { display: flex; flex-direction: column; justify-content: center; height: 100vh; background-color: #222; font-family: 'Roboto'; color: #EFEF; font-weight: 400; font-size: 17px; }
            header, section, main, footer { width: 600px; max-width: 90vw; margin: 0 auto; padding: 1em; }
            a { color: #008df6; }
            h1 { font-size: 3em; font-weight: 100; text-align: center; }
            #error { border-radius: 6px; background-color: #990000; color: #FFF; margin: 1em auto; text-align: center; position: relative; }
            #confirmation { border-radius: 6px; background-color: darkgreen; color: #FFF; margin: 1em auto; text-align: center; position: relative; }
            .formBox { border-radius: 8px; border: 1px solid #666; padding: 1em; box-sizing: border-box; margin-bottom: 3em; }
            section.formBox { margin-bottom: 0; }
            .formBox * { display: block; margin: 0.5em 0; }
            .formBox *:first-child { margin-top: 0; }
            .formBox *:last-child { margin-bottom: 0; }
            input[type='text'], input[type='password'], input[type='email'] { 
                background-color: transparent; border: 1px solid #666; 
                padding: 4px; border-radius: 4px; width: 100%; box-sizing: border-box; font-family: 'Roboto'; font-weight: 100; font-size: 1.5em; color: #FFF; }
            input[type='submit'] { border-radius: 4px; border: 0; background: green; color: #FFF; width: 100%; box-sizing: border-box; padding: 0.7em; font-size: 1.2em; font-family: 'Roboto'; font-weight: 700; }
            #redButton { background-color: #660000;}
            footer p { font-size: 0.8em; color: #999; }
        </style>
    </head>
    <body>
        <header>
            <h1><? echo SETTINGS; ?></h1>
        </header>
<?php
    if($error == true){ ?>
        <section id="error">
            <p><? echo $error; ?></p>
        </section>
<?
    } else if($confirmation == true){ ?>
        <section id="confirmation">
            <p><? echo $confirmation; ?></p>
        </section>
<?
    }
?>

        <main class="formBox">
            <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username"><? echo FORM_NEWUSERNAME; ?></label>
                <input type="text" name="username" id="username">
                <label for="email"><? echo FORM_NEWEMAIL; ?></label>
                <input type="email" name="email" id="email">
                <label for="password"><? echo FORM_NEWPASSWORD; ?></label>
                <input type="password" name="password" id="password">
                <input type="hidden" name="action" value="addUser">
                <input type="submit" value="<? echo FORM_SUBMIT; ?>">
            </form>
        </main>
        <section class="formBox">
            <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <p><? echo FORM_DELETE; ?></p>
                <input type="hidden" name="action" value="resetdb">
                <input type="submit" value="<? echo FORM_DELETESUBMIT; ?>" id="redButton">
            </form>
        </section>
        <footer>
            <p>Developed by <a href="https://matheusmisumoto.jor.br/" target="_blank">Matheus Misumoto</a></p>
        </footer>
    </body>
</html>