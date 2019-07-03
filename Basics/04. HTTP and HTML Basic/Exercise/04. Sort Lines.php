<?php
if (isset($_GET['lines'])){
    $splitInput=explode("\n",$_GET['lines']);
    $trimInput=array_map('trim',$splitInput);
    $finalInput=array_filter($trimInput);

    sort($finalInput,SORT_STRING);

    $sortedLines=implode("\n",$finalInput);
}
?>

<form>
    <textarea rows="10" name="lines"><?= $sortedLines?></textarea> <br>
<input type="submit" value="Sort">
</form>