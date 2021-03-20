<?php
require_once('header.php');
?>


<?php echo "<h1>" . $_SESSION["loggedInFn"] . "'s Favorite Shows</h1>"; ?>

<input type="button" id="add_card" value="Add Show">

<div id="new_card"></div>

<?php
    require_once('./show/show.php');

    $show = new show();

    $shows = $show->getMyShows($_SESSION["user_id"]);

    $arrlength = count($shows);

    for($x = $arrlength - 1; $x >= 0; $x--){
        echo '<div id="show_card">
            <h5 class="card-title">' . $shows[$x]->getShowName() . '</h5>
            <h6 class="card-subtitle>Rating: ' . $shows[$x]->getShowRating() . '</h6>
            <p>' . $shows[$x]->getShowDescription() . '</p>
            <a href="delete_show.php?show-id=' . $shows[$x]->getShowId() . '">Delete Show</a>
        </div>';
    }
?>

<script>
    var cardButton = document.getElementById("add_card");
    cardButton.onclick = function(){
        document.getElementById("new_card").innerHTML += '<div id="new_card">' +
            '<div id="showCard"> ' +
                '<form method="POST" action="show_create.php">' +
                    '<h5>Add Show</h5>' +
                    '<input id="name" name="show_name" required>' +
                    '<input name="show_rating" type="text" required>' +
                    '<textarea name="description" required></textarea>' +
                    '<input type="submit" value="Add Show"> ' +
                '</form>' +
            '</div>' +
            '</div>';

    };
</script>

<?php
require_once('footer.php');
?>