<?php include "search.php"; ?>
<table width = "100%" border="1">
     <tr>
     <td width="5%"> 
        <p><strong>序号</strong></p>  
        </tb>

        <td width="40%">  
        <p><strong>日文</strong></p>  
        </tb>

        <td width="40%">  
        <p><strong>中文</strong></p>

        <td width="15%">  
        <p><strong>来源</strong></p>  
        </tb>
     </tr>

<?php
include "shared/conn.php";
mysqli_select_db( $conn,"tmxJP_CN" );  
mysqli_query($conn,"set names 'utf8'");   

$JP = $_POST["JP"];
$zh_CN= $_POST["zh_CN"];

$sql = "SELECT * FROM tm WHERE JP LIKE '%$JP%' AND zh_CN LIKE '%$zh_CN%'";

$gettm = mysqli_query($conn,$sql);

if(!$gettm)
{
    echo "无法获取翻译记忆，请检查问题！";
}
else
{
    while($row =mysqli_fetch_array($gettm,MYSQLI_ASSOC))
    {
        $row["JP"] = preg_replace("/$JP/u","<font color=blue><b>$JP</b></font>",$row["JP"]);
        $row["zh_CN"] = preg_replace("/$zh_CN/u","<font color=red><b>$zh_CN</b></font>",$row["zh_CN"]);

        echo "
        <tr>
            <td width='5%'>
            <p><strong>{$row['ID']}</strong></p>  
             </tb>
             <td width='40%'>
            <p><strong>{$row['JP']}</strong></p>  
             </tb>
             <td width='40%'>
            <p><strong>{$row['zh_CN']}</strong></p>  
               </tb>
               <td width='15%'>
            <p><strong>{$row['source']}</strong></p>  
               </tb>
         </tr>
        ";
    }
}

?>
</table>
<?php include "shared/foot.php" ?> 