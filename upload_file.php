<?php  
include "shared/conn.php";
if ($_FILES["file"]["error"] > 0)  
  {  
  echo "文件上传错误代码：".$_FILES["file"]["error"]."<br>";  
  }  
else  
  {  
  echo "上传文件为：".$_FILES["file"]["name"]."<br>";  
  echo "文件类型：".$_FILES["file"]["type"]."<br>";  
  echo "文件大小：".($_FILES["file"]["size"] / 1024)." KB<br>";  
  echo "文件临时存储在：".$_FILES["file"]["tmp_name"]."<br>";  

  if (file_exists("upload/".$_FILES["file"]["name"]))  
  {  
    echo $_FILES["file"]["name"] . "已经存在。";  
    }  
  else  
    {  
    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);  
    $file_name = "upload/".$_FILES["file"]["name"];
    $xml = simplexml_load_file($file_name);

    foreach($xml->body->tu as $tu)
    {
      $JP = $tu->tuv[0]->seg;
      $zh_CN = $tu->tuv[1]->seg;
      $source = $tu->note[0]." | ".$tu->note[1];
      $source = str_replace("'","\'",$source);
      $sql = "INSERT INTO `tm` (`JP`, `zh_CN`, `source`) VALUES ('$JP' , '$zh_CN' , '$source')";
      mysqli_select_db($conn,'tmxJP_CN');
      mysqli_query($conn,"set names 'utf8'");

           if(!mysqli_query($conn,$sql))
           {
               echo "无法插入术语数据！".mysqli_error($conn)."<br>";
           }
           else{
               echo "数据插入成功！"."<br>";
           }
    }
    }  
  }  
?>  