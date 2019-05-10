<?php

$base_url = 'https://api-rmelite.ratehighway.com/RateMonitorService/rest/';

function fetch_api_data($api_url, $method, $data)
{
	$headers = array(
	    'Accept: */*',
	    'AccessId: ded603ed-022a-45c6-a43f-d3a249a73002',
	    'Cache-Control: no-cache',
	    'Connection: keep-alive',
	    'Content-Type: application/json',
	    'Host: api-rmelite.ratehighway.com',	
	    'Postman-Token: fcf90690-1845-46a3-a517-9d2f80c39637,60baa162-7861-4b84-9fd3-525a34279c2a',
		'User-Agent: PostmanRuntime/7.11.0',
		'accept-encoding: gzip, deflate',
	    'cache-control: no-cache'
	);
	$payload = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url);

	if($method != "GET")
	{
//		curl_setopt($ch, CURLOPT_POST, true); // -X POST
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); // -X POST
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); // -d data
		$headers[] = 'content-length: ' . strlen($payload);
	}
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // -H
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return string
//	curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary

	$shopId = curl_exec($ch);
	$result = json_decode($shopId);

	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	    return array("error"=>curl_error($ch));
	}
	curl_close ($ch);
	return $result;
}

function my_json_print($data)
{
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}


$input = array(
 "PickupLocation"=> "MCO",
 "DropLocation"=> "MCO",
 "SIPP"=> "ECAR,FCAR,CCAR",
 "Datasource"=> "EXP",
 "Currency"=> "USD",
 "POS"=> "US",
 "LOR"=> "2",
 "BeginDateTime"=> "2019-06-01T10:00:00",
 "EndDateTime"=> "2019-06-02T10:00:00",
 "DOW"=> "1,2,3,4,5,6,7",
 "Vend"=> "EZ,AD,FX",
 "ComparisonCo"=> "EZ",
 "ReqDesc"=> "Shop Request from Enicode.com TEST",
 "RateType"=> "4",
 "ExtraCriteria"=> "null"
);

// get request id

$data = fetch_api_data($base_url . "api/v1/RateMonitor/ShopAdhocRequest", "POST", $input);
if(isset($data->error))
{
	echo $data->error;
	return;
}
$shopRequestId = $data->ShopRequestId;

my_json_print($data);

//$shopRequestId = 434183;

// get status 

$data = fetch_api_data($base_url . "api/v1/RateMonitor/ShopStatus/" . $shopRequestId, "GET", []);
if(isset($data->error))
{
	echo "error";
	return;
}
my_json_print($data);

if($data->ShopStatus == 'N')
{
	echo 'Status is N. Can not fetch data!';
	return;
}

// get result

$data = fetch_api_data($base_url . "api/v1/RateMonitor/ShopResult/" . $shopRequestId, "GET", []);
if(isset($data->error))
{
	echo "error";
	return;
}
my_json_print($data);

?>