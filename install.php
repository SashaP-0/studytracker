<?php
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if not exists
    $conn->exec("CREATE DATABASE IF NOT EXISTS studyDB");
    $conn->exec("USE studyDB");

    // create tables

    $conn->exec("CREATE TABLE IF NOT EXISTS tblsubjects (
      subjectID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      subjectname VARCHAR(50) NOT NULL UNIQUE,
      description VARCHAR(200),

    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS tbltopics (
      subjectID INT(3),
      topicno INT(3) RIMARY KEY,
      topicname VARCHAR(50) NOT NULL,
      details VARCHAR(200) NOT NULL,
      laststudied DATE,
      numrepeated INT(3)

      FOREIGN KEY (subjectID) REFRENCES tbltopics(subjectID)
    )");



echo  "<b>Database is ready — tables created successfully.</b>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
