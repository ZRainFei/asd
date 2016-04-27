<?php
require $_SERVER ["DOCUMENT_ROOT"] . '/testNodeData/conf/conf.php';
$connMgr = new ConnManger ( $db_conf, $mem_conf );
$connMng = $connMgr->getConn_testdata ();

$mode = $_POST ['mode'];
$result = 'normal';
if ($mode == "addNodeData") {
	$nodeid = $_POST ['node_id'];
	if ($nodeid != "") {
		$sir_news_record = new Node_Data(array());
		$newId = "";
		$sir_news_record->setId( $newId);
		$sir_news_record->setnId( $_POST ['node_id']);
		$sir_news_record->setnData( $_POST ['node_data']);
		$time = date("Y-m-d H:i:s");
		$sir_news_record->setnTime($time);
		
		Node_Data_DAO::insert ( $sir_news_record, $connMng );
		$result = "succ";
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

<body onload="init()">
	<form name="fm" action="" method="post">
		<div><label>NodeID</label> </div> 
		<div><input type="text" name="node_id" id="node_id" 
		maxlength="10" pattern="[0-9]">	</div> 	
		
		<div><label>NodeData</label> </div> 
		<div><input type="text" name="node_data" id="node_data" 
		maxlength="20" >	</div> 	
		
		<div><input type="submit" onclick="return checkInput();" value="submit">
		</div>
		<input type="hidden" name="mode" id="mode" value="addNodeData">
	</form>
	
		<script type="text/javascript">	
		function init() {
			var msg = "<?php echo $result ?>";
			if(msg == 'succ'){
		    	alert('提交成功！');
		    	}
		}
		function checkInput(){
			
			if($('#node_id').val() == ""){
				alert("node id is null！");
				return false;
				}

				if($('#node_data').val() == ""){
						alert("node data is null");
						return false;
				}	
				
				if(!window.confirm('确认提交吗？')){
					return false;
				}
		}
		</script>	
</body>
</html>