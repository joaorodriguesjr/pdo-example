<?php

namespace Users;

class User
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @param array $data
     *
     * @return \Users\User
     */
    public static function create(array $data)
    {
        $user = new self();

        $user->name     = trim($data['name']);
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);

        return $user;
    }

    /**
     * @param string $id
     */
    public function defineID($id)
    {
        if (! empty($this->id))
            return;

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
