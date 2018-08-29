<?php
if (!isset($_SESSION)) {
    session_start();
}

class colleges
{

    private $db;
    private $tblName = 'collegedetails';

    public function __construct()
    {
        $this->db = Database::instantiate();
    }

    public function selectData($id = null)
    {
        $id = (int)$id;

        if (empty($id)) {
            return $this->db->select($this->tblName);
        } else {
            $test = $this->db->selectData($this->tblName, '*', ' id =? ', array($id));
            if (count($test)) {
                return $test[0];
            } else {
                return false;
            }
        }
    }

    public function insert()
    {
        $id = mt_rand(101, 9999999);
        $data = array(
            'id' => $id,
            'date' => date('Y-m-d'),
            'name' => ucwords($_POST['txtname']),
        );

        $response = $this->db->insert($this->tblName, $data);
        if ($response) {
            $_SESSION['msg'] = "College Details Successfully Recorded...";
            header('location:colleges.php');
        } else {
            $_SESSION['err'] = "Failed to record..";
            header('location:colleges.php');
        }
    }

    public function update()
    {
        $id = (int)$_GET['cid'];
        $data = array(
            'name' => ucwords($_POST['txtname']),
        );
        $response = $this->db->update($this->tblName, $data, array($id));
        if ($response) {
            $_SESSION['msg'] = "College Details Successfully Updated...";
            header('location:colleges.php');
        } else {
            $_SESSION['err'] = "Failed to Updated..";
            header('location:colleges.php');
        }
    }


    public function delete()
    {
        $id = (int)$_GET['cid'];

        $response = $this->db->delete($this->tblName, 'id =?', array($id));
        if ($response) {
            $_SESSION['msg'] = "College Details Successfully Deleted...";
            header('location:colleges.php');
        } else {
            $_SESSION['msg'] = "Failed to Delete...";
            header('location:colleges.php');
        }
    }

}