<?php


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

// cmd

$cmd = '';

if(isset($_POST['S11']))
{
    if($_POST['S11'] == 1)
    {
        $cmd.="powerON();\n";
    }
}

if(isset($_POST['S10']))
{
    if($_POST['S10'] == 1)
    {
        $cmd.="powerOFF();\n";
    }
}

for($i=1; $i<10; $i++)
{
    if(isset($_POST["S$i"]))
    {
        if($_POST["S$i"] == 1)
        {
            $cmd .= "if(isON) {\n";
            $cmd .= "spot($i,'on');\n";
            $cmd .= "setTimeout(\"spot($i,'standby');\",500);\n";
            $cmd .= "}\n";
        }
    }
}

error_log("$user : $cmd");

if($user != '' && $cmd != '')
{
    if(file_put_contents("/tmp/spots.$user.js",$cmd) !== FALSE)
    {
        print('OK');
    }
    else
    {
        print('KO');
    }
}
