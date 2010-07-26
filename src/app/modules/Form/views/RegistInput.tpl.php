<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CustomForm</title>
<link rel="stylesheet" href="<?php echo ENTRY_PATH; ?>css/base.css" type="text/css" >
<body>
<header>
<hgroup>
<h1>CutomForm</h1>
<h3>フォーム作成</h3>
</hgroup>

<div>
<form action="<?php echo ENTRY_PATH; ?>" method="POST">
<input type="hidden" name="MO" value="Form">
<input type="hidden" name="AC" value="RegistComplete">
<dl>
<dt>タイトル</dt>
<dd><input type="text" name="title" value=""></dd>
<dt>入力画面コメント</dt>
<dd><textarea name="input_msg" rows="3" cols="50"></textarea></dd>
<dt>完了画面コメント</dt>
<dd><textarea name="complete_msg" rows="3" cols="50"></textarea></dd>
<dt>フォームデザイン</dt>
<dd><input type="text" name="design_type" value=""></dd>
<dt>募集開始日</dt>
<dd>
<input type="text" name="start_date_y" value="" size="4">年
<input type="text" name="start_date_m" value="" size="2">月
<input type="text" name="start_date_d" value="" size="2">日
</dd>
<dt>募集終了日</dt>
<dd>
<input type="text" name="end_date_y" value="" size="4">年
<input type="text" name="end_date_m" value="" size="2">月
<input type="text" name="end_date_d" value="" size="2">日
</dd>
</dl>
<input type="submit" value="新規登録" >
</form>
</div>



</body>
</html>

