<form >
   Name: <input type="text" name="name"><br>
   Age: <input type="text" name="age"><br>
    <input type="radio" name="gender" value="male"> Male <br>
    <input type="radio" name="gender" value="female"> Female <br>
    <input type="submit" name="submit" required>
</form>

<?php
if (isset($_REQUEST['gender']) and isset($_REQUEST['name']) and isset($_REQUEST['age'])){
    $name=htmlspecialchars($_REQUEST['name']);
    $age=htmlspecialchars($_REQUEST['age']);
    $gender=$_REQUEST['gender'];

    echo "My name is $name. I am $age years old. I am $gender.";
}
?>