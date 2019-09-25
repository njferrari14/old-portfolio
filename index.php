<?php ob_start();
try {
require_once './includes/header.php';
?>

<?php
require_once './includes/footer.php';
} catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>