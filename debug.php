<?php


$dateFrom='2019-05-21';
$dateTo='2019-05-21';
$lorFrom=3;
$lorTo=3;
$location="MCO";

$begin = new DateTime( date('Y-m-d',strtotime(str_replace('/', '-', $dateFrom))) );
$end   = new DateTime( date('Y-m-d',strtotime(str_replace('/', '-', $dateTo))) );

$begin_2 = new DateTime( date('Y-m-d',strtotime(str_replace('/', '-', $dateFrom))) );
$end_2   = new DateTime( date('Y-m-d',strtotime(str_replace('/', '-', $dateTo))) );



$rateOutputReturn=array();


//*************PREPARE DATA CURL

$mh = curl_multi_init();


// array of curl handles
$curly = array();

$ch_ticker=0;
for($dt_2 = $begin_2; $dt_2 <= $end_2; $dt_2->modify('+1 day')) {
    for ($i = $lorFrom; $i <= $lorTo; $i++) {
        $ch = curl_init("http://104.248.230.236:8001/?country=UNITED%20STATES&rent_from=*%20PHOENIX%20AIRPORT%20(%20PHX%20)&rent_to=%20PHOENIX%20AIRPORT%20(%20PHX%20)&pick_up_date=05/09/2019&pick_up_time=10:30%20AM&drop_off_date=05/10/2019&10:30%20AM");

        $curly[] = $ch;
        curl_multi_add_handle($mh, $curly[count($curly) - 1]);
        $ch_ticker++;
    }
}


echo "<br>Count: ch: ".count($curly)."<br>";

// execute all queries simultaneously, and continue when all are complete
$running = null;
do {
    curl_multi_exec($mh, $running);
} while ($running > 0);


// get content and remove handles
foreach($curly as $id => $c) {
$result[$id] = curl_multi_getcontent($c);
curl_multi_remove_handle($mh, $c);
}

// all done
curl_multi_close($mh);


return;

echo "<br>response coming up:::<br><pre>";
echo "$response"; // output results
//Returns array of responses from each individual search


/*
$ch = curl_init();

// curl_setopt($ch,CURLOPT_URL,"http://104.248.230.236:8000/?url=https://www.expedia.com/carsearch?locn=Orlando,%20FL%20(MCO-Orlando%20Intl.)");
curl_setopt($ch,CURLOPT_URL,"104.248.230.236:8001/?country=UNITED%20STATES&rent_from=*%20PHOENIX%20AIRPORT%20(%20PHX%20)&rent_to=%20PHOENIX%20AIRPORT%20(%20PHX%20)&pick_up_date=05/09/2019&pick_up_time=10:30%20AM&drop_off_date=05/10/2019&10:30%20AM");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);
curl_close($ch);

$parsed_rate=array();

$data=json_decode($data,true);


foreach($data as $rate){
    $class=$rate['class'];
    $iso=$this->parseFoxISOImage($rate['image']);
    $passenger=$rate['passenger'];
    $baggage=$rate['baggage'];
    $pricenow1=$rate['pricenow1'];
    $pricenow2=$rate['pricenow2'];
    $save=$rate['save'];
    $pricelater1=$rate['pricelater1'];
    $pricelater2=$this->parseFoxRatePricelater2($rate['pricelater2']);



    //

    echo "<br>".$dateFrom."<br>";
    var_dump($pricelater2);
}*/