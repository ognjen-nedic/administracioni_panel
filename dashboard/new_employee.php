<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';

$name = $surname = $email = $salary = '';
$errors = array('name'=>'','surname'=>'','email'=>'','salary'=>'');

$pozicije = mysqli_fetch_all(mysqli_query($connection,'SELECT * FROM pozicija'));

if(isset($_POST['submit'])) {
    if(empty($_POST['name'])) {
        $errors['name'] = 'A name is required <br/>';
    } else {
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\sđĐžŽćĆčČ]+$/', $name)){
            $errors['name'] = 'Name must be letters and spaces only <br/>';
        }
    } 

    if(empty($_POST['surname'])) {
        $errors['surname'] = 'A surname is required <br/>';
    } else {
        $surname = $_POST['surname'];
        if(!preg_match('/^[a-zA-Z\sđĐžŽćĆčČ]+$/', $surname)){
            $errors['surname'] = 'Surname must be letters and spaces only <br/>';
        }
    } 

    if(empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address <br/>' ;
        }
    } 

    if(empty($_POST['salary'])) {
        $errors['salary'] = 'A salary is required <br/>';
    } else {
        $salary = $_POST['salary'];
        if(!preg_match('/^[0-9]+$/', $salary)){
            $errors['salary'] = 'Salary must be numbers only <br/>';
        }
    } 

    if(array_filter($errors)) {
    } else {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $surname = mysqli_real_escape_string($connection, $_POST['surname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $salary = mysqli_real_escape_string($connection, $_POST['salary']);
        $position = mysqli_real_escape_string($connection, $_POST['position']);
        
        $sql = "INSERT INTO zaposleni(zaposleni.name,surname,email,salary,position_id) VALUES('$name','$surname','$email','$salary','$position')";
        
        if(mysqli_query($connection, $sql)):
            header('Location: zaposleni.php');
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
    <h2>Add new employee</h2>
    <form name='edit_form' method='POST' action='new_employee.php' class='zaposleni__new-form'>
        <input type='hidden' name='new' value='1' />

        <input type='text' name='name' placeholder='Name' class='zaposleni__edit-form__input-field'/>
        <div><?php echo $errors['name'] ?></div>

        <input type='text' name='surname' placeholder='Surname' class='zaposleni__edit-form__input-field'/>
        <div><?php echo $errors['surname'] ?></div>

        <input type='text' name='email' placeholder='Email' class='zaposleni__edit-form__input-field'/>
        <div><?php echo $errors['email'] ?></div>

        <input type='text' name='salary' placeholder='Salary' class='zaposleni__edit-form__input-field'/>
        <div><?php echo $errors['salary'] ?></div>

        <select name="position" id=""  class="form-select__select">
            <?php foreach($pozicije as $position):
                echo "<option  class='form-select__option' value='{$position[0]}'>$position[1]</option>";
            endforeach; ?>
        </select >
        <div >
            <a href='../dashboard/zaposleni.php' class='cancel-btn' >Cancel</a>
            <input type='submit' name='submit' value='Add' class='btn'/>
        </div>
    </form>
</div>


<?php include '../templates/footer.php' ?>
</body>
</html>