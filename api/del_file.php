<?php
include_once "db.php";

// 從manage帶id過來
$id=$_GET['id'];
$file=find('files',$id)['name'];

del('files',$id);
// 刪除資料庫資料表的"紀錄"而已，而非硬碟裡的實體檔案

// 要有刪除"檔案"的函數unlink()，完整路徑和檔名
unlink("../imgs/ .$file");
// 上一層的imgs/檔名

// 從哪邊刪除就回哪邊
header("location:../manage.php");

?>