<?php

function isPalindrome($string){
    for ($i=0;$i<strlen($string)/2;$i++){
        $currentLetter=$string[$i];
        $lastLetter=$string[strlen($string)-$i-1];

        if ($currentLetter!=$lastLetter){
            return 'false';
        }
    }
    return 'true';
}
echo isPalindrome(readline());