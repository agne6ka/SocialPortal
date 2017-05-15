<?php

require_once 'Users.php';

class Messages
{
    private $id;
    private $user_id;
    private $from_user;
    private $message;
    private $msg_date;

    public function __construct()
    {
        $this->id = -1;
        $this->user_id = '';
        $this->message = '';
        $this->from_user = '';
        $this->msg_date = '';
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getFromUser()
    {
        return $this->from_user;
    }

    /**
     * @return string
     */
    public function getMsgDate()
    {
        return $this->msg_date;
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
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param string $from_user
     */
    public function setFromUser($from_user)
    {
        $this->from_user = $from_user;
    }

    public function setMsgDate()
    {
        $this->msg_date = date('Y-m-d');;
    }

    /** Methods **/

    public function createMessage(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO Messages(user_id, message, from_user, msg_date)VALUES ('$this->user_id','$this->message','$this->from_user','$this->msg_date')";

            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Messages SET user_id='$this->user_id', message='$this->message', form_user='$this->from_user', msg_date='$this->msg_date'WHERE id=$this->id";
            $result = $conn->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadMessageByUserId(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM Messages WHERE id=$id";
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedMsg = new Messages();
            $loadedMsg->id = $row['id'];
            $loadedMsg->user_id = $row['user_id'];
            $loadedMsg->message = $row['message'];
            $loadedMsg->form_user = $row['form_user'];
            $loadedMsg->msg_date = $row['msg_date'];
            return $loadedMsg;
        }
        return null;
    }

    static public function loadAllMessages(mysqli $connection)
    {
        $sql = "SELECT * FROM Messages";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedMsg = new Messages();
                $loadedMsg->id = $row['id'];
                $loadedMsg->user_id = $row['user_id'];
                $loadedMsg->message = $row['message'];
                $loadedMsg->form_user = $row['form_user'];
                $loadedMsg->msg_date = $row['msg_date'];
                $ret[] = $loadedMsg;
            }
        }
        return $ret;
    }

    public function delete(mysqli $conn)
    {
        if ($this->id != -1) {
            $sql = "DELETE FROM Messages WHERE id=$this->id";
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