<?php

/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" integrity="sha512-zDDxSlYrbKTTfup/YyljmstpX+1jwjeg15AKS/fl26gRxfpD+HMr6dfuJQzCcFtoIEjf93SuCffose5gDQOZtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <h1 class="header">檔案管理練習</h1>
    <!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
    <h3><a href="upload.php">上傳檔案</a></h3>
    <!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
    <?php
    $files = all('files');
    ?>
    <!-- <div class="row"> -->
    <div class="col-8 mx-auto">
        <table class="table table-success table-striped">
            <tr>
                <td>id</td>
                <td>檔名</td>
                <td>類型</td>
                <td>大小</td>
                <td>描述</td>
                <td>上傳時間</td>
            </tr>
            <?php
            // 把files表裡的資料指定給file變數
            foreach ($files as $file) {
            ?>
                <tr>
                    <td><?= $file['id'] ?></td>
                    <td>
                        <!-- 資料夾裡面的檔名$file['name'] -->
                        <img src="imgs/<?= $file['name'] ?>" alt="" class="thumbs">
                    </td>
                    <td><?= $file['type'] ?></td>
                    <td><?= $file['size'] ?></td>
                    <td><?= $file['desc'] ?></td>
                    <td><?= $file['create_at'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <!-- </div> -->


    <!-- bs5 js通常放在 /body前面 -->
</body>

</html>