<?php

  header('Content-Type: text/html; charset=UTF-8');
  $json = file_get_contents('./list.json');
  $lists = json_decode($json, true);
  $id = $_GET['id'];
  foreach($lists as $key=>$val){
    if($id = $val['id']){
      array_splice($lists,$key,1);
      break;
    }
  }
  $json = json_encode($lists);
  file_put_contents('list.json',$json);
  echo '删除成功';
  header('Refresh: 2; url=list.php');
