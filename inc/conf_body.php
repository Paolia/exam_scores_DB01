<main>
    <div id="conf">
        <h2>以下の内容で登録します。よろしいですか？</h2>
    </div>

    <div id="confirm">
        <table>
            <tr>
                <td>名前：<?php echo $_POST["name"]; ?></td>
                <td>学年：<?php echo $_POST["grade"]; ?></td>
                <td>クラス：<?php echo $_POST["class"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">Eメール：<?php echo $_POST["email"]; ?></td>
                <td>対象試験：<?php echo $_POST["exam"]; ?></td>
            </tr>
            <tr>
                <td>国語：<?php echo $_POST["japanese"]; ?>点</td>
                <td>数学：<?php echo $_POST["math"]; ?>点</td>
                <td>理科：<?php echo $_POST["science"]; ?>点</td>
            </tr>
            <tr>
                <td>社会：<?php echo $_POST["social"]; ?>点</td>
                <td>英語：<?php echo $_POST["english"]; ?>点</td>
                <td></td>
            </tr>
            <tr>
                <td><button onclick="location.href='index.php'">戻る</button></td>
            <td></td>
                <td>        
        <?php
        echo
            '<form id="form2" action="register.php" method="POST">
        <input type="hidden" name="name" value="' . $_POST["name"] . '">
        <input type="hidden" name="grade" value="' . $_POST["grade"] . '">
        <input type="hidden" name="class" value="' . $_POST["class"] . '">
        <input type="hidden" name="email" value="' . $_POST["email"] . '">
        <input type="hidden" name="exam" value="' . $_POST["exam"] . '">
        <input type="hidden" name="japanese" value="' . $_POST["japanese"] . '">
        <input type="hidden" name="math" value="' . $_POST["math"] . '">
        <input type="hidden" name="science" value="' . $_POST["science"] . '">
        <input type="hidden" name="social" value="' . $_POST["social"] . '">
        <input type="hidden" name="english" value="' . $_POST["english"] . '">
        <button type="submit" id="registar">登録</button>
    </form>'
            ?>        
                </td>
            </td>
        </table>
    </div>
</main>