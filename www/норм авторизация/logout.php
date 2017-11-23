<?php
session_start();
unset($_SESSION['token']);
unset($_SESSION9['first_name']);
unset($_SESSION9['photo_50']);
header('location: /');
?>