<?php

require_once 'Users.php';

class Posts
{
    private $id;
    private $user_id;
    private $post_tittle;
    private $post_text;
    private $post_date;

    public function __construct()
    {
        $this->id = -1;
        $this->user_id = '';
        $this->post_tittle = '';
        $this->post_text = '';
        $this->post_date = '';
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getPostTittle()
    {
        return $this->post_tittle;
    }

    /**
     * @return string
     */
    public function getPostText()
    {
        return $this->post_text;
    }

    /**
     * @return string
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /** Setters **/

    /**
     * @param string $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param string $post_tittle
     */
    public function setPostTittle($post_tittle)
    {
        $this->post_tittle = $post_tittle;
    }

    /**
     * @param string $post_text
     */
    public function setPostText($post_text)
    {
        $this->post_text = $post_text;
    }

    public function setPostDate()
    {
        $this->post_date = date('Y-m-d');
    }

    /** Methods **/

    public function createPost(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO Posts(user_id, post_tittle, post_text, post_date)VALUES ('$this->user_id','$this->post_tittle','$this->post_text','$this->post_date')";

            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Posts SET user_id='$this->user_id', post_tittle='$this->post_tittle', post_text='$this->post_text', post_date='$this->post_date'WHERE id=$this->id";
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
            $loadedPost->post_tittle = $row['post_tittle'];
            $loadedPost->post_text = $row['post_text'];
            $loadedPost->post_date = $row['post_date'];
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
                $loadedPost->post_tittle = $row['post_tittle'];
                $loadedPost->post_text = $row['post_text'];
                $loadedPost->post_date = $row['post_date'];
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