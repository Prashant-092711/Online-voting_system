<?php
    session_start();
    include("connect.php");

    $mobile = $_POST['mobile'];
    $paasword = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$paasword' AND role = '$role' ");
    if(mysqli_num_rows($check)>0)
    {
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role = 2");
        $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupdata'] = $groupdata;

        echo '
        <script>
        window.location = "../routes/dashboard.php";
        </script>';
    }
    else{
        echo '
       <script>
       alert("User Not Found!!");
       window.location = "../";
       </script>';
    }

?>