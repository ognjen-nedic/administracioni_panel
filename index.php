<?php

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php' ?>
<body>

<div class="container dead-center">
    <strong style="font-size:25px; cursor: default">kaɪrən </strong>
    <form method="POST" action="config/controller.php" class='zaposleni__new-form'>
        <input type="email" name="email" placeholder="E-mail" class='zaposleni__edit-form__input-field'>
        <input type="password" name="password" placeholder="Password" class='zaposleni__edit-form__input-field'>
        <input type="submit" name="log" value="Submit" class='zaposleni__edit-form__input-field'>
    </form>
</div>

<link rel="stylesheet" href="assets/style.css">
<!-- <?php include 'templates/footer.php' ?> -->
</body>
</html>