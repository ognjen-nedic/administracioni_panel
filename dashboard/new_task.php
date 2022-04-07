<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';
include '../classes/Models/dropdown.php';

$selected_project = $selected_employee = $task_description = $task_deadline = '';

if(isset($_POST['submit'])) {
    $selected_project = mysqli_real_escape_string($connection, $_POST['select_project']);
    $selected_employee = mysqli_real_escape_string($connection, $_POST['select_employee']);
    $task_description = mysqli_real_escape_string($connection, $_POST['task_description']);
    $task_deadline = mysqli_real_escape_string($connection, $_POST['task_deadline']);
    
    $sql = "INSERT INTO zadatak(project_foreign_id,employee_foreign_id,task_description,task_deadline) VALUES('$selected_project','$selected_employee','$task_description','$task_deadline')";
    
    if(mysqli_query($connection, $sql)):
        header('Location: projects.php');
    else:
        echo 'query error' .mysqli_error($connection);
    endif;    
}

$projects = Dropdown::Projects($connection);
$employees = Dropdown::Employees($connection);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="container">
    <h2>Add new task</h2>
    <form name='new-task' method='POST' action="new_task.php" class='zaposleni__new-form'>
        <input type='hidden' name='new' value='1' />

        <select name="select_project" class="form-select__select">
            <option value="" disabled selected>Select project</option>
            <?php foreach($projects as $project):
            echo "<option class='form-select__option' value='{$project[0]}'>$project[1]</option>";
            endforeach; ?>
        </select>

        <select name="select_employee" class="form-select__select">
        <option value="" disabled selected>Select employee in charge</option>
            <?php foreach($employees as $employee):
            echo "<option class='form-select__option' value='{$employee[0]}'>$employee[1] $employee[2]</option>";
            endforeach; ?>
        </select>

        <textarea placeholder='Task description' name="task_description" cols="30" rows="6" class='zaposleni__edit-form__input-field'></textarea>

        <label for="task_deadline">Pick a deadline date</label>
        <input type="date" name="task_deadline" value="<?php echo date('Y-m-d')?>" class='zaposleni__edit-form__input-field'>

        <input type="submit" name="submit" value="Add new task" class="btn">

    </form>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>