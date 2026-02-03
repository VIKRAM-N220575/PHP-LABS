<?php
echo "<h2>PART B - STRING FUNCTIONS</h2>";

$str = " welcome to cold coffee shop ";

echo "Original String: $str <br><br>";

/* Basic */
echo "The Length: ".strlen($str)."<br>";
echo "The Word Count: ".str_word_count($str)."<br>";
echo "Reverse: ".strrev($str)."<br><br>";

/* Case Conversion */
echo strtoupper($str)."<br>";
echo strtolower($str)."<br>";
echo ucfirst($str)."<br>";
echo ucwords($str)."<br><br>";

/* Search & Replace */
echo "Position of 'cold': ".strpos($str,"cold")."<br>";
echo str_replace("cold","hot",$str)."<br><br>";

/* Substring & Trimming */
echo substr($str,0,7)."<br>";
echo trim($str)."<br>";
echo ltrim($str)."<br>";
echo rtrim($str)."<br><br>";

/* String Comparison */
echo strcmp("Coffee","coffee")."<br>";
echo strcasecmp("Coffee","coffee")."<br><br>";

/* Special Characters */
echo htmlspecialchars("<h1>Coffee</h1>")."<br>";
echo addslashes("Cold's Coffee")."<br>";
echo stripslashes("Cold\'s Coffee")."<br>";
echo nl2br("Welcome to\nCold Coffee Shop")."<br>";
echo chop(" Cold Coffee ")."<br>";
echo "Repeat: ".str_repeat("Coffee ",3)."<br>";
echo "Shuffle: ".str_shuffle("ColdCoffee")."<br>";
echo "Similar Text: ";
similar_text("Cold Coffee","Cold Coffees",$percent);
echo "Percentage of similarity: $percent%<br>";
echo "Padding: '".str_pad("Coffee",15,"*")."'<br>";
echo "Split: ";
print_r(str_split("Coffee",2));
echo "<br>";
echo "Join: ".implode("-",array("Cold","Coffee","Shop"))."<br>";
echo "Chunk Split: ".chunk_split("ColdCoffee",3,"-")."<br>";
echo "Count Substring 'o': ".substr_count($str,"o")."<br>";
echo "Encoding: ".md5("ColdCoffee")."<br>";
echo "Base64 Encode: ".base64_encode("ColdCoffee")."<br>";
echo "Base64 Decode: ".base64_decode(base64_encode("ColdCoffee"))."<br>";
echo "Soundex: ".soundex("Coffee")."<br>";


if(isset($_POST['username'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $coffee = $_POST['coffee'];

    echo "<hr>";
    echo "<h3>User Input Data</h3>";

    echo "<b>Username:</b> $username <br>";
    echo "Length: ".strlen($username)."<br>";
    echo "Uppercase: ".strtoupper($username)."<br>";
    echo "Lowercase: ".strtolower($username)."<br>";
    echo "Ucfirst: ".ucfirst($username)."<br>";
    echo "Trimmed: ".trim($username)."<br><br>";

    echo "<b>Email:</b> $email <br>";
    echo "Word Count: ".str_word_count($email)."<br>";
    echo "Position of @: ".strpos($email,"@")."<br>";
    echo "Addslashes: ".addslashes($email)."<br><br>";

    echo "<b>City:</b> $city <br>";
    echo "Reverse: ".strrev($city)."<br>";
    echo "Ucwords: ".ucwords($city)."<br>";
    echo "Substring: ".substr($city,0,3)."<br><br>";

    echo "<b>Favorite Coffee:</b> $coffee <br>";
    echo "Replace a with @: ".str_replace("a","@",$coffee)."<br>";
    echo "Compare with Latte: ".strcmp($coffee,"Latte")."<br>";
    echo "Case-insensitive compare with latte: ".strcasecmp($coffee,"latte")."<br>";
    echo "HTML Special Chars: ".htmlspecialchars($coffee)."<br>";

}
else{
    echo "<br>No input received from form.";
}
?>
