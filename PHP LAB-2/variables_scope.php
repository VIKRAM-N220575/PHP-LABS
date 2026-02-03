<?php
echo "<h2>PART A - VARIABLES & VARIABLE SCOPE</h2>";

echo "<h3>Variables of different datatypes</h3>";

$string = "Cold Coffee";
$integer = 10;
$float = 25.5;
$boolean = true;
$array = array("Latte","Mocha","Cappuccino");

echo "<h3>Datatypes</h3>";
echo "String: $string <br>";
echo "Integer: $integer <br>";
echo "Float: $float <br>";
echo "Boolean: $boolean <br>";
echo "Array: ";
print_r($array);
echo "<br><br>";


function localScope(){
    $msg = "I am Local Variable";
    echo "Local Scope: $msg <br>";
}
localScope();

echo "globalScope:<br>";
$globalVar = "I am Global Variable";

function globalScope(){
    global $globalVar;
    echo "Global Scope: $globalVar <br>";
}
globalScope();

echo "staticScope:<br>";
function staticScope(){
    static $count = 0;
    $count++;
    echo "Static Count: $count <br>";
}

staticScope();
staticScope();
staticScope();

?>
