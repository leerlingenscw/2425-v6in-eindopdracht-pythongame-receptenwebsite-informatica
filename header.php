<!DOCTYPE html>
<html lang='en'>
<head><title>My App</title>
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name = "Description" content = "My first database app">
<style> * {font-family:sans-serif;}
nav, th {color:white; background-color:navy;padding:5px;}
nav a {color:white; font-weight:bold; text-decoration:none;}
nav a:hover {background-color:green;}
</style>
</head>
<body>
<nav>
<a href="/">Home</a> |
<a href="/people.php">People</a> |
<a href="/products.php">Products</a> |
<a href="/phpinfo.php">PHPInfo</a> |
<a href="/phpliteadmin.php" target="_blank">Admin</a>
</nav>
<?php // enable error reporting
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL & ~E_NOTICE);
