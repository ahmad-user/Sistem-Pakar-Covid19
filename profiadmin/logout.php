<?php
session_start();
if (isset($_SESSION['nama'])) 
{
	session_destroy();
	header('Location: ../index.php');	
}
?>