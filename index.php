<?php
    
    include("connMySQL.php");
    $sql_query = "SELECT * FROM account_info ORDER BY id asc";
    $result = mysqli_query($db_link,$sql_query);
    $total_records = mysqli_num_rows($result);
	
	$per = 5; //每頁顯示項目數量
    $pages = ceil($total_records/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號

    $result_page = mysqli_query($db_link,$sql_query.' LIMIT '.$start.', '.$per) or die("Error");
	
	
	
	
	
	
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>帳號新增的CRUD</title>
</head>
<body>
<h1 align = "center">帳號清單</h1>
<p align= "center"><a href='create.php'>新增帳號</p>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>帳號</th>
        <th>姓名</th>
        <th>性別</th>
		<th>生日</th>
		<th>信箱</th>
		<th>備註</th>
        <th>編輯</th>
    </tr>
	<?php

		while($row_result = mysqli_fetch_assoc($result_page)) {
			echo "<tr>";
			echo "<td>".$row_result['id']."</td>";
			echo "<td>".$row_result['account']."</td>";
			echo "<td>".$row_result['name']."</td>";
			if($row_result['sex'] == 1){
				echo "<td>男</td>";
			}else{
				echo "<td>女</td>";
			}
			
			echo "<td>".$row_result['birthday']."</td>";
			echo "<td>".$row_result['mail']."</td>";
			echo "<td>".$row_result['note']."</td>";
			echo "<td><a href='update.php?id=".$row_result['id']."'>修改</a> ";
			echo "<a href='delete.php?id=".$row_result['id']."'>刪除</a></td>";
			echo "</tr>";
		}
		
		
		
		
		
?>
</table>
<table align = "center">
 
<?php 
 //分頁頁碼
		echo "<br><br><br>";
		echo '<tr><td>';
		echo '共 '.$total_records.' 筆 在第'.$page.' 頁 - 共 '.$pages.' 頁';
		echo '</td></tr>';
		echo '<tr><td>';
		echo "<br /><a href=?page=1>首頁</a> ";
		echo "第 ";
		for( $i=1 ; $i<=$pages ; $i++ ) {
			if ( $page-3 < $i && $i < $page+3 ) {
				echo "<a href=?page=".$i.">".$i."</a> ";
			}
		} 
		echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
		echo '</td></tr>';
?>

</table>
</body>
</html>