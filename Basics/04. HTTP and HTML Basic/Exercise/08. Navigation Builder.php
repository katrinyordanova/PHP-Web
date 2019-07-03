<?php
$CInput=$_GET['categories'];
$spitCategories=explode(', ',$CInput);

echo "<h2>Categories</h2>";
echo "<ul>";
if (isset($_GET['categories'])) {

    for ($i = 0; $i < count($spitCategories); $i++) {
        echo "<li>$spitCategories[$i]</li>";
    }
}
echo "</ul>";

$TInput=$_GET['tags'];
$splitTags=explode(', ',$TInput);

echo "<h2>Tags</h2>";
echo "<ul>";
if (isset($_GET['tags'])) {
    for ($j = 0; $j < count($splitTags); $j++) {
    echo "<li>$splitTags[$j]</li>";
    }
}
echo "</ul>";

$MInput=$_GET['months'];
$splitMonths=explode(', ',$MInput);

echo "<h2>Months</h2>";
echo "<ul>";
if (isset($_GET['months'])){
    for ($k=0;$k<count($splitMonths);$k++){

        echo "<li>$splitMonths[$k]</li>";
    }
}
echo "</ul>";
?>