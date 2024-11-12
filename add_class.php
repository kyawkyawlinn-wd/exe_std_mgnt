<?php require_once("./layout/header.php") ?>
<?php $class_name = $description = $class_err = $description_err = ""; 
      $invalid = false;

      if(isset($_GET['class_id'])) {
        $class_id = $_GET['class_id'];
        $class = get_class_id($mysqli, $class_id);
        $class_name = $class['class_name'];
        $description = $class['description'];
      }
?>
<?php if(isset($_POST['class_name'])) {
    $class_name = $_POST['class_name'];
    $description = $_POST['description'];
    if($class_name === "") {
        $class_err = "Name must be fill!!";
    } else {
        if(!preg_match("/^[a-zA-z]+$/", $class_name)) {
            $class_err = "Class name must be string!";
        }
    }
    if($description === "") {
      $description_err = "Need to fill description!!";
    } else {
        if(!preg_match("/^[a-zA-z]+$/", $description)) {
            $description_err = "Description must be text!";
        }
    }
    if($class_err === "" && $description_err === "") {
        if(isset($_GET['class_id'])) {
            if(update_class($mysqli , $class_id, $class_name, $description)) {
                header("location:class_list.php");
            } else {
                $invalid = true;
            }
        } else {
            if (add_class($mysqli, $class_name, $description)) {
                header("Location:class_list.php");
            } else {
                $invalid =true;           
            }
        }
    }
}

?>
<?php if(isset($_GET['class_id'])) { ?>
    <h2 class="text-center">Class Update</h2>
<?php } else { ?>
    <h2 class="text-center">Class Registration</h2>
<?php } ?>
<div class="card">
    <div class="card-body d-flex justify-content-center">
        <div class="col-5">
            <form method="post">
                <?php if($invalid) {?>
                    <div class="alert alert-danger">New class can not be add!</div>
                <?php } ?>
                <div class="form-group my-3 form-floating">
                    <input type="text" class="form-control" name="class_name" id="class_name" placeholder="" value="<?= $class_name ?>">
                    <label for="class_name" class="form-label">Class Name</label>
                    <div class="text-danger" style="font-size: 15px;"><?= $class_err ?></div>
                </div>
                <div class="form-group my-3 form-floating">
                  <textarea name="description" id="description" placeholder="" class="form-control"><?= $description?></textarea>
                  <label for="text" class="form-label">Description</label>  
                  <div class="text-danger" style="font-size: 15px;"><?= $description_err?></div>      
                </div>
                <button type="submit" class="btn btn-outline-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<?php require_once("./layout/footer.php") ?>