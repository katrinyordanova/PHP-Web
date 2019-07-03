<?php

$text=explode(', ',readline());
$result=[];

for ($i=0;$i<count($text);$i+=2){
    $question=$text[$i];
    $answer=$text[$i+1];

    if (!array_key_exists($question,$result)){
        $result[$question]=$answer;
    }
}

foreach ( $result as $item => $value) {
    echo '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL;
    echo '<quiz>'. PHP_EOL;
  echo ' <question>' . PHP_EOL;
    echo "  $item" . PHP_EOL;
  echo ' </question>' . PHP_EOL;
  echo ' <answer>' . PHP_EOL;
    echo "  $value" . PHP_EOL;
  echo ' </answer>' . PHP_EOL;
echo '</quiz>' . PHP_EOL;
}