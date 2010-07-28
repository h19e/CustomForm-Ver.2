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
<table border="1">
<tr>
<th>番号</th>
<th>質問項目</th>
<th>入力タイプ</th>
</tr>
<?php foreach ($view->get('question_list') as $info) : ?>
<tr>
<td><?php $view->display('disp_order',$info); ?></td> 
<td><?php $view->display('title',$info); ?></td> 
<td><?php $view->display('input_type',$info); ?></td> 
</tr>
<?php endforeach; ?>
</table>
</div>

<a href="<?php echo ENTRY_PATH; ?>?MO=Question&AC=RegistInput">新規登録</a>


</body>
</html>

