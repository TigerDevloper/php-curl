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

//Prepare data CURL
$ch_ticker=0;
for($dt = $begin; $dt <= $end; $dt->modify('+1 day')){

    for($i=$lorFrom;$i<=$lorTo;$i++){
        $message="";

        echo "<br>1 - loop <br>";

        //Reassigning dates and LOR variables to fit the loop
        $loopDate=$dt->format("Y-m-d");
        $lor=$i;

        $ch = curl_init("104.248.230.236:8001/?country=UNITED%20STATES&rent_from=*%20PHOENIX%20AIRPORT%20(%20PHX%20)&rent_to=%20PHOENIX%20AIRPORT%20(%20PHX%20)&pick_up_date=05/09/2019&pick_up_time=10:30%20AM&drop_off_date=05/10/2019&10:30%20AM");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $ch_ticker++;

    }
}

//*************PREPARE DATA CURL

$mh = curl_multi_init();
$ch_ticker=0;
for($dt_2 = $begin_2; $dt_2 <= $end_2; $dt_2->modify('+1 day')) {
    for ($i = $lorFrom; $i <= $lorTo; $i++) {
        echo "<br>2 - loop <br>";

        curl_multi_add_handle($mh, $ch);
        $ch_ticker++;
    }
}


echo "<br>Count: ch: ".count($ch)."<br>";

// execute all queries simultaneously, and continue when all are complete
$running = null;
do {
    curl_multi_exec($mh, $running);
} while ($running);



curl_multi_remove_handle($mh, $ch);
curl_multi_close($mh);


$response = curl_multi_getcontent($ch);

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