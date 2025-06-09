<?php
session_start();
session_destroy(); // menghapus semua session
header("Location: login.php"); // kembali ke halaman login
exit;

