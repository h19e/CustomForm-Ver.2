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
<h3>make original form</h3>
</hgroup>

<div>
<form action="<?php echo ENTRY_PATH; ?>" method="POST">
<input type="hidden" name="MO" value="Top">
<input type="hidden" name="AC" value="LoginConfirm">
<dl>
<dt>アカウント</dt>
<dd><input type="text" name="account" value=""></dd>
<dt>パスワード</dt>
<dd><input type="password" name="password" value=""></dd>
</dl>
<input type="submit" value="LOGIN" >
</form>
</div>

<a href="<?php echo ENTRY_PATH; ?>?MO=User&AC=RegistInput">アカウント作成</a>


</body>
</html>

