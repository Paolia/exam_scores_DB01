<?php
// まずは受け取ったデータを確認
//var_dump($_POST);
//exit();

// 受け取ったデータを振り分け
$grade = $_POST['grade_bc'];
$class = $_POST['class_bc'];
$exam = $_POST['exam_bc'];

// 学年・組・試験を日本語に変換
// 学年
 if ($grade=='7th_gr') {
    $j_grade = '１年';
 } else if ($grade == '8th_gr') {
    $j_grade = '２年';
 } else {
    $j_grade = '３年';}
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
// 試験
if ($exam == '1tri-mid') {
    $j_exam = '１学期中間試験';
} else if ($exam == '1tri-end') {
    $j_exam = '１学期期末試験';
} else if ($exam == '2tri-mid') {
    $j_exam = '２学期中間試験';
} else if ($exam == '2tri-end') {
    $j_exam = '２学期期末試験';
} else if ($exam == '3tri-mid') {
    $j_exam = '３学期中間試験';
} else if ($exam == '3tri-end') {
    $j_exam = '３学期期末試験';
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
$sql = "SELECT name, exam, japanese, math, science, social, english FROM gs_copout2_main WHERE grade='" . $j_grade . "' AND class='" . $j_class . "'  AND exam='" . $j_exam . "' ORDER BY exam ASC";
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
    <td class='headings'>{$j_grade}</td>
    <td class='headings'>{$j_class}</td>
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
        <h2><?=$j_grade?><?=$j_class?>の<?=$j_exam?>の成績一覧です：</h2>
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