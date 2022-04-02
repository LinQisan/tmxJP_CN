<?php include "search.php"; ?>
<table width="100%" border="1">  
  <tbody>  
    <tr> 
      <td>
      <p><strong>日文</strong></p>
      </td> 
      <td>
      <p><strong>中文</strong></p>
      </td>  
      <td>
      <p><strong>删除</strong></p>
      </td> 
      <td>
      <p><strong>编辑</strong></p>
      </td> 
      <td>
      <p><strong>来源</strong></p>
      </td> 
    </tr>   
<?php
$xml = simplexml_load_file("JP_CN_1.tmx");
foreach($xml->body->tu as $tu)
{
    echo "<tr>  
             <td>                       
                {$tu->tuv[0]->seg}
             </td>
             <td>               
                {$tu->tuv[1]->seg}
                        </td>  
                        <td>
                        <a href='delete.php?tid={$row['ID']}'>删除</a>
                       </td>  
                       <td>
                        <a href='edit.php?tid={$row['ID']}'>编辑</a>
                       </td>  
                       <td>
                       {$tu->note[0]}.{$tu->note[1]}
                      </td>  
                      </tr>";
}
?>
</tbody>  
</table>  

    echo "<tr>  
             <td> 
                {$row["ID"]}
            </td>
             <td>                       
                {$tu->tuv[0]->seg}
             </td>
             <td>               
                {$tu->tuv[1]->seg}
                        </td>  
                        <td>
                        <a href='delete.php?tid={$row['ID']}'>删除</a>
                       </td>  
                       <td>
                        <a href='edit.php?tid={$row['ID']}'>编辑</a>
                       </td>  
                      </tr>";
                      echo $tu->tuv[0]->seg."<br>";
    echo $tu->tuv[1]->seg."<br>";
    echo $tu->note[1]."<br>";
    echo $tu->note[0]."<br>";
    echo "<br>";