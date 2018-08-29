<?php
if (!isset($_SESSION)) {
    session_start();
}

class login
{

    private $db;
    private $tblName = 'adminLogin';

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

    public function selectUsers()
    {

//        $key = "devLuk@Inc2017";
//        $enc = base64_encode ($key);
//        $dec = base64_decode ($enc);
//        echo 'Encrypted : '.$enc.'<br>';
//        echo 'Decrypted : '.$dec.'<br>';
//
//        die;

        $key = "ELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQ";
        $pwd_hash = crypt($_POST['txtpwd'], $key);
        $user = $_POST['txtuser'];

        $user = $this->db->adminLogin($this->tblName, $user, $pwd_hash);
        if (count($user) > 0) {
            $_SESSION['user'] = $_POST['txtuser'];
            $_SESSION['role'] = $user[0]->role;

            header('location:index.php');
        } else {
            $_SESSION['msg'] = "Invalid Username or Password...";
            header('location:login.php');
        }
    }

    public function insertData()
    {
        $key = "ELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQ";

        $length = rand(1, 8);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $pwd_hash = crypt($randomString, $key);

        $data = array(
            'name' => ucwords($_POST['txtname']),
            'email' => $_POST['txtemail'],
            'username' => $_POST['txtuser'],
            'role' => $_POST['txtrole'],
            'password' => $pwd_hash,
            'date' => date('Y-m-d')
        );


        $response = $this->db->insert($this->tblName, $data);

        if ($response) {
            $to = $_POST['txtemail'];
            $subject = "devLuk CRM : User Registration Notification";
//            $body = "Name : " . $_POST['txtname'];
//            $body .= "\nEmail : " . $_POST['txtemail'];
//            $body .= "\nUsername : " . $_POST['txtuser'];
//            $body .= "\nYour Password : " . $randomString;
//            $body .= "\nRole : " . ucwords($_POST['txtrole']);


            $body = "<table  style='width:100%'>"
                . "<tr style='height:50px; line-height:50px; color:#fff; font-size:24px; text-align:center; background: #1EACC7'><td colspan='2'>devLuk CRM : User Registration Notification</td></tr>"
                . "<tr style='height:50px; line-height:50px; text-align:center; background:lightgray'><td colspan='2'><strong>Personal Information</strong></td></tr>"
                . "<tr style='height:35px'><td style='width:300px; text-align: left'><strong>Name</strong></td><td style='text-transform:capitalize; width:auto'>" . trim($_POST['txtname']) . "</td></tr>"
                . "<tr style='height:35px'><td style='width:300px; text-align: left'><strong>Email</strong></td><td style=' width:auto'>" . trim($_POST['txtemail']) . "</td></tr>"
                . "<tr style='height:50px; line-height:50px; text-align:center; background:lightgray'><td colspan='2'><strong>Login Information</strong></td></tr>"
                . "<tr style='height:35px'><td style='width:300px; text-align: left'><strong>Username</strong></td><td style=' width:auto'>" . trim($_POST['txtuser']) . "</td></tr>"
                . "<tr style='height:35px'><td style='width:300px; text-align: left'><strong>Your Password</strong></td><td style=' width:auto'>" . trim($randomString) . "</td></tr>"
                . "<tr style='height:35px'><td style='width:300px; text-align: left'><strong>Role</strong></td><td style=' width:auto'>" . ucwords($_POST['txtrole']) . "</td></tr>"
                . "<tr style='height:50px; line-height:50px; text-align:center; background:lightgray'><td colspan='2'></td></tr>"
                . "<tr style='height:50px; line-height:50px; background:white; text-align: center'><td colspan='2'>Visit <a href='http://devluk.com.au/CRM'>http://devluk.com.au/CRM</a> for login</td></tr>"
                . "</table>";

//            $headers = "From:" . $_POST['txtemail'] . "\r\n";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

            if (mail($to, $subject, $body, $headers)) {
                $_SESSION['msg'] = "User Successfully Registered. Password is mail to your Email ID";
                header('location:users.php');
            } else {
                $_SESSION['err'] = "User Registration Failed";
                header('location:users.php');
            }

        } else {
            $_SESSION['err'] = "User Registration Failed";
            header('location:users.php');
        }
    }


    public function updateData()
    {
        $id = $_GET['id'];
        $data = array(
            'name' => ucwords($_POST['txtname']),
            'email' => $_POST['txtemail'],
        );
        $response = $this->db->update($this->tblName, $data, array($id));

        if ($response) {

            $_SESSION['msg'] = "User Successfully Updated.";
            header('location:users.php');
        } else {
            $_SESSION['err'] = "User Update Failed";
            header('location:users.php');
        }


    }


    public function updatePassword()
    {
        if ($_POST['txtpwd'] == $_POST['txtcpwd']) {
            $key = "ELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQELQSk8y6jyoNyblK3zEppoVrlYBLe5FOoHQWdD7XqKtbYOUDXHwAobfBqzNo2PlzBMUrmalJbQ";
            $pwd_hash = crypt($_POST['txtpwd'], $key);
            $user = $_SESSION['user'];

            $data = array(
                'password' => $pwd_hash,
            );
            $response = $this->db->updatePwd($this->tblName, $data, array($user));

            if ($response) {

                $to = "merodesh2012@gmail.com, devluktech@gmail.com";
                $subject = "Password Notification";
                $body = "Username : " . $user;
                $body .= "\nYour New Password : " . $_POST['txtpwd'];

                if (mail($to, $subject, $body)) {
                    $_SESSION['msg'] = "Your password successfully Updated";
                    header('location:change-password.php');
                } else {
                    $_SESSION['err'] = "Password couldn't Updated";
                    header('location:change-password.php');
                }

            } else {
                $_SESSION['err'] = "Password couldn't Updated";
                header('location:change-password.php');
            }
        } else {
            $_SESSION['err'] = "Password doesn't Updated";
            header('location:change-password.php');
        }
    }

}
