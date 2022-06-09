<form method="post">
    Enter a String: <input type="text" name="str" /><br>
    <button type="submit">Check</button>
</form>
<?php
if ($_POST) {
    //get the value from form  
    $str = $_POST['str'];
    //reversing the number  
    $reverse = strrev($str);

    //checking if the number and reverse is equal  
    if ($str == $reverse) {
        echo "The String $str is Palindrome";
    } else {
        echo "The String $str is not a Palindrome";
    }
}
?>