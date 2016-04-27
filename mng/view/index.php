<?php
	
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
<body >
13612182331
<div>
//数据统计</div><div>
//数据统计
define('AT_GET_DATA_USER_DIS', '1025'); //用户分布</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "USER_DISTRIBUTION": [//用户分布</div><div>
       {
          "USE_COUNT":  ,</div><div>
          "DEVEICE_COUNT":  ,</div><div>
          "CITY_DATA": [
              {
              "CITY": "",
               "CITY_COUNT":  
             }]
     },</div><div>
    "IP_ADDRESS": ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>

//地块热度</div><div>
define('AT_GET_DATA_LAND_HEAT_BY_TIME', '1026');//给定时间内的地块热度</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "LAND_HEAT_REPORT_BY_TIME": [
        {
            "LAND_ID":  ,
            "LAND_NAME":  ,
            "LAND_HEAT":  
        } ],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
(RESULT =>  '2', ERR_MSG => '查询信息不完整');</div><div>
			
define('AT_GET_DATA_LAND_HEAT_CLICK', '1027');//地块热度点击明细</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$land_id = $this->post_array['LAND_ID'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "LAND_HEAT_CLICK": {
        "LAND_ID":  ,</div><div>
        "LAND_CLICK_DATA": [
            {
                "COMPANY_ID":  ,
                "COMPANY_NAME":  ,
                "COMPANY_VALUE":  
            }],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>
	 </div><div>
define('AT_GET_DATA_LAND_HEAT_COLLECT', '1028');//地块热度收藏明细</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$land_id = $this->post_array['LAND_ID'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "LAND_HEAT_COLLECT": [
        {
            "COMPANY_ID":  ,
            "COMPANY_NAME":  ,
            "LAND_ID":  ,
            "COLLECT_DATE":  
        }],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>
</div><div></div><div>
//企业偏好</div><div>
define('AT_GET_DATA_COMPANY_PREFER_BY_TIME', '1029');//给定时间和企业ID的企业偏好</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
		$company_id= $this->post_array['COMPANY_ID'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "COMPANY_PREFER_BY_TIME": [</div><div>
        {</div><div>
            "COMPANY_ID":  ,</div><div>
            "COMPANY_NAME":   ,</div><div>
            "LAND_DATA": [ 
            	{
                    "LAND_ID":  ,
                    "LAND_NAME":  ,
                    "LAND_HEAT":  
                }]</div><div>
        } ],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>
</div><div>
//地区成交量</div><div>
define('AT_GET_DATA_AREA_TRANSATION_BY_TIME', '1030');//给定时间内的区域成交量统计</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "AREA_TRANSATION_BY_TIME": [
        {
            "AREA_NAME":  ,
            "AREA_TRAN_COUNT":  ,
            "AREA_TRAN_PRICE":  
         }],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>
		
define('AT_GET_DATA_AREA_TRANSATION_CLICK', '1031');//区域交易明细</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$area_name = $this->post_array['area_name'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "AREA_TRANSATION_BY_TIME": {</div><div>
        "AREA_NAME":  ,</div><div>
        "LAND_DATA": [
            {
                "LAND_ID":  ,
                "LAND_NAME":  ,
                "AREA_PRICE":  ,
                "AREA_DATE":  
            }</div><div>
        ]</div><div>
    },</div><div>
    "IP_ADDRESS": "   ",</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>

//区域热度</div><div>
define('AT_GET_DATA_AREA_HEAT_BY_TIME', '1032');//给定时间内的区域热度</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "AREA_HEAT_BY_TIME": [
        {
            "AREA_NAME":  ,
            "AREA_HEAT":  
        }],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>

define('AT_GET_DATA_AREA_HEAT_CLICK', '1033');//区域热度明细</div><div>
		$phone = $this->post_array ['PHONE'];</div><div>
		$area_name = $this->post_array['AREA_NAME'];</div><div>
		$start_time = $this->post_array['START_TIME'];</div><div>
		$end_time = $this->post_array['END_TIME'];</div><div>
{</div><div>
    "RESULT": "1",</div><div>
    "AREA_HEAT_CLICK": {
        "AREA_NAME":  ,</div><div>
        "AREA_HRAT_CLICK": [
            {
                "LAND_ID":  ,
                "LAND_NAME":  ,
                "LAND_HEAT":   
            }],</div><div>
    "IP_ADDRESS":  ,</div><div>
    "MD5-KEY":  </div><div>
}</div><div>
$result_array = array (RESULT =>  '2', ERR_MSG => '查询信息不完整');	</div><div>
</div>
	<form action="http://localhost/testNodeData/mng/view/addNode.php">
		<input  type="submit" value="node">
	</form>
						
	<form action="http://localhost/testNodeData/mng/view/addNodeData.php">
		<input type="submit" value="nodeData">
	</form>
	<form  action="http://localhost/testNodeData/mng/view/searchNode.php">
		<input type="submit" value="searchNode">
	</form>
	
	<form  action="http://localhost/testNodeData/mng/view/searchNodeData.php">
		<input type="submit" value="searchNodeData">
	</form>
</body>
</html>
						
						
						