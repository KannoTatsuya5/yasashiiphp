<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo htmlspecialchars($_POST['recipe_name'], ENT_QUOTES);
    // echo '<br>';
    // if($_POST['category'] === '1') echo '和食';
    // if($_POST['category'] === '2') echo '中華';
    // if($_POST['category'] === '3') echo '洋食';
    echo '<br>';

    // if($_POST['difficulty'] === '1') {
    //     echo '簡単';
    // } else if($_POST['diggiculty'] === '2') {
    //     echo '普通';
    // } else {
    //     echo '難しい';
    // }
    // echo '<br>';

    echo match ($_POST['category']) {
        '1' => '和食',
        '2' => '中華',
        '3' => '洋食',
    } . '<br>';

    echo match ($_POST['difficulty']) {
        '1' => '簡単',
        '2' => '普通',
        '3' => '難しい',
    } . '<br>';

    if(is_numeric($_POST['budget'])) {
        echo number_format($_POST['budget']);
    }
    echo '<br>';
    echo nl2br(htmlspecialchars($_POST['howto'], ENT_QUOTES));
?>
</body>
</html>