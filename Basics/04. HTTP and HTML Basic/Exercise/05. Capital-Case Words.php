<form>
    <textarea role="10" name="text"></textarea><br />
    <input type="submit" value="Extract">
</form>

<?php
if (isset($_GET['text'])) {
    $input = $_GET['text'];
    preg_match_all('/\b[A-Z]+\b/',$input,$matches);
    $result=implode(', ',$matches[0]);
    echo $result;
    var_dump($result);
}
?>