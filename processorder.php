<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width device-width, initial-scale 1.0">
        <meta http-equiv="X-UA-Compatible"content="ie edge">
        <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
<?php
echo "<p>Order processed at ".date('H:i,jS F Y') . "</p>";
//create short variable names
$find = "a";
$find = "b";
$find = "c";
$find = "d";
?>
<?php
    if ($find == "a"){
        echo "<p> Regular customer.</p>";
    } elseif ($find == "b") {
        echo "<p>Customer referred by TV advert.</p>";
    } elseif ($find == "c") {
        echo "<p>Customer reffered by phone directory.</p>";
    } elseif ($find == "d") {
        echo "<p>Customer reffered by word of mouth.</p>";
    } else {
        echo "<p>We do not know how this customer found us.</p>";
    }
//create short variable names
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    ?>
    <form action="processorder.php" method="post">
    <table style="border: 0px;">
     <tr style="background: #cccccc;">
        <td style="width: 150px; text-align: center;">Item</td>
        <td style="width: 15px; text-align: center;">Quantity</td>
        <td style="width: 15px; text-align: center;">Price</td>
        </tr>
        <tr>
        <td>Tires</td>
        <td><?php echo  $_POST['tireqty'];?></td>
        <td>$100</td>
        </tr>
        <tr>
        <td>Oil</td>
        <td><?php echo  $_POST['oilqty'];?></td>
        <td>$10</td>
        </tr>
        <tr>
            <td>Spark Plugs</td>
            <td><?php echo  $_POST['sparkqty'];?></td>
            <td>$4</td>
        </tr>
        </table>

<?php
    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    echo "<p>Items ordered: ".$totalqty."<br />";
    $totalamount = 0.00;

    define('TIREPRICE' , 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    $totalamount = $tireqty * TIREPRICE
                 + $oilqty * OILPRICE
                 + $sparkqty * SPARKPRICE;
        echo "Subtotal: $" .number_format ($totalamount,2)."<br />";
    $taxrate = 0.10; //local sales tax is 10%
        echo "Total including tax: $".number_format($totalamount,2)."</p>";
    $totalamount = $totalamount * (1 + $taxrate);
        echo "Total amount: $".number_format($totalamount,2)."</p>";
    $discount = $totalamount * .10;
    $dis = $totalamount - $discount;
        echo "Discount 10%: $".number_format($discount,2)."<br / >";

    ?>

</body>
</html>