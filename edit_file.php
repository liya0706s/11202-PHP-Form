<?php
include_once "db.php";
// 判斷網址是否友直
// 判斷是否有id
if (isset($_GET['id'])) {
}
$file = find('')
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯檔案</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" integrity="sha512-zDDxSlYrbKTTfup/YyljmstpX+1jwjeg15AKS/fl26gRxfpD+HMr6dfuJQzCcFtoIEjf93SuCffose5gDQOZtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <h1 class="header">編輯檔案</h1>
    <!----建立你的表單及設定編碼----->
    <?php

    if (isset($_GET['err'])) {
        echo $_GET['err'];
    }
    ?>
    <div class="text-center"><a href="manage.php">回列表</a></div>
    <form action="./api/edit_file.php" method="post" enctype="multipart/form-data">
        <div class="col-6 mx-auto">
            <table class="table">
                <tr>
                    <td>媒體</td>
                    <td>
                        <?php
                        // switch case判斷檔案type
                        ?>

                    </td>
                    <!-- file屬性的value沒有意義 -->
                </tr>

                <tr>
                    <td>檔名</td>
                    <td></td>
                </tr>

                <tr>
                    <td>說明</td>
                    <td></td>
                    <!-- textarea沒有value可以直接輸入，他沒有結束標籤 -->
                </tr>
            </table>
        </div>

        <div class="text-center m-3">
        <input type="submit" name="id"value="更新">
        post id去給 edit_file.php
            <input type="submit" value="更新">
        </div>


        <!----建立一個連結來查看上傳後的圖檔---->
        <?php
        // 如果有圖片就要顯示
        if (isset($_GET['img'])) {
            echo "<img src='./imgs/{$_GET['img']}' style='width:250px;height:150px'>";
        }
        ?>
</body>

</html>