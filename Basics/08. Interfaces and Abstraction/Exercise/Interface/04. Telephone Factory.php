<?php
interface callPeople{
    function call($numbers);
}

interface surfTheWeb{
    function surf($webSite);
}

class Smartphone implements callPeople ,surfTheWeb {

    public function call($numbers)
    {
        if (!ctype_digit($numbers)){
            throw new Exception('Invalid number!'."\n");
        }
        return 'Calling... '.$numbers."\n";
    }

    public function surf($webSites)
    {
        if (preg_match("/[0-9]+/",$webSites)){
            throw new Exception('Invalid URL!'."\n");
        }
        return 'Browsing: ' . $webSites .'!'. "\n";
    }
}
$numbers=explode(' ',readline());
$sites=explode(' ',readline());

$smartphone = new Smartphone();


foreach ($numbers as $number) {
try {
		echo $smartphone->call($number);
} catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

foreach ($sites as $site) {
    try {
        echo $smartphone->surf($site);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}