<?php

if (isset($_POST["action"])&&($_POST["action"] == "create")) {
	
	//print_r($_POST);exit;
    //引入檔，負責連結資料庫
    include("connMySQL.php");

    //取得請求過來的資料
    $acc = $_POST["acc"];
	$accName = $_POST["accName"];
	$accSex = $_POST["accSex"];
    $accBirthday = $_POST['accBirthday'];
    $accEmail = $_POST['accEmail'];
	$accNote = $_POST['accNote'];
	
	
    //資料表查訪指令，請注意 "" , '' 的位置
    //INSERT INTO 就是新建一筆資料進哪個表的哪個欄位
    $sql_query = "INSERT INTO account_info (account, name, sex, birthday, mail, note) VALUES ('$acc','$accName', '$accSex','$accBirthday','$accEmail','$accNote')";

    //對資料庫執行查訪的動作
    mysqli_query($db_link,$sql_query);

    //導航回首頁
    header("Location: index.php");
}
?>
<html>

<head>
    <meta charset="UTF-8" />
    <title>新增帳號</title>
</head>
<style>
.error {color: #FF0000;}
</style>
<body>

<form action="create.php" method="post" name="formCreate" id="formCreate">
請輸入帳號：<input type="text" name="acc" id="acc"><br/>
請輸入姓名：<input type="text" name="accName" id="accName"><br/>
請輸入性別：<select type="text" name="accSex" id="accSex">
				<option value="">請選擇性別</option>
				<option value="1">男</option>
				<option value="2">女</option>
			</select><br/>
請輸入生日：<input type="date" name="accBirthday" id="accBirthday"><br/>
請輸入Email：<input type="text" name="accEmail" id="accEmail"><br/>
備註：<textarea name="accNote" rows="10" cols ="40"></textarea><br/>
<input type="hidden" name="action" value="create">
<input type="submit" name="button" value="新增資料">
<input type="reset" name="button2" value="重新填寫">
</form>
</body>
</html>

