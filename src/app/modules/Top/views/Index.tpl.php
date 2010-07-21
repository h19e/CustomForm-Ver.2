<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CustomForm</title>
<link rel="stylesheet" href="<?php echo ENTRY_PATH; ?>css/base.css" type="text/css" >
<body>
<section id="page">
<header>
<hgroup>
<h1>CutomForm</h1>
<h3>make original form</h3>
</hgroup>



<?php $view->inject('Header'); ?>
<h1>CustomForm</h1>

<div>
<form action="<?php echo ENTRY_PATH; ?>" method="GET">
<dl>
<dt>アカウント</dt>
<dd><input type="text" name="user_id" value=""></dd>
<dt>パスワード</dt>
<dd><input type="password" name="password" value=""></dd>
</dl>
<input type="submit" value="LOGIN" >
</form>
</div>




</body>
</html>

