<?php 

function add_student($mysqli, $student_name, $student_email, $student_address, $student_age) {
    $sql = "INSERT INTO `students`(`student_name`, `student_email`, `student_address`, `student_age`) VALUES ('$student_name', '$student_email', '$student_address', '$student_age')";
    return $mysqli->query($sql);
}

function get_all_student($mysqli) {
    $sql = "SELECT * FROM `students`";
    return $mysqli->query($sql);
}

function get_student_with_id($mysqli, $student_id) {
    $sql = "SELECT `student_id` FROM `students` WHERE `student_id`='$student_id'";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function update_student($mysqli, $student_id,$student_name, $student_email, $student_address, $student_age) {
    $sql = "UPDATE `students` SET `student_name`='$student_name', `student_email`='$student_email', `student_address`='$student_address', `student_age`='$student_age' WHERE `student_id`='$student_id' ";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_student($mysqli, $student_id) {
    $sql = "DELETE FROM `students` WHERE `student_id`='$student_id' ";
    return $mysqli->query($sql);
}