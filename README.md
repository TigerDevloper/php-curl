# php-curl

--------------------------------------------------------
##all the methods for the API are here:
https://api-rmelite.ratehighway.com/RateMonitorService/rest/Help

##make this Curl Request work

curl -X POST \
 https://api-rmelite.ratehighway.com/RateMonitorService/rest/api/v1/RateMonitor/ShopAdhocRequest \
 -H 'Accept: */*' \
 -H 'AccessId: ded603ed-022a-45c6-a43f-d3a249a73002' \
 -H 'Cache-Control: no-cache' \
 -H 'Connection: keep-alive' \
 -H 'Content-Type: application/json' \
 -H 'Host: api-rmelite.ratehighway.com' \
 -H 'Postman-Token: fcf90690-1845-46a3-a517-9d2f80c39637,60baa162-7861-4b84-9fd3-525a34279c2a' \
 -H 'User-Agent: PostmanRuntime/7.11.0' \
 -H 'accept-encoding: gzip, deflate' \
 -H 'cache-control: no-cache' \
 -H 'content-length: 422' \
 -d '{
 "PickupLocation": "MCO",
 "DropLocation": "MCO",
 "SIPP": "ECAR,FCAR,CCAR",
 "Datasource": "EXP",
 "Currency": "USD",
 "POS": "US",
 "LOR": "2",
 "BeginDateTime": "2019-06-01T10:00:00",
 "EndDateTime": "2019-06-02T10:00:00",
 "DOW": "1,2,3,4,5,6,7",
 "Vend": "EZ,AD,FX",
 "ComparisonCo": "EZ",
 "ReqDesc": "Shop Request from Enicode.com TEST",
 "RateType": "4",
 "ExtraCriteria": "null"
}'