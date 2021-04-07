<?php

use OrderDesk\App\Integration\ShopifyClient;
use OrderDesk\App\Integration\WooCommerceClient;


$shopifyAPI = new ShopifyClient('https://606d0dd2603ded0017502ede.mockapi.io');
$orders = $shopifyAPI->get_number_of_orders();
$shipments = $shopifyAPI->getShipments(1);

$wooCoomerceAPI = new WooCommerceClient('https://606d0dd2603ded0017502ede.mockapi.io');
$wooOrders = $wooCoomerceAPI->get_number_of_orders();
$wooShipments = $wooCoomerceAPI->getShipments(1);

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 10%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<?php
echo "<h2>".$shopifyAPI->getName()."</h2>";
echo 'You have: ' .$orders . ' orders. <br>';
echo 'Your shipments: <br>';
?>
<table>
  <tr>
    <th>Tracking Numbers</th>
  </tr>
  <tr>
  <?php
    foreach($shipments as $tracking_number){
        echo '<tr><td>'.$tracking_number.'</td></tr>';
    }
  ?>
  </tr>
</table>
<?php
echo '<br>';

echo "<h2>".$wooCoomerceAPI->getName()."</h2>";
echo 'You have: ' .$wooOrders . ' orders. <br>';
echo 'Your shipments: <br>';

?>
<table>
  <tr>
    <th>Tracking Numbers</th>
  </tr>
  <tr>
  <?php
    foreach($wooShipments as $tracking_number){
        echo '<tr><td>'.$tracking_number.'</td></tr>';
    }
  ?>
  </tr>
</table>

</body>
</html>