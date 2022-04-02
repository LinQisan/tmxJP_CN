<?php include "shared/head.php"; ?>  
<?php   
    include "shared/conn.php";  
    mysqli_select_db($conn,"tmxJP_CN" );  
    mysqli_query($conn,"set names 'utf8'");   
    $xml = simplexml_load_file("JP_CN_1.tmx");  
    $json = json_encode($xml);  
    $jsondata = json_decode($json,true);  
    foreach ($jsondata["body"]["tu"] as $tu)  
        {  
            $JP=$tu["tuv"][0]["seg"];  
            $zh_CN=$tu["tuv"][1]["seg"];  
            $insert_sql="INSERT INTO tm(JP,zh_CN) values('$JP','$zh_CN')";  
            $import=mysqli_query($conn,$insert_sql);  
            if(!$import)  
                {  
                    echo "<font color=red><b>插入失败: </b></font>".$JP."<br>";  
                    echo "<font color=red><b>插入失败: </b></font>".$zh_CN."<br>";  
                }  
                else  
                {  
                    echo "插入成功: ".$JP."<br>";  
                    echo "插入成功: ".$zh_CN."<br>";  
                }  
        }     
?>  
<?php include "shared/foot.php" ?> 