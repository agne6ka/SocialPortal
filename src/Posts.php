<?php

require_once 'Users.php';

class Posts
{
    private $id;
    private $user_id;
    private $message;

    public function __construct()
    {
        $this->id = -1;
        $this->user_id = '';
        $this->message = '';
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }


    /** Setters **/

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param string $user_id
     */
    public function setUserId($user_instance)
    {
        $this->user_id = $user_instance->getId();
    }

    /** Methods **/

    public function createPost(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO Posts(user_id, message)VALUES ('$this->user_id','$this->message')";

            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Posts SET user_id='$this->user_id', messages='$this->message'WHERE id=$this->id";
            $result = $conn->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadPostById(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM Posts WHERE id=$id";
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedPost = new Posts();
            $loadedPost->id = $row['id'];
            $loadedPost->user_id = $row['user_id'];
            $loadedPost->message = $row['message'];
            return $loadedPost;
        }
        return null;
    }

    static public function loadAllPosts(mysqli $connection)
    {
        $sql = "SELECT * FROM Posts";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedPost = new Posts();
                $loadedPost->id = $row['id'];
                $loadedPost->user_id = $row['user_id'];
                $loadedPost->message = $row['message'];
                $ret[] = $loadedPost;
            }
        }
        return $ret;
    }

    public function delete(mysqli $conn)
    {
        if ($this->id != -1) {
            $sql = "DELETE FROM Posts WHERE id=$this->id";
            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
}