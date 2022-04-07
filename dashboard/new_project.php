<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';

$project_name = $project_description = '';
$errors = array('project_name'=>'','project_description'=>'');

if(isset($_POST['submit'])) {
    if(empty($_POST['project_name'])) {
        $errors['project_name'] = 'A project name is required <br/>';
    } else {
        $project_name = $_POST['project_name'];
    } 

    if(empty($_POST['project_description'])) {
        $errors['project_description'] = 'A project description is required <br/>';
    } else {
        $project_description = $_POST['project_description'];
    } 

    if(array_filter($errors)) {
    } else {
        $project_name = mysqli_real_escape_string($connection, $_POST['project_name']);
        $project_description = mysqli_real_escape_string($connection, $_POST['project_description']);
        
        $sql = "INSERT INTO projekat(project_name,project_description) VALUES('$project_name','$project_description')";
        
        if(mysqli_query($connection, $sql)):
            header('Location: projects.php');
        else:
            echo 'query error' .mysqli_error($connection);
        endif;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="container">
    <h2>Add new project</h2>
    <form name='new-project' method='POST' action='new_project.php' class='zaposleni__new-form'>
        <input type='hidden' name='new' value='1' />

        <input type='text' name='project_name' placeholder='Project name' class='zaposleni__edit-form__input-field'/>
        <div><?php echo $errors['project_name'] ?></div>

        <textarea placeholder='Project description' name="project_description" cols="30" rows="10" class='zaposleni__edit-form__input-field'></textarea>

        <div >
            <a href='../dashboard/projects.php' class='cancel-btn' >Cancel</a>
            <input type='submit' name='submit' value='Add' class='btn'/>
        </div>
    </form>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>