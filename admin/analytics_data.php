<?php
include("../connection/connect.php");
// Most sold products
$salesData = [];
$salesQuery = "SELECT p.productname,SUM(bd.quantity) AS total_sold
FROM bill_details bd
JOIN product p ON bd.productid = p.productid
GROUP BY p.productid
ORDER BY total_sold DESC LIMIT 5;
";
$result = $db->query($salesQuery);
while ($row = $result->fetch_assoc()) {
    $salesData[] = $row;
}

// Stock of products
$stockData = [];
$stockQuery = "SELECT productname, stock FROM product ORDER BY stock ASC";
$result = $db->query($stockQuery);
while ($row = $result->fetch_assoc()) {
    $stockData[] = $row;
}


// Weekly revenue
$revenueData = [];
$revenueQuery = "SELECT 
    WEEK(datetime) AS week_number,
    SUM(grandtotal) AS weekly_revenue
FROM 
    bill
GROUP BY 
    WEEK(datetime)
ORDER BY 
    WEEK(datetime);
";
$result = $db->query($revenueQuery);
while ($row = $result->fetch_assoc()) {
    $revenueData[] = $row;
}

echo json_encode([
    "sales" => $salesData,
    "stock" => $stockData,
    "revenue" => $revenueData
]);

$db->close();
?>
