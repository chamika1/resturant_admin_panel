<?php
header('Content-Type: application/json');

$file_path = 'users.json';
$users = json_decode(file_get_contents($file_path), true);

$response = ['success' => false, 'message' => 'Invalid request.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add' || $action === 'edit') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            
            if ($action === 'add') {
                $new_user = [
                    'id' => count($users) > 0 ? max(array_column($users, 'id')) + 1 : 1,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'orders' => 0
                ];
                $users[] = $new_user;
                $response = ['success' => true, 'message' => 'User added successfully.'];
            } else { // Edit
                $id = $_POST['id'] ?? null;
                if ($id) {
                    foreach ($users as &$user) {
                        if ($user['id'] == $id) {
                            $user['name'] = $name;
                            $user['email'] = $email;
                            $user['phone'] = $phone;
                            $response = ['success' => true, 'message' => 'User updated successfully.'];
                            break;
                        }
                    }
                }
            }
        } elseif ($action === 'delete') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $users = array_values(array_filter($users, function($user) use ($id) {
                    return $user['id'] != $id;
                }));
                $response = ['success' => true, 'message' => 'User deleted successfully.'];
            }
        }
    }
}

file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));
echo json_encode($response);
?>
