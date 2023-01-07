# PHP Two-Factor Authentication

Example of two factor authentication login form using PHP without database.

The login data is stored on a PHP file, hidden from the user. Its content is also unreachable from direct access.

## Configuration

The `config.php` file contains the settings and the translation of this script.

## The data storage

You can register new users by accessing `admin.php`. 

The data, including an encrypted password, is stored on a PHP file, which name is defined on settings. 

If there is no data file, the script will create one.

The data file can also be deleted by clicking on a button on the same page.

## Login process

The user is first prompted to enter his username and password. A reCAPTCHA verification is also required.

If username, password and reCAPTCHA are correct, the script will send an email to the respective user with a unique access code.

Then, the user is required to type and submit the access code to access the success page.

Any failures during the process results in a message error displayed to the user.