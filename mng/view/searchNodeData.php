<?php
require $_SERVER ["DOCUMENT_ROOT"] . '/testNodeData/conf/conf.php';
$connMgr = new ConnManger ( $db_conf, $mem_conf );
$connSir = $connMgr->getConn_testdata ();

$node_list = null;
$mode = $_GET ['mode'];
$result = "normal";
if ($mode == 'search'){
	$id = $_GET ['nodeId'];
	$node_name = $_GET['ser_node'];
	$node_list = Node_Data_DAO::getListByName($id,$connSir);
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
			<th>nodeTime</th>
			<th>nodeData</th>
			</tr>
		</thead>
		<tbody>
		 <?php
		$i = 1;
		foreach ( $node_list as $node_record ) {
			//$news_record = Land_news_info_DAO::getRecord($id, $dbCon);
			$node_id = $node_record->getnId();
			$node_nData = $node_record->getnData();
			$node_nTime = $node_record->getnTime(); 
			echo " <tr>
      <td>$node_id</td>
      <td>$node_nTime</td> 
      <td>$node_nData</td> 
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
	window.location.href = "searchNodeData.php?mode=search&nodeId="+id;
});
</script>	
</body>
</html>