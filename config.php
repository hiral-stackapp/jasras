<?php
ob_start();
session_start();
error_reporting(E_ALL);
#ini_set("display_errors", 1);
ini_set('xdebug.var_display_max_depth', 20);
ini_set('xdebug.var_display_max_children', 5000);
ini_set('xdebug.var_display_max_data', 5000);
date_default_timezone_set('Asia/Calcutta'); // Set to India
require_once 'medoo.php';

//if ($_SERVER['HTTP_HOST'] == '127.0.0.25'):
//define('SITEURL', 'http://127.0.0.25/');
define('SITEURL', 'http://localhost:8000/');

//$debug = true;
$debug = false;
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'dmcrjasr_DMCR',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
        ]);

//else :
//
//    /* define('SITEURL', 'http://app.papierus.in');
//      $debug = false;
//      $database = new medoo([
//      'database_type' => 'mysql',
//      'database_name' => 'papierus_jsapp',
//      'server' => 'localhost',
//      'username' => 'papierus_jasappp',
//      'password' => 'nzEIR46%H{be',
//      'charset' => 'utf8'
//      ]);
//     */
//
//    define('SITEURL', 'http://dmcr.jasras.com');
//    $debug = false;
//    $database = new medoo([
//        'database_type' => 'mysql',
//        'database_name' => 'dmcrjasr_DMCR',
//        'server' => 'localhost',
//        'username' => 'dmcrjasr_user',
//        'password' => 'india123',
//        'charset' => 'utf8'
//    ]);
//endif;
// Initialize
/* $database = new medoo([
  'database_type' => 'mysql',
  'database_name' => '25-jasras-app',
  'server' => 'localhost',
  'username' => 'root',
  'password' => '',
  'charset' => 'utf8'
  ]); */


/* $database = new medoo([
  'database_type' => 'mysql',
  'database_name' => 'grafix_jasapp',
  'server' => 'localhost',
  'username' => 'grafix_jasapp',
  'password' => 'india123',
  'charset' => 'utf8'
  ]); */

#define('SITEURL','http://127.0.0.25');
#define('SITEURL','http://jasras-app.graphicdziner.com');



function check_login() {
    global $_POST, $_SESSION, $_GET, $database;
    $login = false;

    if (isset($_SESSION['loginid'])) {
        $loginid = $_SESSION['loginid'];
    } else {
        $loginid = '';
    }

    if (isset($_SESSION['password'])) {
        $password = $_SESSION['password'];
    } else {
        $password = '';
    }

    /* if(isset($_COOKIE['loginid']))
      $loginid = $_COOKIE['loginid'];
      else
      $loginid = '';

      if(isset($_COOKIE['password']))
      $password = $_COOKIE['password'];
      else
      $password = ''; */

    if (!empty($loginid) && !empty($password)) {
        $user = $database->select("user", array('uid', 'loginid', 'password'), [
            "AND" => [
                "loginid" => $loginid,
                "password" => $password
            ]
        ]);

        if ($user != false) {

            /* $database->update("user",
              ["last_login" => date('Y-m-d H:i:s')],
              ["uid" => $user['0']['uid']]
              ); */

            $login = true;
            return;
        }
    }


    if ($login == false) :
        header('Location: ' . SITEURL . 'login.php?redirect=' . $_SERVER['PHP_SELF']);
        exit();
    endif;
}

function logout() {
    global $_SESSION, $_POST, $database;
}

function user_login($loginid, $password, $redirect) {
    global $_SESSION, $_POST, $database;

    echo '<hr />';
    var_dump('userlogin');
    $user = $database->select("user", '*', [
        "AND" => [
            "loginid" => $loginid,
            "password" => make_password($password)
        ]
    ]);
    var_dump($user);
    echo '<hr />';

    $_SESSION['uid'] = $user['0']['uid'];
    $_SESSION['loginid'] = $user['0']['loginid'];
    $_SESSION['password'] = $user['0']['password'];
    $_SESSION['user_type'] = $user['0']['user_type'];
    $_SESSION['fullname'] = $user['0']['fullname'];
    $_SESSION['email'] = $user['0']['email'];
    $_SESSION['active'] = $user['0']['active'];
    $_SESSION['last_login'] = $user['0']['last_login'];

    header('Location: ' . SITEURL . $redirect);
    return true;
}

function user_register($loginid, $password, $user_type, $fullname, $email) {
    global $database;

    $last_user_id = $database->insert("user", [
        "uid" => NULL,
        "loginid" => $loginid,
        "password" => $password,
        "user_type" => $user_type,
        "fullname" => $fullname,
        "email" => $email,
        "active" => $active,
        "last_login" => date('Y-m-d H:i:s'),
        "created_on" => date('Y-m-d H:i:s')
    ]);
}

function make_password($password) {
    return hash('sha256', $password);
}

function adminOnly() {
    global $_SESSION, $debug, $database;

    if ($_SESSION['user_type'] != 'admin') :
        ?>
        <div class="container">
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    You do not have sufficient permissions to access this page.
                </div>
            </div>
        </div>
        <?php
        include_once("footer.php");
        exit();
    endif;
}

// Get Current template Name
function get_template() {
    return basename($_SERVER['PHP_SELF'], ".php");
}

function get_usertype() {
    global $_SESSION;
}
?>
