<?php

include("functions.php");


// 受け取ったデータを変数に入れる
$missionText = $_POST['missionText'];
$rewardText = $_POST['rewardText'];
$rewardImage = $_POST['rewardImage'];
$deadLine = $_POST['deadLine'];


// exit();

if (isset($_FILES['rewardImage']) && $_FILES['rewardImage']['error'] == 0) {

  $uploadedFileName = $_FILES['rewardImage']['name']; //ファイル名の取得
  $tempPathName = $_FILES['rewardImage']['tmp_name']; //tmpフォルダの場所
  $fileDirectoryPath = 'upload/'; //アップロード先フォルダ


  $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
  $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension;
  $fileNameToSave = $fileDirectoryPath . $uniqueName;

  if (is_uploaded_file($tempPathName)) {
    if (move_uploaded_file($tempPathName, $fileNameToSave)) {
      chmod($fileNameToSave, 0644); // 権限の変更
      // $img = '<img src="'.$fileNameToSave.'">';
    } else {
      exit("Error：保存できませんでした");
    }
  } else {

    exit("Error:ファイルがありません");
  }
}

// ここからファイルアップロード&DB登録の処理を追加しよう！！！
// DB接続関数
$pdo = connect_to_db();

// ユーザ存在有無確認
$sql = 'INSERT INTO lb_mission_table(id, missionText, rewardText, rewardImage, deadLine) VALUES(NULL, :missionText, :rewardText, :rewardImage, sysdate())';

$stmt = $pdo->prepare($sql);
//var_dump($stmt);
// exit();

$stmt->bindValue(':missionText', $missionText, PDO::PARAM_STR);
$stmt->bindValue(':rewardText', $rewardText, PDO::PARAM_STR);
$stmt->bindValue(':rewardImage', $rewardImage, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($todo);
// var_dump($deadline);
// var_dump($fileNameToSave);
// exit();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  // ...エラー処理を記述
} else {
  header("Location:topPage.php");
  exit();
}
