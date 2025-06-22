<?php
header('Content-Type: application/json');

$file_path = 'menu.json';
$menu_items = json_decode(file_get_contents($file_path), true);

$response = ['success' => false, 'message' => 'Invalid request.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add' || $action === 'edit') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category = $_POST['category'] ?? '';
            $description = $_POST['description'] ?? '';
            $image = $_POST['image'] ?? 'https://i.ibb.co/gP3fPST/placeholder.png';

            if ($action === 'add') {
                $new_item = [
                    'id' => count($menu_items) > 0 ? max(array_column($menu_items, 'id')) + 1 : 1,
                    'name' => $name,
                    'price' => (float)$price,
                    'category' => $category,
                    'description' => $description,
                    'image' => $image
                ];
                $menu_items[] = $new_item;
                $response = ['success' => true, 'message' => 'Item added successfully.'];
            } else { // Edit
                $id = $_POST['id'] ?? null;
                if ($id) {
                    foreach ($menu_items as &$item) {
                        if ($item['id'] == $id) {
                            $item['name'] = $name;
                            $item['price'] = (float)$price;
                            $item['category'] = $category;
                            $item['description'] = $description;
                            $item['image'] = $image;
                            $response = ['success' => true, 'message' => 'Item updated successfully.'];
                            break;
                        }
                    }
                }
            }
        } elseif ($action === 'delete') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $menu_items = array_values(array_filter($menu_items, function($item) use ($id) {
                    return $item['id'] != $id;
                }));
                $response = ['success' => true, 'message' => 'Item deleted successfully.'];
            }
        }
    }
}

file_put_contents($file_path, json_encode($menu_items, JSON_PRETTY_PRINT));
echo json_encode($response);
?>
