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
<th>タイトル</th>
<th>募集期間</th>
<th>登録日</th>
<th>更新日</th>
</tr>
<?php foreach ($view->get('form_list') as $info) : ?>
<tr>
<td><?php $view->display('title',$info); ?></td> 
<td><?php $view->dateDisplay('start_date',$info); ?> から <?php $view->dateDisplay('end_date',$info); ?></td> 
<td><?php $view->display('create_date',$info); ?></td> 
<td><?php $view->display('update_date',$info); ?></td> 
</tr>
<?php endforeach; ?>
</table>
</div>

<a href="<?php echo ENTRY_PATH; ?>?MO=Form&AC=RegistInput">新規登録</a>


</body>
</html>

