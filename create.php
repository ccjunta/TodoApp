<?php
require_once('./Models/Todo.php');

//ユーザーが入力したタスクを変数に格納
$task = $_POST['task'];

//Todoクラスのインスタンスを作成し
//変数todoに入れる

$todo = new Todo(); 

//Todoクラスのcreateメソッドを実行
$todo->create($task);


//echo $todo->table;
//echo $todo->db_manager;
//echo '<br>';
//var_dump($todo->db_manager);