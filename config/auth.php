<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: ../log-reg/login.php");