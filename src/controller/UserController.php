<?php

namespace Professor\AulaN\Controller;

class UserController
{
    function getUsers()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'John',
                'age' => 18,
            ],
            [
                'id' => 2,
                'name' => 'Mary',
                'age' => 17,
            ],
        ];

        return $users;
    }

    function insertUser($data)
    {
        $user = [
            'nome' => $data['nome'],
            'idade' => $data['idade'],
        ];

        return $user;


    }
    function updateUser($data, $id) {
        $users = [
            [
                'id' => 1,
                'name' => 'John',
                'age' => 18,
            ],
            [
                'id' => 2,
                'name' => 'Mary',
                'age' => 17,
            ],
        ];

        $updatedUser = [];

        foreach ($users as $user) {
            if ($user['id'] === $id) {
                $user['name'] = $data['name'];
                $user['age'] = $data['age'];
                $updatedUser = $user;
            }
        }

        return $updatedUser;
    }
    function deletetUser($id) {
        $users = [
            [
                'id' => 1,
                'name' => 'John',
                'age' => 18,
            ],
            [
                'id' => 2,
                'name' => 'Mary',
                'age' => 17,
            ],
        ];

        foreach ($users as $user) {
            if ($user['id'] === $id) {
                unset($users[$user]);
            }
        }

        return true;
    }
}
