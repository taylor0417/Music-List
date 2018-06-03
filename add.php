<?php
  header('Content-Type: text/html; charset=UTF-8');
  //如果没有json文件则创建json并写入一个空数组
  if(!is_file('list.json')){
    file_put_contents('list.json','[]');
  }
  $list = file_get_contents('list.json');
  //将json文件的内容转换成数组形式
  $list_arr = json_decode($list);
  $ext = pathinfo($_FILES['source']['name'])['extension'];
  $filename = 'music_'.rand().'.'.$ext;
  $path = './upload/'.$filename;
  move_uploaded_file($_FILES['source']['tmp_name'],$path);
  $_POST['source'] = $path;
  $_POST['id'] = time();
  array_push($list_arr,$_POST);
  $json = json_encode($list_arr,JSON_UNESCAPED_UNICODE);
  file_put_contents('list.json',$json);
  echo '添加成功';
  header('Refresh: 2; url=list.php');
