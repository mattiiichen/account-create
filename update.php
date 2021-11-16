 <?php
 include "connMySQL.php";

if( !empty($_GET['id'])){
	 $userID = $_GET['id'];
	 $sql_getDataQuery = "SELECT * FROM account_info WHERE id = $userID";
	 $result = mysqli_query($db_link, $sql_getDataQuery);
	 $row_result = mysqli_fetch_assoc($result);
	 $id = $row_result['id'];
	 $account = $row_result['account'];
	 $name = $row_result['name'];
	 $sex = $row_result['sex'];
	 $birthday = $row_result['birthday'];
	 $email = $row_result['mail'];
	  $note = $row_result['note'];
}
	
 





  if (isset($_POST["action"]) && $_POST["action"] == 'update') {
	 // print_r($_POST);exit;
	  	$id = $_POST['id'];
	$account = $_POST['acc'];
     $name = $_POST['accName'];
	 $sex = $_POST['accSex'];
     $birthday = $_POST['accBirthday'];
     $mail = $_POST['accEmail'];
	$note = $_POST['accNote'];

     $sql_query = "UPDATE account_info SET account = '$account', name = '$name', sex = '$sex', birthday = '$birthday', mail = '$mail' , note = '$note' WHERE id = $id";

     mysqli_query($db_link,$sql_query);
     $db_link->close();

     header('Location: index.php');
 }
 
 
?>
<html>

 <head>
     <meta charset="UTF-8" />
     <title>修改帳號</title>
 </head>
 <body>

 <form action="update.php" method="post" name="formUpdate" id="formUpdate">
     請輸入帳號：<input type="text" name="acc" id="acc" value=" <?php echo $account ?>"><br/> 
     請輸入姓名：<input type="text" name="accName" id="accName" value=" <?php echo $name ?>"><br/>
	 請輸入性別：<select type="text" name="accSex" id="accSex" value=" <?php echo $sex ?>">
					<option value="">請選擇性別</option>
					<?php if($sex == 1){ echo "<option value='1' selected>男</option>";}else{ echo "<option value='1'>男</option>";}?>
					<?php if($sex == 2){ echo "<option value='2' selected>女</option>";}else{ echo "<option value='2'>女</option>";}?>
				</select><br/>
     請輸入生日：<input type="date" name="accBirthday" id="accBirthday" value="<?php echo $birthday ?>"><br/>
     請輸入Email：<input type="text" name="accEmail" id="accEmail" value="<?php echo $email ?>"><br/>
	備註：<textarea name="accNote" rows="10" cols ="40" ><?php echo $note;?></textarea><br/>
	 
	 <input type="hidden" name="id" value="<?php echo $id ?>">
	 
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>