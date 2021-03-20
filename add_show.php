<?php
include_once('./header.php');
?>

<!doctype html>
<html lang="en">
    <form action="show_create.php" method="POST">
        <label>Title</label>
        <input type="text" name="show_name">
        <label>Description</label>
        <input type="text" name="description">
        <label>Rating</label>
        <input type="text" name="show_rating">
        <input type="submit" value="Add Show">
    </form>

</html>
