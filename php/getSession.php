<?php
session_start();
echo json_encode(["rol" => $_SESSION['rol'] ?? '']);
?>
