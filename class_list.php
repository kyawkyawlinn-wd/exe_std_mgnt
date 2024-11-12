<?php require_once("./layout/header.php") ?>
<h2>Class List</h2>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="./add_class.php" class="btn btn-secondary btn-sm">+ Add Class</a>
    </div>
    <div class="card-body">
      <table class="table table-border">
          <thead>
              <tr>
                <th>No</th>
                <th>Class</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php $class_list = get_all_classes($mysqli); ?>
          <?php $i = 1?>
          <?php  while($class = $class_list->fetch_assoc()) { ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $class['class_name']?></td>
              <td>
                <?= substr($class['description'],0, 60)?>
                <?php if(strlen($class['description'])>100) echo "...." ?>
              </td>
              <td>
                <a class="btn btn-outline-success" href="./add_class.php?class_id=<?= $class['class_id'] ?>"><i class="bi bi-pen"></i></a>
              </td>
            </tr>
          <?php $i++; } ?>
          </tbody>
      </table>
    </div>
</div>

<?php require_once("./layout/footer.php") ?>