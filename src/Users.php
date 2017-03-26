<?php

class Users
{
    private $id;
    private $username;
    private $email;
    private $hashed_password;

    public function __construct()
    {
        $this->id = -1;
        $this->email = '';
        $this->username = '';
        $this->hashed_password = '';
    }

/** Getters **/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getHashedPassword()
    {
        return $this->hashed_password;
    }

/** Setters **/

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $hashed_password
     */
    public function setHashedPassword($hashed_password)
    {
        $options = [
            'cost' => 11
        ];
        $new_password = password_hash($hashed_password, PASSWORD_BCRYPT, $options);
        $this->hashed_password = $new_password;
    }

    public function saveToDB(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO Users(username, email, hashed_password)VALUES ('$this->username', '$this->email', '$this->hashed_password')";

            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        }
        return false;
    }
}