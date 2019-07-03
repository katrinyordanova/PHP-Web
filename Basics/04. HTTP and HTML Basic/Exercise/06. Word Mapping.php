<?php
if (isset($_GET['input'])){
    $input=strtolower($_GET['input']);
    $result=[];
    preg_match_all('/[a-z]+/',$input,$matches);

    foreach ($matches[0] as $value) {
        //var_dump($value);
        if (!array_key_exists($value,$result)){
            $result[$value]=1;
        }
        else {
            $result[$value]++;
        }
    }

    echo "<table border='2'>";
            foreach ($result as $key => $item) {
        echo "<tr><td>$key</td><td>$item</td></tr>";
    }
    echo "</table>";
    //var_dump($result);
}
?>