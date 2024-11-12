<?php require_once("./layout/header.php") ?>
<h2>Student</h2>

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="./add_student.php" class="btn btn-secondary btn-sm ">+ Add Student</a>
        </div>
        <div class="card-body">
            <table class="table table-border">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                <?php $student_list = get_all_student($mysqli); $i = 1?>
                <?php while( $student = $student_list->fetch_assoc()) { ?>
                      <tr>
                        <td><?=$i ?></td>
                        <td><?= $student['student_name']?></td>
                        <td><?= $student['student_age']?></td>
                        <td><?= $student['student_email']?></td>
                        <td><?= $student['student_address']?></td>
                      </tr>        
                 <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once("./layout/footer.php") ?>