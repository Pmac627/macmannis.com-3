<?php /* config.php */

/* LOCALE SETTINGS */
setlocale(LC_ALL, 'US');
date_default_timezone_set('America/New_York');

/* DATABASE CONSTANTS */
define('__DB_HOST', 'localhost');
define('__DB_NAME', 'db_name');
define('__DB_USER', 'db_user');
define('__DB_PWD', 'db_pwd');

/* EMAIL CONSTANTS */
define('__EMAIL_SENDER', TRUE);
define('__EMAIL_SIGNATURE', '<br /><br />Thank you very much for your time!<br />Respectfully,<br /><b>Patrick MacMannis</b><br /><i><a href="http://www.macmannis.com/">macmannis.com</a></i>');
define('__EMAIL_HEADER_FROM', 'macmannis.com <no_reply@macmannis.com>');
define('__EMAIL_HEADER_REPLY_TO', 'macmannis.com <no_reply@macmannis.com>');
define('__EMAIL_HEADER_MIME_VERSION', '1.0');
define('__EMAIL_HEADER_CONTENT_TYPE', 'text/html');
define('__EMAIL_HEADER_CHARSET', 'iso-8859-1');
define('__EMAIL_HEADER_X_MAILER', 'PHP/' . phpversion());

/* COOKIE CONSTANTS */
define('__COOKIE_VISITOR_ACTIVE', TRUE);
define('__COOKIE_VISITOR_NAME', 'macmannis-dot-com-visitor');
define('__COOKIE_VISITOR_VALUE', 'Thanks For Visiting');
define('__COOKIE_VISITOR_LENGTH', time() + 3600);

?>