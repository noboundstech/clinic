<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Auth Config
| -------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Website details
|--------------------------------------------------------------------------
|
| These details are used in email sent by Aranax Auth library.
|
*/

$config['website_url'] = 'http://localhost/clinic/';
$config['website_name'] = 'Clinic';
$config['webmaster_email'] = 'webmaster@clinic.com';

/*
|--------------------------------------------------------------------------
| Password salt
|--------------------------------------------------------------------------
|
| You can add major salt to be hashed with password. 
| 
| Note: 
|
| Keep in mind that if you change the salt value after user registered, 
| user that previously registered cannot login anymore.
|
*/

$config['aranax_salt'] = '63F13BC2251F7256D6B78AD12BE5D7D6B1836131F40E0004DA4D6619B8029925';