<?php
header('Content-Type: application/json');

$orders_file = 'orders.json';
$orders = json_decode(file_get_contents($orders_file), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    foreach ($orders as &$order) {
        if ($order['id'] == $id) {
            $order['status'] = $status;
            break;
        }
    }

    file_put_contents($orders_file, json_encode($orders, JSON_PRETTY_PRINT));

    echo json_encode(['success' => true]);
}
?>
