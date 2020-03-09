<?php
if (isset($_POST['submit'])) {
    // initialize flag
    $OK = false;
    // create database connection
    $conn = dbConnect('write', 'pdo');
    // create SQL
    $sql = 'INSERT INTO fan_form (name, address, birthday, email, comments) 
    		VALUES (:name, :address, :birthday, :email, :comments)';
    // prepare the statement
    $stmt = $conn->prepare($sql);
    // bind the parameteres and execute the statement
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $_POST['birthday'], PDO::PARAM_STR);
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
    $subject = 'Fan Club Sign Up';
    // list expected fields
    $expected = ['name', 'address', 'birthday', 'email', 'comments'];
    // set required fields
    $required = ['name', 'address', 'birthday', 'email', 'comments'];
    // set default values for variables that might not exist
    if (!isset($_POST['submit'])) {
        $_POST['submit'] = '';
    }
    // create additional headers
    $headers[] = 'From: Queen<feedback@example.com>';
    $headers[] = 'Content-Type: text/plain; charset=utf-8';
    require './includes/processmail.php';
    if ($mailSent) {
    header('Location: http://site12.wdd.francistuttle.edu/projects/queen/thanks.php');
    exit;
    }
}
?>