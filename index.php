<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if (!empty($_POST)) {

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST['naam'],
        'email' => "ieniminie@sesamstraat.nl",
        'message' => $_POST['message']
    ];

    $setReaction = Reactions::setReaction($postArray);

    if (isset($setReaction['error']) && $setReaction['error'] != '') {
        prettyDump($setReaction['error']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
</head>

<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/_BHkndCP2Rg?si=aMbvYZ6NV5Zh42tI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <h2>reactions</h2>

    <form action="" method="post">
        <input type="text" placeholder="Name here" name="naam">
        <br>
        <textarea id="review" placeholder="Comment here" name="message"></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
    <h2> the reactions here <h2>

            <?php
            echo ("<h2> " . count($getReactions) . " </h2>");
            for ($i = 0; $i < count($getReactions); $i++) {
                echo ("<div class='bericht'>");
                echo ($getReactions[$i]['name'] . " -- ");
                echo ("</div>");
            }
            ?>
</body>

</html>

<?php
$con->close();
?>