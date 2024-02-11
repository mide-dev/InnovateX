<?php

// session security

/** Makes sure that any session id can only be passed in using cookies
 * to prevent attacks like session fixation
*/
ini_set('session.use_only_cookies', 1);

/** Makes the session ids more complex and prevent malicious users 
 * from guessing users session id*/ 
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();