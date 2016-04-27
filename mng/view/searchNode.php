<?php
require $_SERVER ["DOCUMENT_ROOT"] . '/testNodeData/conf/conf.php';
$connMgr = new ConnManger ( $db_conf, $mem_conf );
$connSir = $connMgr->getConn_testdata ();

$node_list = null;
$mode = $_GET ['mode'];
$result = "normal";
if ($mode == 'delete') {
	$id = $_GET ['nodeId']; echo $id;
	$node_record = node_inf_DAO::getRecord($id, $connSir);
	if ($node_record != null){
		Node_inf_DAO::delete($node_record, $connSir);
		$result = "dele";
	}else{
		$result = "deleErr";
	}
	
}elseif ($mode == 'search'){
	$id = $_GET ['nodeId'];
	$node_name = $_GET['ser_node'];
	$node_list = Node_inf_DAO::getListByName($id,$connSir);
	if (count($node_list) == 0){
		$result = "notFound";
	}

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link rel="stylesheet" type="text/css"
	href="lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

<script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="lib/jquery.media.js"></script>

<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
<link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body>
 <div>
	<div>
		<form style="margin-top: 0px;">
			名称 &nbsp;
			<input type="hidden" name="mode" value="search">
			<input  id="nodeSear" name = "nodeName" type="text"> 
				&nbsp;
				<button type="button" id="searchButton">
				<i class="fa fa-search"></i> 查找
			</button>
			<br><br>			
		</form>
	</div>
	
	<table>
		<thead>
			<tr>
			<th>nodeId</th>
			<th>nodeName</th>
			<th>nodeIdDesc</th>
			</tr>
		</thead>
		<tbody>
		 <?php
		$i = 1;
		foreach ( $node_list as $node_record ) {
			//$news_record = Land_news_info_DAO::getRecord($id, $dbCon);
			$node_id = $node_record->getId();
			$name = $node_record->getName();
			$node_desc = $node_record->getnDesc(); 
			echo " <tr>
      <td>$node_id</td>
      <td>$name</td> 
      <td>$node_desc</td> 
      
      <td>
          <input type='submit'  onclick='fn_del($node_id);return false;' value='删除'>
      </td>
    </tr>";
			$i ++;
		}
		?>
  </tbody>
	</table> 
</div>
<script type="text/javascript">

$("#searchButton").click(function(){
	var id = $('#nodeSear').val();
	var ser_node = $('#ser_node').val();
	window.location.href = "searchNode.php?mode=search&nodeId="+id+"&ser_node="+ser_node;
});

function fn_del(id){
	if(window.confirm("确认删除吗？")){
		url = "searchNode.php?mode=delete&nodeId="+id;
		window.location.href = url;
		}
}

function init() {
	var msg = "<?php echo $result ?>";
	if(msg == 'dele'){
    	alert('已删除！');
    	}else if(msg == 'deleErr'){
        	alert('未找到该资讯');
        	window.location.href = "searchNode.php";
        	}else if(msg == 'notFound'){
				alert('未检索到相关资讯信息');
            	}
}
</script>	
</body>
</html>