<?php
include_once "db.php";

// 檢查是否有從manage.php 傳入id參數
if (isset($_GET['id'])) {
    // 使用 find 函數在 'files' 資料表中查找 id 對應的檔案資訊
    $file = find('file', $_GET['id']);
} else {
    exit();
}

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
    //  如果有錯誤訊息，則顯示錯誤訊息 
    if (isset($_GET['err'])) {
        echo $_GET['err'];
    }
    ?>

    <div class="text-center"><a href="manage.php">回列表</a></div>
    <!-- 表單開始 -->
    <form action="./api/edit_file.php" method="post" enctype="multipart/form-data">
        <!-- 使用 Bootstrap 格線系統設定表單的寬度 -->
        <div class="col-6 mx-auto">
            <table class="table">
                <!-- 媒體類型及圖片預覽 -->
                <tr>
                    <td>媒體</td>
                    <td>
                        <?php
                        // switch case判斷檔案type
                        // 根據檔案類型，設定相對應的圖片
                        // 並設定 $imgname 為該圖片的路徑
                        switch ($file['type']) {
                            case "image/webp";
                            case "image/jpeg";
                            case "image/png";
                            case "image/gif";
                            case "image/bmp";
                                $imgname = "./imgs/" . $file['name'];
                                break;
                            case "msword";
                                $imgname = "./icon/wordicon.png";
                                break;
                            case "msexcel";
                                $imgname = "./icon/msexcel.png";
                                break;
                            case "msppt";
                                $imgname = "./icon/msppt.png";
                                break;
                            case "pdf";
                                $imgname = "./icon/pdf.png";
                                break;
                            default:
                                $imgname = "./icon/other.png";
                        }
                        ?>
                        <!-- 顯示圖片及提供上傳新圖片的輸入欄位 -->
                        <img src="<? $imgname; ?>" style="width:300px;height:250px"><br>
                        <!-- file屬性的value沒有意義 -->
                        <input type="file" name="img" value="">
                    </td>

                </tr>
                <!-- 檔名輸入欄位 -->
                <tr>
                    <td>檔名</td>
                    <td><input type="text" name="name" value="<? $file['name']; ?>"></td>
                </tr>
                <!-- 說明文字區域 -->
                <tr>
                    <td>說明</td>
                    <td><textarea name="desc" id="" style="width:350px;height:200px">
                    <?= $file['desc'] ?></textarea></td>
                    <!-- textarea沒有value可以直接輸入，他沒有結束標籤 -->
                </tr>
            </table>

            <!-- 提交按鈕 -->
            <div class="text-center m-3">
                <input type="hidden" name="id" value="<?= $file['id']; ?>">
                <!-- post id去給 edit_file.php -->
                <!-- 從manage.php 傳入id參數 -->
                <input type="submit" value="更新">
            </div>
        </div>
    </form>

    <!----建立一個連結來查看，上傳後的圖檔---->
    <?php
    // 如果有圖片就要顯示
    if (isset($_GET['img'])) {
        echo "<img src='./imgs/{$_GET['img']}' style='width:250px;height:150px'>";
    }
    ?>
</body>

</html>