<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['plogin'])) {
	echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else {
	echo "<script type='text/javascript'> document.location = '../'; </script>";
}