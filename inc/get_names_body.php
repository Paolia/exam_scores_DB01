<?php
// まずは受け取ったデータを確認
// var_dump($_POST);
// exit();

// 受け取ったデータを振り分け
$grade = $_POST['grade_gn'];
$class = $_POST['class_gn'];

// 学年・組・試験を日本語に変換
// 学年
if ($grade == '7th_gr') {
    $j_grade = '１年';
} else if ($grade == '8th_gr') {
    $j_grade = '２年';
} else {
    $j_grade = '３年';
}
// クラス
// $j_class = str_replace('class_', '', $class);
if ($class == 'class_1') {
    $j_class = '１組';
} else if ($class == 'class_2') {
    $j_class = '２組';
} else if ($class == 'class_3') {
    $j_class = '３組';
} else if ($class == 'class_4') {
    $j_class = '４組';
} else if ($class == 'class_5') {
    $j_class = '５組';
} else if ($class == 'class_6') {
    $j_class = '６組';
} else if ($class == 'class_7') {
    $j_class = '７組';
} else if ($class == 'class_8') {
    $j_class = '８組';
}

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
$sql = "SELECT name FROM gs_copout2_main WHERE grade='" . $j_grade . "' AND class='" . $j_class . "' ORDER BY exam ASC";
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
$scores = "";
foreach ($result as $score) {
    if (strpos($scores, $score["name"]) == false) {
        $scores .= '<option>' . $score["name"] . '</option>';
    }
}

?>


<form action="by_person.php" method="post">
<div>
    <select id="name_sel" name="name_sel">
        <?= $scores ?>
    </select>
    <input type="hidden" name="grade" value=<?=$j_grade?>>
    <input type="hidden" name="class" value="<?=$j_class?>">
</div>
<div class="title" id="by_person_button"><button type="submit" id="by_person">成績取得</button></div>
</form>
<div>
    <button id="backbtn2" onclick="location.href='index.php'">戻る</button>
</div>
<div></div>
<div></div>
</main>