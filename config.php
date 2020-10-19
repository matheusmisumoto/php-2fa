<?php

// MAIN SETTINGS
define('SETTINGS_FILE', 'data'); // Database name file
define('SETTINGS_SECRET', 'Example'); // Secret key to encryption
define('SETTINGS_SCRIPTNAME', 'Your Name'); // Name to display on email message
define('SETTINGS_NOREPLY', 'example@example.com'); // Email account used to send the verification messages
define('SETTINGS_GOOGLEPUBLICKEY', 'insert your key here'); // Get a key from https://www.google.com/recaptcha/admin/create

// TRANSLATION
define('ERROR01', 'Arquivo com dados não pode ser criado!'); // Database file couldn't be created
define('ERROR02', 'Usuário ou senha incorreta!'); // Incorrect username or password
define('ERROR03', 'Mensagem com o código de verificação não pode ser enviado para o e-mail cadastrado!'); // Verification code couldn't be sent to user e-mail
define('ERROR04', 'Código de validação incorreto!'); // Incorrect verification code
define('ERROR05', 'O reCAPTCHA está incorreto. Tente novamente!'); // The reCAPTCHA is incorrect. Try again!
define('ERROR06', 'Erro ao apagar o arquivo do banco de dados dos usuários'); // User database file couldn't be deleted
define('ERROR07', 'Não foi possível criar novo usuário. Tente novamente'); // New user couldn't be created. Please try again.
define('ERROR08', 'Preencha todos os campos do formulário'); // Fill in all required fields
define('EMAIL_MSG', 'Seu código único de acesso é: '); // Your unique access code is
define('FORM_USERNAME', 'Usuário'); // Username
define('FORM_PASSWORD', 'Senha'); // Password
define('FORM_NEWUSERNAME', 'Crie um novo usuário'); // Create a new username
define('FORM_NEWEMAIL', 'Digite o e-mail do usuário'); // User e-mail
define('FORM_NEWPASSWORD', 'Crie uma senha para o novo usuário'); // Create a password for the new username
define('FORM_VERIFICATIONCODE', 'Digite o código único de verificação enviado para seu endereço de e-mail'); // Enter the unique verification code sent to your email
define('FORM_SUBMIT', 'Enviar'); // Submit
define('FORM_DELETE', 'Deseja apagar o arquivo de banco de dados dos usuários?'); // Do you want to delete the user database file?
define('FORM_DELETESUBMIT', 'Sim, apagar banco de dados'); // Yes, delete user database
define('LOGIN', 'Login'); // Login
define('MFA', 'Autenticação de dois fatores'); // Two step authentication
define('SETTINGS', 'Definições'); // Settings
define('SUCCESS_LOGIN', 'Login efetuado com sucesso!'); // You are logged in
define('SUCCESS_NEWUSER', 'Usuário criado com sucesso!'); // User created successfully
define('SUCCESS_DELETE', 'Arquivo de banco de dados de usuários apagado com sucesso!'); // User database file successfully deleted

?>