<?php

	$json = file_get_contents('./list.json');
	if(!$json){
		header('Location: upload.html');
		die();
	}
	$lists = json_decode($json,true);


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>音乐列表</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center display-3 py-3">音乐列表</h1>
		<hr>
		<table class="table table-bordered">
			<thead class="thead-inverse">
				<tr>
					<th>标题</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>音乐</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach($lists as $key=>$val){ ?>
					<tr>
						<td><?php echo $val['title']; ?></td>
						<td><?php echo $val['singer']; ?></td>
						<td><?php echo $val['album']; ?></td>
						<td><audio src="<?php echo $val['source']; ?>" controls></audio></td>
						<td>
							<a href="./delete.php?id=<?php echo $val['id']; ?>" class="btn btn-danger">删除</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>
