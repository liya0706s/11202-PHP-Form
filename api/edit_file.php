<?php
include_once "../db.php";
if(isset($_POST['id'])){
    $file=find('files',$_POST['id']);
}else{
    exit();
}

if(!empty($_FILES['img']['tmp_name'])){

    if($_POST['name']!=$file['name']){
        $file['name']=$_POST['name'];
    }

    move_uploaded_file($_FILES['img']['tmp_name'],"../imgs/".$_POST['name']);


     switch($_FILES['img']['type']){
        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
            $type="msword";
        break;
        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
            $type='msexcel';
        break;
        case "application/vnd.openxmlformats-officedocument.presentationml.presentation":
            $type='msppt';
        break;
        case "application/pdf":
            $type='pdf';
        break;
        case "image/webp":
        case "image/jpeg":
        case "image/png":
        case "image/gif":
        case "image/bmp":
            $type=$_FILES['img']['type'];
        break;
        default:
            $type='other';

     }

    if($type!=$file['type']){
        $file['type']=$type;
        $subname=end(explode(".",$_FILES['img']['name']));
        $tmp=explode(".",$file['name']);
        $tmp[count($tmp)-1]=$subname;
        $file['name']=join(".",$tmp);

    }

     $file['type']=$type;
     $file['size']=$_FILES['img']['size'];
     
    }else{
        if($_POST['name']!=$file['name']){
            rename('../imgs/'.$file['name'],'../imgs/'.$_POST['name']);
            $file['name']=$_POST['name'];

        }
    }

    if($_POST['desc']!=$file['desc']){
        $file['desc']=$_POST['desc'];
    }
        
        
        update('files',$_POST['id'],$file);
        //header("location:../upload.php?img=".$filename);
        header("location:../manage.php");

///    header("location:../edit_file.php?err=上傳失敗");

?>