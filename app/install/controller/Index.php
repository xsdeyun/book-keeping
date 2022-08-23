<?php
namespace app\install\controller;

use think\facade\Request;
use think\facade\View;
use think\facade\Db;

class Index extends Base
{
    public function index()
    {
		if (Request::isAjax()) {
			$post_data = Request::post();
			$dbhost = trim($post_data['host']);
			$dbport = trim($post_data['port']);
			$dbuser = trim($post_data['dbuser']);
			$dbpass = trim($post_data['dbpass']);
			$dbname = trim($post_data['dbname']);
			try {
				$dsn = "mysql:host=$dbhost:$dbport";
				$db = new \PDO($dsn, $dbuser, $dbpass); 
				$sql = 'CREATE DATABASE IF NOT EXISTS '.$dbname.' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
				$db->exec($sql);
				$table='CREATE TABLE `'.$dbname.'`.`admin` (`id` INT NOT NULL AUTO_INCREMENT, `username` TEXT NULL DEFAULT NULL, `nickname` TEXT  NULL DEFAULT NULL, `password` TEXT NOT NULL , `email` TEXT NULL , `description` TEXT NULL DEFAULT NULL, `state` INT NULL DEFAULT 1, `CreatTime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY (`id`) )';
				$db->exec($table);
				$content = str_replace(['{{$dbhost}}','{{$dbname}}','{{$dbuser}}','{{$dbpass}}','{{$dbport}}'],
				[$dbhost,$dbname,$dbuser,$dbpass,$dbport], 
				file_get_contents(app_path().'data/database.tpl'));
				@file_put_contents(root_path()."config/database.php",$content);
				@touch(public_path().'install.lock');
				$insert_data=Db::name('admin')->strict(false)->insert($post_data);
				return json(["code"=>200,"msg"=>"数据库创建成功！"]);
			} catch(\PDOException $e) { 
				return json(["code"=>400,"msg"=>"数据库创建失败！"]);
			}
		}
		return $this->fetch();
    }

}
