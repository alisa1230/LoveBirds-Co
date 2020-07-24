<?php
include("functions.php");

// DB接続
$pdo = connect_to_db();
// データ取得SQL作成
//todoが達成・ミッションが達成したものを表示する。
$sql = "SELECT todo_db.todoText , mission_db.missionText
         FROM lb_todo_table AS todo_db INNER JOIN lb_mission_table AS mission_db
        ON todo_db.id = mission_db.id
        WHERE todo_db.todofinishCB=1 OR mission_db.missionFinishCB= 1 ";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// var_dump($status);
// exit();
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
    $mission = "";
    $output = "";

    // var_dump($result);
    // exit();

    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $todo .= "<td>{$record["todoText"]}　</td>";
        $mission .= "<td>{$record["missionText"]}　</td>";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($value);
}
?>

<html lang=“en”>

<head>
    <meta charset=“UTF-8”>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
        .mypage {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .back {
            border-style: none;
            background-color: cadetblue;
            padding: 10px 25px;
            border-radius: 10%;
        }

        .back:hover {
            opacity: 0.6;
        }

        .title {
            color: DarkCyan;
        }

        .back a {
            text-decoration: none;
            color: beige;
            font-size: 20px;
        }

        .title_sub {
            font-family: sans-serif;
            color: DarkCyan;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div>
        <button class="back"><a href="topPage.php">Back</a></button>
    </div>

    <div class="mypage">
        <header class="title">
            <h1>マイページ</h1>
        </header>
        <div>
            <img src="../LoveBirds&Co/img/img_0724.png" alt="" height="250px" width="500px">
        </div>
    </div>
    <div>
        <h2 class="title_sub">To Do達成</h2>
        <?= $todo ?>
        <!-- ミッション達成履歴 -->
    </div>
    <div>
        <h2 class="title_sub">ミッション達成</h2>
        <?= $mission ?>

        <!-- To Do達成履歴 -->
    </div>
    <!-- <div>
        <h2>ポイント交換履歴</h2>
    </div> -->
</body>

</html>