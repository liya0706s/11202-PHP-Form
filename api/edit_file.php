<?php

include_once "../db.php";

// 只是改檔名或是改描述，修改
// 上傳更新檔案，只處理檔案

// 如果有上傳成功，函式內的變數例如tmp,subname,filename才存在
// 沒上傳成功的話，檔名會是原檔名，不是$filename
// $filename = date("YmdHis") . rand(10000, 99999) . $subname;
if(isset($_POST['id'])){
    $file=find('files',$_POST['id'])
}else{
    
}

// 從資料庫拿檔案
$file = find('files', $_GET['id']);

if (!empty($_FILES['img']['tmp_name'])) {

    // 就檔名和新黨命
    if($_POST['name']!=$file['name']){
        move_uploaded_file();
        file['']
        // 要重新指定$file，因為edit_file.php需要
    }

    
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $_POST['name']);
    // 以上資料夾下的檔名要改
    // filename to $_POST['name']



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
        case "";
            $type = $_FILES[''][''];
            break;
        default:
            $type = "other";
    }
    // 只處理檔案相關的type size file

    if($type!=$file['type']){
// 副檔名名稱不同的話，分為檔案和
$file['type']=$type;

// 檔名合成新富檔名


    }


}else{
    if($_POST['name']=$file['name']){

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
