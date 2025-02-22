<?php
session_start();
session_destroy();
header("Location: inlog.html");
exit();
?>