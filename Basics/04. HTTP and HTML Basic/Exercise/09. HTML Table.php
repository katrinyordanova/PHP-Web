<form>
    Name: <input type="text" name="name"><br>
    Phone: <input type="text" name="phone"><br>
    Age: <input type="text" name="age"><br>
    Address: <input type="text" name="address"><br><br>
    <input type="submit" value="Submit">
</form>
 
 
<?php
$result = [];
if (isset($_GET["name"]) && isset($_GET["phone"]) &&
    isset($_GET["age"]) && isset($_GET["address"])) {
 
    $name = htmlspecialchars($_GET["name"]);
    $phone = htmlspecialchars($_GET["phone"]);
    $age = htmlspecialchars($_GET["age"]);
    $address = htmlspecialchars($_GET["address"]);
    if (!array_key_exists('Name', $result)) {
        $result['Name'] = $name;
    }
    if (!array_key_exists('Phone number', $result)) {
        $result['Phone number'] = $phone;
    }
    if (!array_key_exists('Age', $result)) {
        $result['Age'] = $age;
    }
    if (!array_key_exists('Address', $result)) {
        $result['Address'] = $address;
    }
 
 
    echo "<table border='2'>";
    foreach ($result as $key => $value) {
        echo "<tr><td style='background-color: orange'>$key</td><td>$value</td></tr>" . PHP_EOL;
    }
    echo "</table>";
}
?>