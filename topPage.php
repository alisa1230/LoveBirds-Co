<?php
include("functions.php");

// DB接続
$pdo = connect_to_db();
//todo
$sql = "SELECT id, todoText , todoName ,todoDate
         FROM lb_todo_table WHERE todofinishCB = 0 ";

// SQL準備&実行
$stmt = $pdo->prepare($sql,);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $todo = "";
    $output = "";

    foreach ($result as $record) {
        // $output .= "<tr>";
        $todo .= "<tr><td>{$record["todoText"]}　</td></tr>";
        $output .= "<tr>";
        $output .= "<td>{$record["todoName"]}　</td>";
        $output .= "<td>{$record["todoDate"]}　</td>";
        $output .= "<td><a href='finishCB.php?id={$record["id"]}'>完了</a></td>";
        $output .= "</tr>";
    }
}

//ミッションのSQL文
$sql2 = "SELECT id,missionText FROM lb_mission_table WHERE missionFinishCB = 0 ";
// SQL準備&実行
$stmt2 = $pdo->prepare($sql2,);
$status2 = $stmt2->execute();
// データ登録処理後
if ($status2 == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt2->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $mission = "";



    foreach ($result2 as $record2) {


        $mission .= "<tr><td>{$record2["missionText"]}　</td></tr>";
        $output .= "<tr>";
        $output .= "<td><a href='finishCB.php?id={$record2["id"]}'>完了</a></td>";
        $output .= "</tr>";
    }

    unset($value);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../htdocs/LoveBirds&Co/css/all.css" rel="stylesheet">
    <style>
        div ul li {
            display: inline;
            list-style: none;
            margin-right: 10px;
        }

        .title {
            color: DarkCyan;
            font-size: 28px;
        }

        .select {

            position: fixed;

            bottom: 0px;



        }

        a {
            text-decoration: none;

        }

        a:hover {
            opacity: 0.6;
        }

        .select ul a {
            text-decoration: none;
            font-size: 18px;
        }

        .select ul a:hover {
            opacity: 0.6;
        }

        .select ul li {
            background-color: MediumAquaMarine;
            padding: 5px 15px;
            border-radius: 10%;
            color: beige;
            font-size: 18px;
            margin-top: 10px;
            border-style: none;
            font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
        }

        header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .table {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        table {
            color: DarkCyan;
            font-size: 20px;
        }

        td a {
            background-color: SkyBlue;
            border: solid 1px MediumTurquoise;
            padding: 4px;
            border-radius: 10%;
            color: beige;
            font-size: 16px;
            margin-top: 10px;
            border-style: none;
            font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
        }
    </style>
</head>

<body>
    <div class="toppage">
        <div class="toppageborder">
            <header class="title">
                <h1>LoveBirds&Co</h1>
            </header>

            <nav>
                <img src="https://cdn.pixabay.com/photo/2014/04/03/00/32/birds-308603_1280.png" alt="" width="320px" height="250px">
                <div class="table">
                    <table>
                        <thead>
                            <tr>


                                <?= $todo ?>
                                <?= $mission ?>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <!-- <th>日付</th>
                    <th>分類</th>
                    <th>内容</th>
                    <th>担当者</th> -->
                                <?= $output ?>

                                <!-- <?= $todo ?>
                            <?= $mission ?> -->

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </nav>
            <footer>
                <div class="select">
                    <ul>

                        <a href="todoMake.php">
                            <li><img src="../LoveBirds&Co/img/color-circle-with-plus-icon-vector-13503864.png" alt="" width="50px" height="50px"> ToDoの追加</li>
                        </a>
                        <a href="missionMake.php">
                            <li><img src="../LoveBirds&Co/img/color-circle-with-plus-icon-vector-13503864.png" alt="" width="50px" height="50px">ミッションの追加</li>
                        </a>
                        <a href="record.php">
                            <li><img src="../LoveBirds&Co/img/illustration-medical-icon_53876-6166.png" alt="" width="45px" height="45px"> マイページ</li>
                        </a>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>