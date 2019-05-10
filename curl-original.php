<?php

$base_url = 'https://api-rmelite.ratehighway.com/RateMonitorService/rest/';

$data = array(
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

$payload = json_encode($data);

$url = $base_url . "api/v1/RateMonitor/ShopAdhocRequest";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: */*',
    'AccessId: ded603ed-022a-45c6-a43f-d3a249a73002',
    'Cache-Control: no-cache',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Host: api-rmelite.ratehighway.com',	
    'Postman-Token: fcf90690-1845-46a3-a517-9d2f80c39637,60baa162-7861-4b84-9fd3-525a34279c2a',
	'User-Agent: PostmanRuntime/7.11.0',
	'accept-encoding: gzip, deflate',
    'cache-control: no-cache',
    'content-length: ' . strlen($payload)
)); // -H
curl_setopt($ch, CURLOPT_POST, true); // -X POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); // -d data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return string
//curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary

// $shopId = curl_exec($ch);
// $data = json_decode($shopId);

// if (curl_errno($ch)) {
//     echo 'Error:' . curl_error($ch);
// }
// else {
// 	echo $data->ShopRequestId;
// }
curl_close ($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api-rmelite.ratehighway.com/RateMonitorService/rest/api/v1/RateMonitor/ShopStatus/434064" );
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: */*',
    'AccessId: ded603ed-022a-45c6-a43f-d3a249a73002',
    'Cache-Control: no-cache',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Host: api-rmelite.ratehighway.com',	
    'Postman-Token: fcf90690-1845-46a3-a517-9d2f80c39637,60baa162-7861-4b84-9fd3-525a34279c2a',
	'User-Agent: PostmanRuntime/7.11.0',
	'accept-encoding: gzip, deflate',
    'cache-control: no-cache',
)); // -H
curl_setopt($ch, CURLOPT_POST, false); // -X POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return string

//ShopStatus
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else {
	echo $result;
}

curl_close ($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api-rmelite.ratehighway.com/RateMonitorService/rest/api/v1/RateMonitor/ShopResult/434064" );
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: */*',
    'AccessId: ded603ed-022a-45c6-a43f-d3a249a73002',
    'Cache-Control: no-cache',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Host: api-rmelite.ratehighway.com',	
    'Postman-Token: fcf90690-1845-46a3-a517-9d2f80c39637,60baa162-7861-4b84-9fd3-525a34279c2a',
	'User-Agent: PostmanRuntime/7.11.0',
	'accept-encoding: gzip, deflate',
    'cache-control: no-cache',
)); // -H
curl_setopt($ch, CURLOPT_POST, false); // -X POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return string

//ShopStatus
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else {

	echo "<pre>" . $result . "</pre>";
}

curl_close ($ch);
?>