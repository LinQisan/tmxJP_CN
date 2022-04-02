<?php include "shared/head.php"; ?>

<form action="result.php" method="POST">
    <table>
        <tr>
            <tb>
                <input type="text" name="JP" placeholder="日文检索词"/>
            </tb>
            <tb>
                <input type="text" name="zh_CN" placeholder="中文检索词"/>
            </tb>
            <tb>
                <button type="submit">搜索</button>
            </tb>
        </tr>
    </table>
</form>
<?php include "shared/foot.php" ?> 