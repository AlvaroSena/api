<?php

namespace Professor\AulaN\Controller;

class UserController
{
    private $users = [];

    function getUsers()
    {
        return $this->users;
    }

    function insertUser($data)
    {
        $user = [
            'nome' => $data['nome'],
            'idade' => $data['idade'],
        ];

        array_push($this->users, $user);

        return $user;


    }
    function updateUser($data, $id) {}
    function deletetUser($id) {}
}
