<?php
// 受信データを確認。
// var_dump($_POST);
// exit();

// POSTデータ確認
if (
    !isset($_POST['name']) || $post['name'] === '' ||
    !isset($_POST['grade']) || $post['grade'] === '' ||
    !isset($_POST['class']) || $post['class'] === '' ||
    !isset($_POST['email']) || $post['email'] === '' ||
    !isset($_POST['exam']) || $post['exam'] === '' ||
    !isset($_POST['japanese']) || $post['japanese'] === '' ||
    !isset($_POST['math']) || $post['math'] === '' ||
    !isset($_POST['science']) || $post['science'] === '' ||
    !isset($_POST['social']) || $post['social'] === '' ||
    !isset($_POST['english']) || $post['english'] === ''
) {
    exit('ParamError');
}

// $_POSTより各項目データを取得
$name = $_POST['name'];
$grade = $_POST['grade'];
$class = $_POST['class'];
$email = $_POST['email'];
$exam = $_POST['exam'];
$japanese = $_POST['japanese'];
$math = $_POST['math'];
$science = $_POST['science'];
$social = $_POST['social'];
$english = $_POST['english'];

// DB接続のための項目設定
// ちなみに3306がMySQLの標準的なポートだそうです。
$dbn = 'mysql:dbname=gs_copout2;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続（コピペ）
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// SQL作成&実行
$sql = 'INSERT INTO gs_copout2_main (id, name, grade, class, email, exam, japanese, math, science, social, english, date_added) VALUES  (NULL, :name, :grade, :class, :email, :exam, :japanese, :math, :science, :social, :english, now());';
// phpMyAdminのSQLウィンドウで確認後コピペ＆バインド関数設定
$stmt = $pdo->prepare($sql);

// バインド変数を設定、毎回同じだそうなので、これもコピペ
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':grade', $grade, PDO::PARAM_STR);
$stmt->bindValue(':class', $class, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':exam', $exam, PDO::PARAM_STR);
$stmt->bindValue(':japanese', $japanese, PDO::PARAM_STR);
$stmt->bindValue(':math', $math, PDO::PARAM_STR);
$stmt->bindValue(':science', $science, PDO::PARAM_STR);
$stmt->bindValue(':social', $social, PDO::PARAM_STR);
$stmt->bindValue(':english', $english, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// 入力トップページに戻る
header('Location: index.php');
exit();
?>