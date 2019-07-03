<form>
    <div>First Number: </div>
    <input type="text" name="num1" />
    <div>Second Name: </div>
    <input type="text" name="num2" />
    <div><input type="submit" /></div>
</form>

<?php
$firstNumber=$_GET['num1'];
$secondNumber=$_GET['num2'];

echo $firstNumber . ' + ' . $secondNumber . ' = ' . ($firstNumber+$secondNumber);
?>