<?php


require_once('config/dbconnect.php');


//Todoを操作するクラス(もの);
// -追加する機能
// -検索する機能
// -編集する機能
// -削除する機能

class Todo
{
    //プロパティ
    //テーブル名
    //DbManagerインスタンスを持つ変数

    //mysqlで作ったテーブルを管理
    //todoから操作されるのはtasksだけ他の人は書き換えられない
    //テーブル名
    private $table ='tasks';

    //DBmanagerクラスのインスタンスを入れる configの中のクラスを入れておく箱
    private $db_manager;

    public function __construct()
    {
        //db_managerプロパティは、Dbmanagerクラスのインスタンス
        $this->db_manager = new DbManager();

        //データベースに接続
        $this->db_manager->connect();
    }

    public function create($task)
    {
        //INSET文を準備 $dbh-データベースの接続情報がある SQL実行、$stmt準備されて変数
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
        //準備したものを実行
        $stmt->execute([$task]);
        header('Location: index.php');

    }
}