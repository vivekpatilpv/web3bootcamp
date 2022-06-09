<form method="post">
    Enter a String: <input type="text" name="str" /><br>
    <button type="submit">Check</button>
</form>
<?php
if ($_POST) {
    //get the value from form  
    $str = $_POST['str'];

    $uppercase = strtoupper($str);
    $lowercase = strtolower($str);
    $fupper = ucfirst($str);
    $fwupper = ucwords($str);

    echo "The uppercase of given string " . $str . " : " . $uppercase;
    echo "<br>";
    echo "The lowercase of given string " . $str . " : " . $lowercase;
    echo "<br>";
    echo "The first character of string " . $str . " is uppercase : " . $fupper;
    echo "<br>";
    echo "The first character of all words of string " . $str . " is uppercase : " . $fwupper;
}
?>