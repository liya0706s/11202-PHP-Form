<?php
include_once "db_export.php";

if(!empty($_POST)){
    echo "你希望匯出";
    print_r($_POST['select']);
    echo "這些資料";
}
?>

<style>
    table {
        border-collapse: collapse;
    }

    tr td {
        border: 1px solid black;
        padding: 5px 12px;
    }
</style>

<?php
// 拿到資料表名稱
$rows = all('coa_opendata');

foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>";
    echo "<input type='checkbox' name='select[]' value='{$row['title']}'>";
    echo "</td>";
    foreach ($row as $value) {
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    echo "</tr>";
}
?>