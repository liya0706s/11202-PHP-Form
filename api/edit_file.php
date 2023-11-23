<?php

include_once "../db.php";

// 只是改檔名或是改描述，修改
// 上傳更新檔案，只處理檔案

// 如果有上傳成功，函式內的變數例如tmp,subname,filename才存在
// 沒上傳成功的話，檔名會是原檔名，不是$filename
// $filename = date("YmdHis") . rand(10000, 99999) . $subname;

// $_FILES['img']['name'] 原文件名稱;
// 如果上傳的文件名 與 原文件名 不同
// 更名後的新名稱 $file['name']
// 用戶想要將文件命名的名稱 $_POST['name']  


// 檢查是否設置了 'id' 的 POST 參數
if(isset($_POST['id'])){
    $file=find('files',$_POST['id']);
}else{
    exit();
}


// 檢查是否有上傳的檔案
if (!empty($_FILES['img']['tmp_name'])) {

    // 舊檔名和新檔名不同，則更新檔案名稱
    if($_POST['name']!=$file['name']){
        file['name']=$_POST['name'];
        // 要重新指定$file，因為edit_file.php需要
    }

    // 將上傳的檔案移動到指定目錄
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $_POST['name']);
    // 以上資料夾下的檔名要改
    // filename to $_POST['name']


    // 根據上傳檔案的類型進行分類判斷
    // 建立變數名稱方便之後使用
    switch ($_FILES['img']['type']) {
        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
            $type = "msword";
            break;
        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            $type = "msexcel";
            break;
        case "application/vnd.openxmlformats-officedocument.presentationml.presentation";
            $type = "msppt";
            break;
        case "application/pdf";
            $type = "pdf";
            break;
        case "image/webp";
        case "image/jpeg";
        case "image/png";
        case "image/gif";
        case "image/bmp";
            $type = $_FILES['img']['type'];
            break;
        default:
            $type = "other";
    }
    // 只處理檔案相關的type size file
    // 如果上傳的檔案類型與原文件不同，則更新文件類型和文件名稱。
    if($type !=$file['type']){
        $file['type'] = $type;
         // 取得上傳檔案名稱的副檔名
        $subname=end(explode(".", $_FILES['img']['name']));
        // 將原文件名稱的副檔名替換為，上傳檔案的副檔名
        $tmp = explode(".", $file['name']);
        $tmp[count($tmp)-1]=$subname;
         // 更新文件的名稱為替換後的名稱
        $file['name']=join(".",$tmp);
    }
// 更新文件類型和文件大小
$file['type']=$type;
$file['size']=$_FILES['img']['size'];

}else{
    // 如果沒有上傳檔案，但'name'與原文件不同，則更新文件名稱
    if($_POST['name'] != $file['name']){
        rename("../imgs/".$file['name'], "../imgs/".$_POST['name']);

// 先改完名字，再賦值指定
}

    // 判斷post過來的檔案敘述和檔案的敘述是否
    // 取決檔案是看有沒有上傳
    if($_POST)
}


update('files', $file);
header("location:../manage.php");
// header("location:../upload.php?img=".$filename);

header("location:../edit_file.php?err=上傳失敗");
