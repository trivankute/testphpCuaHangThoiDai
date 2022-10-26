<?php
///////////////////////////////////////////////////////
    // database link and defaults
    include_once("../../config/db.php");
    include_once("../../config/default.php");
///////////////////////////////////////////////////////
    // composer
    include_once("../../vendor/autoload.php");
///////////////////////////////////////////////////////
    // models
    include_once("../../model/user.php");
///////////////////////////////////////////////////////
// for Cloudinary
    use Cloudinary\Configuration\Configuration;
// for composer ** must import in each file 
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
// for dbs
    $db = new db();
    $conn = $db->connect();
// for model
    $user = new User($conn);
// for Tokens
    $accessToken = false;
    $refreshToken = false;

    //  Or configure programatically
    $config = Configuration::instance();
    $config->cloud->cloudName = 'dotr7u5kq';
    $config->cloud->apiKey = '134487557496353';
    $config->cloud->apiSecret = 'zMIHrTp6nE36mC6J6bcRDXcKg8o';
    $config->url->secure = true;
?>