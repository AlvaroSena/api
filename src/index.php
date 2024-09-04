<?php

    namespace Professor\AulaN;
    use Professor\AulaN\Controller\UserController;

    require_once '../vendor/autoload.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];


    switch($method) {
        case "GET":
            switch ($uri) {
                case '/users':
                    $users = new UserController();
                    $response = $users->getUsers();

                    if ($response) {
    
                        http_response_code(200);
                        echo json_encode(
                            [
                                'status' => true,
                                'message' => 'success!',
                                'users' => $response,
                            ]
                        );    
                        break;

                    } else {
                        http_response_code(204);
                        echo json_encode(
                            [
                                'status' => true,
                                'message' => 'success!',
                                'users' => [],
                            ]
                        );    
                        break;
                    }
            }
        case "POST":
            switch ($uri) {
                case '/users':
                    // $users = new UserController();
                    // $response = $users->insertUser();

                    $input = json_decode(file_get_contents('php://input'), true);

                    $users = new UserController();
                    $response = $users->insertUser($input);

                    if ($response) {

                        // var_dump($input);
                        http_response_code(201);    
                        echo json_encode(
                            [
                                'status' => 'User created!',
                                'user' => $response
                            ]
                        );
                        break;
                    } else {
                        http_response_code(204);    
                        echo json_encode(
                            [
                                'status' => 'User created!',
                                'user' => []
                            ]
                        );
                        break;
                    }

            }
        case "PUT":
            if ( preg_match('/\/users\/(\d+)/', $uri, $matches)) {
                $id = $matches[1];
                $input = json_decode(file_get_contents('php://input'), true);
                $users[$id] = $input;
                http_response_code(200);
                echo json_encode(
                    [
                        'status' => true,
                        'message' => 'User updated',
                        'users' => $input
                    ]
                );
                break;
            }
            
        case "DELETE":
            if ( preg_match('/\/users\/(\d+)/', $uri, $matches)) {

                $id = $matches[1];
                unset($users[$id]);
                http_response_code(204);
                echo json_encode(
                    [
                        'status' => true,
                        'message' => 'User deleted'
                    ]
                );
                break;

            }
        default:
            http_response_code(200);
            echo json_encode(
                [
                    'status' => true,
                    'message' => 'success!'
                ]
            );    
    }