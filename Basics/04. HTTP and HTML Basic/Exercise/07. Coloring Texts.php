<?php
if (isset($_GET['input'])){
    $input=$_GET['input'];


    for ($i=0;$i<strlen($input);$i++){

        if ($input[$i]!=' ') {
            $character = ord($input[$i]);

            if ($character % 2 == 0) {
                echo "<span style='color:red'>$input[$i]</span>" . ' ';
            } else {
                echo "<span style='color: blue'>$input[$i]</span>" . ' ';
            }
        }
    }
    //var_dump($arrayOfChars);
}
?>