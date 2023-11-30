<?php

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
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" integrity="sha512-zDDxSlYrbKTTfup/YyljmstpX+1jwjeg15AKS/fl26gRxfpD+HMr6dfuJQzCcFtoIEjf93SuCffose5gDQOZtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <style>
        .thumbs {
            width: 150px;
            height: 120px;
        }
    </style> -->
</head>

<body>
    <h1 class="header">檔案上傳練習</h1>
    <!----建立你的表單及設定編碼----->
    <?php

    if (isset($_GET['err'])) {
        echo $_GET['err'];
    }
    ?>

    <form action="./api/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img" id=""> 
        <!-- name="img" 關乎到檔案上傳api/upload $_FILES['filename']['...'] -->
        <input type="text" name="desc" id="" value="" placeholder="請輸入檔案描述">

        <input type="submit" value="上傳">
    </form>

    <!----建立一個連結來查看上傳後的圖檔---->
    <?php
    // 從api/upload傳值，用get做一次性的顯示
    // 如果有圖片就要顯示
    if (isset($_GET['img'])) {
        echo "<img src='./imgs/{$_GET['img']}' style='width:250px;height:150px'>";
    }

    ?>

</body>

</html>