<?php
// まずは受け取ったデータを確認
// var_dump($_POST);
// exit();

// 受け取ったデータを振り分け
$name = $_POST['name_sel'];
$grade = $_POST['grade'];
$class = $_POST['class'];

// DB接続 丸のままregist_bodyよりコピペ
// 各種項目設定
$dbn = 'mysql:dbname=gs_copout2;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// SQL作成&実行。これもコピペ。
$sql = "SELECT name, exam, japanese, math, science, social, english FROM gs_copout2_main WHERE grade='" . $grade . "' AND class='" . $class . "'  AND name='" . $name . "' ORDER BY exam ASC";
// こちらの場合は「ユーザーが入力したデータ」を使用しないのでバインド変数は不要
$stmt = $pdo->prepare($sql);
try {
    $status = $stmt->execute();
    // $statusには実行結果が入るが、この時点ではまだデータ自体の取得はできていない
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// SQL実行後の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// fetchAll関数でデータ自体を取得

$output = "";
// foreachによる繰り返しを用いて取得したデータからHTMLタグを生成
foreach ($result as $record) {
    $output .= "
  <tr>
    <td class='headings'>{$grade}</td>
    <td class='headings'>{$class}</td>
    <td class='headings'>{$record["name"]}さんの</td>
    <td class='headings' colspan='2'>{$record["exam"]}の成績は</td>
  </tr><tr>
    <td class='scores'>国語{$record["japanese"]}点</td>
    <td class='scores'>数学{$record["math"]}点</td>
    <td class='scores'>理科{$record["science"]}点</td>
    <td class='scores'>社会{$record["social"]}点</td>
    <td class='scores'>英語{$record["english"]}点</td>
  </tr>
  ";
    // ここでデータから生成したHTMLを入れた$outputを、下のHTML文中のPHPで設置
}
?>

<main>
    <div id="conf">
        <h2><?= $grade ?><?= $class ?>の<?= $name ?>の成績一覧です：</h2>
    </div>
    <div>
        <table class="by_class_table">
            <?= $output ?>
            <tr>
                <td colspan="5"><button id="backbtn" onclick="location.href='index.php'">戻る</button></td>
            </tr>
        </table>
    </div>

</main>