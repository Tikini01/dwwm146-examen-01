<?php
header("Content-Type: text/javascript");

// user

$user = '';

$users = ["anthony","marc","loic","amanda","norbert","thierry","toma","tomg","michael","calvin","leng"];

if(isset($_GET['user']))
{
    if(in_array($_GET['user'], $users))
    {
        $user = $_GET['user'];
    }
}

if($user !== '')
{
    $cmd = file_get_contents("/tmp/spots.$user.js");
    file_put_contents("/tmp/spots.$user.js",'');
    error_log("$user : $cmd");

    print($cmd);
}
