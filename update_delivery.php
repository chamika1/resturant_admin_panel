<?php
$deliveryFile = 'delivery.json';
$deliveryData = json_decode(file_get_contents($deliveryFile), true);

$personId = $_POST['id'] ?? null;
$personName = $_POST['name'] ?? '';
$personPhone = $_POST['phone'] ?? '';
$personVehicle = $_POST['vehicle'] ?? '';
$personStatus = $_POST['status'] ?? '';

if ($personId) {
    foreach ($deliveryData as &$person) {
        if ($person['id'] == $personId) {
            if (isset($_POST['name'])) $person['name'] = $personName;
            if (isset($_POST['phone'])) $person['phone'] = $personPhone;
            if (isset($_POST['vehicle'])) $person['vehicle'] = $personVehicle;
            if (isset($_POST['status'])) $person['status'] = $personStatus;
            break;
        }
    }
} else {
    $newPerson = [
        'id' => time(),
        'name' => $personName,
        'phone' => $personPhone,
        'vehicle' => $personVehicle,
        'status' => 'available'
    ];
    $deliveryData[] = $newPerson;
}

file_put_contents($deliveryFile, json_encode($deliveryData, JSON_PRETTY_PRINT));

echo json_encode(['success' => true]);
?>
