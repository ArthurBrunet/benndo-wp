<?php

if (preg_match_all("#Windows NT (.*)[;|\)]#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
        $os = 'Windows ' . $version[1][0];
    }

elseif (preg_match_all("#Mac (.*);#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
    $os = 'Mac ' . $version[1][0];
}
elseif (preg_match("#Windows 98#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Windows 98';
}
elseif (preg_match("#Mac#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Mac';
}
elseif (preg_match("#SunOS#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'SunOS';
}
elseif (preg_match("#Fedora#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Fedora';
}
elseif (preg_match("#Haiku#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Haiku';
}
elseif (preg_match("#Ubuntu#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Linux Ubuntu';
}
elseif (preg_match("#FreeBSD#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'FreeBSD';
}
elseif (preg_match("#Linux#", $_SERVER["HTTP_USER_AGENT"]))
{
    $os = 'Linux';
}
else {
    $os = 'Inconnu';
}
$data = "os = ".$os." nav = ".$_SERVER["HTTP_USER_AGENT"] . " ip = " . $_SERVER['REMOTE_ADDR'];

$hash = md5($data);
