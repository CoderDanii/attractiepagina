<?php
require_once '../admin/backend/config.php';
session_start();
session_destroy();
header("Location: ../index.php");
exit;
