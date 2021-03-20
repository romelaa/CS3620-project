<?php
    require_once('./header.php');
?>


<form method="POST" action="user_delete.php">
    Username: <input type="text" name="username">
    <input type="submit" value="Delete User">
</form>

<?php require_once('./footer.php');
