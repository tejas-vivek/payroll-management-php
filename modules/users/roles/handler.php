<?php 
    include("../../../db/config.php");
    include("../../../TableOperations.php");

    $tableOperations = new TableOperations($conn, 'roles');

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $conditions = [
                'role' => $_POST['role'],
            ];

            if($tableOperations->checkDuplicate($conditions, null, 'OR')){
                echo json_encode(['success' => false, 'message'=> 'Role already exists']);
                exit;
            }

            $data = [
                'role' => $_POST['role'],
            ];
            $result = $tableOperations->add($data);
            break;
        case 'update':
            $id = $_POST['id'];

            $conditions = [
                'role' => $_POST['role'],
            ];

            if($tableOperations->checkDuplicate($conditions, $id, 'OR')){
                echo json_encode(['success' => false, 'message'=> 'User already exists']);
                exit;
            }

            $data = [
                'role' => $_POST['role'],
            ];
            $result = $tableOperations->update($id, $data);
            break;
        case 'change_password':
            $id = $_POST['id'];
            $data = [
                'password' => md5($_POST['password']),
            ];
            $result = $tableOperations->update($id, $data);
            break;
        case 'delete':
            $id = $_POST['id'];
            $result = $tableOperations->delete($id);
            break;
        case 'get':
            $id = $_POST['id'] ?? null;
            $result = $tableOperations->get($id);
            echo json_encode($result -> fetch_all(MYSQLI_ASSOC));
            break;
        default:
            $result = false;
            break;

        }
        echo json_encode(['success' => $result === true]);
?>