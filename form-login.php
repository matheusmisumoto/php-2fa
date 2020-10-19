<?php
// Avoid direct access to file
if(!defined('UNLOCK_ACCESS')) { die(); }
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
            main { border-radius: 8px; border: 1px solid #666; padding: 1em; box-sizing: border-box; }
            main * { display: block; margin: 0.5em 0; }
            main *:first-child { margin-top: 0; }
            main *:last-child { margin-bottom: 0; }
            input[type='text'], input[type='password'] { 
                background-color: transparent; border: 1px solid #666; 
                padding: 4px; border-radius: 4px; width: 100%; box-sizing: border-box; font-family: 'Roboto'; font-weight: 100; font-size: 1.5em; color: #FFF; }
            input[type='submit'] { border-radius: 4px; border: 0; background: green; color: #FFF; width: 100%; box-sizing: border-box; padding: 0.7em; font-size: 1.2em; font-family: 'Roboto'; font-weight: 700; }
            footer p { font-size: 0.8em; color: #999; }
        </style>
    </head>
    <body>
        <header>
            <h1><? echo LOGIN; ?></h1>
        </header>
<?php
    if($msg == true){ ?>
        <section id="error">
            <p><? echo $msg; ?></p>
        </section>
<?
    }
?>
        <main>
            <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username"><? echo FORM_USERNAME; ?></label>
                <input type="text" name="username" id="username">
                <label for="password"><? echo FORM_PASSWORD; ?></label>
                <input type="password" name="password" id="password">
                <div class="g-recaptcha" data-sitekey="<? echo SETTINGS_GOOGLEPUBLICKEY; ?>"></div>
                <input type="submit" value="<? echo FORM_SUBMIT; ?>">
            </form>
        </main>
        <footer>
            <p>Developed by <a href="https://matheusmisumoto.jor.br/" target="_blank">Matheus Misumoto</a></p>
        </footer>
    </body>
</html>