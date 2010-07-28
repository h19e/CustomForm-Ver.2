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
<input type="hidden" name="MO" value="Question">
<input type="hidden" name="AC" value="RegistComplete">
<dl>
<dt>タイトル</dt>
<dd><input type="text" name="title" value=""></dd>
<dt>入力タイプ</dt>
<dd>
<select name="input_type" onChange="javascript:changeInputType(this.form,'Question','RegistInput')" >
<?php foreach (Conf::getInputType() as $value => $name) : ?>
<?php if ($value == $view->get('input_type')) : ?>
<option value="<?php echo $value; ?>" selected="selected" ><?php echo $name; ?></option>
<?php else: ?>
<option value="<?php echo $value; ?>"><?php echo $name; ?></option>
<?php endif; ?>
<?php endforeach; ?>
</select>
</dd>
<dt>必須項目</dt>
<dd>
<?php if ($view->get('require_flg') == "1") : ?>
<input type="checkbox" name="require_flg" value="1" checked="checked" >
<?php else: ?>
<input type="checkbox" name="require_flg" value="1" >
<?php endif; ?>
</dd>
<dt>結果表示制限</dt>
<dd>
<?php if ($view->get('disp_limit_flg') == "1") : ?>
<input type="checkbox" name="disp_limit_flg" value="1" checked="checked" >
<?php else: ?>
<input type="checkbox" name="disp_limit_flg" value="1" >
<?php endif; ?>
</dd>
<?php $view->inject($view->get('input_type')); ?>
</dl>
<input type="submit" value="新規登録" >
</form>
</div>



</body>
</html>

