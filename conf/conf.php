<?php
define('APP_ROOT', $_SERVER ["DOCUMENT_ROOT"].'/testNodeData' );

//加载配置变量
require (APP_ROOT.'/conf/env.php');
require APP_ROOT.'/conf/const.php';
require APP_ROOT.'/conf/constents.php';
//加载数据库连接函数
require (APP_ROOT.'/db/conn/ConnManager.php');
require (APP_ROOT.'/db/conn/ConnDb.php');
//加载sql管理函数
require APP_ROOT.'/db/sql/ChangeDb.php';
require APP_ROOT.'/db/sql/SearchDb.php';
//加载表
require APP_ROOT.'/db/table/Node_Data.php';
require APP_ROOT.'/db/table/Node_inf.php';
?>