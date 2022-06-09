<html>
    <head>
        <title>
            Table of user input number
        </title>
        <body>
        <form action = "get">
        Enter The number:<input text = "text" name = "number">
        </form>
        <?php
        $num = $_GET["number"];
        for($i = 1; $i<=10; $i++)
        {
            $product = $i*$num;
            echo "$num * $i = $product";
            echo '<br>' ;
        }     
        ?>
        </body>
    </head>
</html>