<?php

function add_class($mysqli, $class_name, $description)
{
    $sql = "INSERT INTO `classes`(`class_name`,`description`) VALUES ('$class_name','$description')";
    return $mysqli->query($sql);
}

function get_all_classes($mysqli) 
{
   $sql = "SELECT * FROM `classes`";
   return $mysqli->query($sql);
}

function get_class_id($mysqli, $class_id) 
{
   $sql = "SELECT * FROM `classes` WHERE `class_id`='$class_id' ";
   $result = $mysqli->query($sql);
   return $result->fetch_assoc();
}

function update_class($mysqli, $class_id, $class_name, $description) 
{
   $sql = "UPDATE `classes` SET `class_name`='$class_name', `description`='$description' WHERE `class_id`= '$class_id' ";
   return $mysqli->query($sql);
}

function delete_class($mysqli, $class_id)
{
  $sql = "DELETE FROM `classes` WHERE `class_id`='$class_id' ";
  $result = $mysqli->query($sql);
  return $result->fetch_assoc();
}