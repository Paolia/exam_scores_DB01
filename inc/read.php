<?php

// 集計したデータを読み込む変数
$summary = '';

// ファイルを読み取りモードで開く
$file = fopen('data/examrecords.txt', 'r');
// ファイルをロック
flock($file, LOCK_EX);

$record = array();

if ($file) {
    while ($line = fgets($file)) {
        $item = explode(",",$line);

        $name = str_replace("name:", "", $item[0]);
        $grade = str_replace("grade:", "", $item[1]);
        $class = str_replace("classrm:", "", $item[2]);
        $mail = str_replace("mail:", "", $item[3]);
        $exam = str_replace("exam:", "", $item[4]);
        $japanese = str_replace("国語:", "", $item[5]);
        $math = str_replace("数学:", "", $item[6]);
        $science = str_replace("理科:", "", $item[7]);
        $social = str_replace("社会:", "", $item[8]);
        $english = str_replace("英語:", "", $item[9]);

        $array = [
            "名前" => $name,
            "学年" => $grade,
            "学級" => $class,
            "メール" => $mail,
            "試験" => $exam,
            "国語" => $japanese,
            "数学" => $math,
            "理科" => $science,
            "社会" => $social,
            "英語" => $english
        ];
        array_push($record, $array);
    }
}

// フィアルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

$json = json_encode($record, JSON_UNESCAPED_UNICODE);

echo '<h2 id="toptitle">試験結果の記録</h2>
<main>
    <div>プルダウンで名前を選んでください：
    <select id="nameselect"></select>
    </div>
    <div id="selected_name"></div>
    <table id="score_table">
    </table>
    <div id="check">
      <div class="title"><button onclick="location.href=\'index.php\'">トップ</button></div>
    </div>
<script>
let test_data = '.$json.';
//console.log(test_data);
let name_id = "<option> </option>";
for (let i=0; i < test_data.length; i++) {
    if (!name_id.includes(test_data[i]["名前"])) {
        name_id += "<option>"+test_data[i]["名前"]+"</option>";
    }
}
$("#nameselect").html(name_id);
//console.log(name_id);
//console.log(test_data);

$("#nameselect").on("change", function() {
    let selected = this.value;
    let selected_data = new Array();
    for (let j=0; j < test_data.length; j++) {
        if (test_data[j]["名前"] == selected) {
            selected_data.push(test_data[j]);
        }
    }
    //console.log(selected_data);
    let table_line = "<tr><th>学年</th><th>学級</th><th>試験</th><th>国語</th><th>数学</th><th>理科</th><th>社会</th><th>英語</th></tr>";
    let gakunen, kurasu, shiken, kokugo, suugaku, rika, shakai, eigo;
    $("#selected_name").text(selected+"さんの試験の記録は：");
    for (let k=0; k < selected_data.length; k++) {
        gakunen = selected_data[k]["学年"];
        kurasu = selected_data[k]["学級"];
        shiken = selected_data[k]["試験"];
        kokugo = selected_data[k]["国語"];
        suugaku = selected_data[k]["数学"];
        rika = selected_data[k]["理科"];
        shakai = selected_data[k]["社会"];
        eigo = selected_data[k]["英語"];
        console.log(selected_data[k]);
        table_line += "<tr><td>"+gakunen+"</td><td>"+kurasu+"</td><td>"+shiken+"</td><td>"+kokugo+"</td><td>"+suugaku+"</td><td>"+rika+"</td><td>"+shakai+"</td><td>"+eigo+"</td></tr>";
    }
    $("#score_table").html(table_line);
});
</script>
</main>'



?>