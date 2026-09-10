PHP
<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header('Location: admin/index.php');
} else {
    header('Location: login/login.php');
}
exit;