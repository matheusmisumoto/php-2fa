<?php
// Avoid direct access to file
if(!defined('UNLOCK_ACCESS')) { die(); }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><? echo SETTINGS_SCRIPTNAME .' - '. SUCCESS; ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">
        <style type="text/css">
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { display: flex; flex-direction: column; justify-content: center; height: 100vh; background-color: #006400; font-family: 'Roboto'; color: #EFEF; font-weight: 400; font-size: 17px; }
            header, section, main, footer { width: 600px; max-width: 90vw; margin: 0 auto; padding: 1em; }
            a { color: #FFF }
            h1 { font-size: 3em; font-weight: 100; text-align: center; }
            footer p { font-size: 0.8em; color: #AAA; text-align: center; }
        </style>
    </head>
    <body>
        <header>
            <h1><? echo SUCCESS_LOGIN; ?></h1>
        </header>
        <footer>
            <p>Developed by <a href="https://matheusmisumoto.jor.br/" target="_blank">Matheus Misumoto</a></p>
        </footer>
    </body>
</html>