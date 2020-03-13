<?php
if (isset($_POST['submit'])) {
    // initialize flag
    $OK = false;
    // create database connection
    $conn = dbConnect('write', 'pdo');
    // create SQL
    $sql = 'INSERT INTO emails (name, email, comments) 
    		VALUES (:name, :email, :comments)';
    // prepare the statement
    $stmt = $conn->prepare($sql);
    // bind the parameteres and execute the statement
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':comments', $_POST['comments'], PDO::PARAM_STR);


    // exectue and get number of affected rows
    $stmt->execute();
}
$errors = [];
$missing = [];
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //email processing script
    $to = 'njferrari14@gmail.com';
    $subject = 'Contact Form';
    // list expected fields
    $expected = ['name', 'email', 'comments'];
    // set required fields
    $required = ['name', 'email', 'comments'];
    // set default values for variables that might not exist
    if (!isset($_POST['submit'])) {
        $_POST['submit'] = '';
    }
    // create additional headers
    $headers[] = 'Content-Type: text/plain; charset=utf-8';
    require './public_html/assets/includes/processmail.php';
    if ($mailSent) {
        header('Location: thanks.php');
        exit;
    }
}
?>