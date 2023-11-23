<?php

include_once "../db.php";

if (!empty($_FILES['img']['tmp_name'])) {

    $tmp = explode(".", $_FILES['img']['name']);
    $subname = "." . end($tmp);
    $filename = date("YmdHis") . rand(10000, 99999) . $subname;
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);
   

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
            $type=$_FILES[''][''];
        break;
        default:
            $type="other";
    }


    $file = [
        'name' => $filename,
        'type' => $_FILES['img']['type'],
        'size' => $_FILES['img']['size'],
        'desc' => $_POST['desc']];

    
    insert('files', $file);

    header("location:../manage.php");
    // header("location:../upload.php?img=".$filename);
} else {
    header("location:../edit_file.php?err=上傳失敗");
}
