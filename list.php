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

use SebastianBergmann\CodeCoverage\Report\PHP;

        try {
            $user = 'mysql';
            $pass = 'mysql';
            $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //sql文の作成
            $sql = 'select * from recipes';

            //sql文の準備
            $stmt = $dbh->query($sql);

            //SQL文の実行
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //PHP_EOL = 改行するための記述
            echo '<table>' . PHP_EOL;
            echo '<tr>' . PHP_EOL;
            echo '<th>料理名</th><th>予算</th><th>難易度</th>' . PHP_EOL;
            echo '<br>' . PHP_EOL;
            foreach($result as $row) {
                echo '<tr>' . PHP_EOL;
                echo '<td>' .  htmlspecialchars($row['recipe_name'],ENT_QUOTES) . '</td>' . PHP_EOL;
                echo '<td>'. htmlspecialchars($row['budget'],ENT_QUOTES) .'</td>' . PHP_EOL;
                echo '<td>' . match ($row['difficulty']) {
                    '1' => '簡単',
                    '2' => '普通',
                    '3' => '難しい',
                } . '</td>' . PHP_EOL;
                echo '</tr>' . PHP_EOL;
            }
            echo '<tr>' . PHP_EOL;
            echo '</table>';
            $dbh = null;
        } catch (PDOException $e){
            echo 'エラー発生' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
            exit;
        }
    ?>
</body>
</html>