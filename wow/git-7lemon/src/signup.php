<?php
session_start();
include('common/init.php');

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])){
    if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['name'] != ""){
        $username = addslashes(trim($_POST['username']));
        $name = addslashes(trim($_POST['name']));
        $password = sha1($_POST['password']);
        $email = addslashes(trim($_POST['email']));
        
        $query = 'select * from users '
                ."where username = '".$username."' "
                ."and email = '".$email."'";
        $result = $db->query($query);
        if ($result->num_rows > 0){
            header("location:index.php?check=exist");
        }
        else
            echo '访问数据库时出错，代码001';
            
        $query = "insert into users (username, name, password, email, user_power) values 
                ('".$username."', '".$name."','".$password."', '".$email."', 2000)";
        $result = $db->query($query);
        if ($result){
            $query = 'select * from users '
             ."where username = '".$username."' "
             ."and password = '".$password."'";
            $result = $db->query($query);
            if ($result)
            {
                $row = $result->fetch_assoc();
                $row['username'] = stripslashes($row['username']);
                $row['name'] = stripslashes($row['name']);
                $row['email'] = stripslashes($row['email']);
                $_SESSION['user'] = $row;
                $login_error = FALSE;
            }

            $db->close;
            header("location:index.php");
        }
        else
            echo '访问数据库时出错，代码002';
    }
    else
        header("location:index.php?check=blank");
}
else
    header("location:index.php");

?>
