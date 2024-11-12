<?php 

$mysqli = new mysqli("localhost", "root", "");

if($mysqli->connect_error) {
    echo "Cannot connect to Database";
} else {
    $sql = "CREATE DATABASE IF NOT EXISTS `exe_std_mgnt`";
    if($mysqli->query($sql)) {
        if($mysqli->select_db("exe_std_mgnt")) {
            if(!create_tables($mysqli)) {
                echo "Cannot create table";
                die();
            } 
        }
    }
}

function create_tables($mysqli) {
    $sql = "CREATE TABLE IF NOT EXISTS `students`(`student_id` INT AUTO_INCREMENT,`student_name` VARCHAR(45) NOT NULL ,`student_address` VARCHAR(45),`student_age` INT NOT NULL,`student_email` VARCHAR(60) NOT NULL, PRIMARY KEY(student_id) )";
    if(!$mysqli->query($sql)) {
        return false;   
    }

    $sql = "CREATE TABLE IF NOT EXISTS `classes`(`class_id` INT AUTO_INCREMENT,`class_name` VARCHAR(150) NOT NULL,`description` VARCHAR(225) NOT NULL, PRIMARY KEY(`class_id`) )";
    if(!$mysqli->query($sql)) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `teachers`(`teacher_id` INT AUTO_INCREMENT,`teacher_name` VARCHAR(45) NOT NULL,`teacher_email` VARCHAR(60) NOT NULL,`exp` INT NOT NULL, PRIMARY KEY(`teacher_id`) )";
    if(!$mysqli->query($sql)) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `batches`(`batch_id` INT AUTO_INCREMENT,`batch_name` VARCHAR(225) NOT NULL,`start_date` DATETIME NOT NULL,`end_date` DATETIME NOT NULL,`fees` INT NOT NULL,`description` VARCHAR(225) NOT NULL,`teacher_id` INT NOT NULL,`class_id` INT NOT NULL, PRIMARY KEY(`batch_id`), FOREIGN KEY(`teacher_id`) REFERENCES `teachers`(`teacher_id`), FOREIGN KEY(`class_id`) REFERENCES `classes`(`class_id`) )";
    if(!$mysqli->query($sql)) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `student_batches`(`student_batch_id` INT AUTO_INCREMENT,`student_id` INT NOT NULL,`batch_id` INT NOT NULL, PRIMARY KEY(`student_batch_id`), FOREIGN KEY(`batch_id`) REFERENCES batches(`batch_id`), FOREIGN KEY(`student_id`) REFERENCES `students`(`student_id`) )";
    if(!$mysqli->query($sql)) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `attendences`(`attendence_id` INT AUTO_INCREMENT,`student_batch_id` INT NOT NULL,`leave` BOOLEAN NOT NULL DEFAULT FALSE,`present` BOOLEAN NOT NULL DEFAULT FALSE,`date` DATETIME NOT NULL, PRIMARY KEY(`attendence_id`), FOREIGN KEY(`student_batch_id`) REFERENCES `student_batches`(`student_batch_id`) )";
    if(!$mysqli->query($sql)) {
        return false; 
    }

    return true ;
}




// $mysqli = new mysqli("localhost", "root", "");

// if($mysqli->connect_error) {
//     echo "Cannot connect to Database";
// } else {
//     $sql = "CREATE DATABASE IF NOT EXISTS exedatabase";
//    if($mysqli->query($sql)) {
//         if($mysqli->select_db("exedatabase")) {
//             if(!create_table($msqli)) {
//                 echo "cannot create table";
//                 die();
//             }
//         }
//    }
// }

// function create_table($mysqli) {
//     $sql = "CREATE TABLE IF NOT EXISTS `student`(`student_id` INT NOT NULL AUTO_INCREMENT,`student_name`,`student_age`,`student_address`,`student_email`, PRIMARY KEY (`student_id`))";
//     if(!$mysqli->query($sql)) {
//         return false;
//     } 
//     return true;
// }















