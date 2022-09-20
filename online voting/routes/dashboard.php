<?php
    session_start();
    if(!isset($_SESSION['userdata']))
    {
        header("location:../");
    }
    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red"> Not Voted</b>';
    }
    else{
        $status = '<b style ="color:green"> Voted</b>';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<style>
        #back{
            float: left;
        }
        #logout{
            float: right;
        }
        #profile{
            float: left;
            background-color: white;
            padding: 90px;
            margin: 20px;
            border-radius: 50px;
        }
        #img{
    width: 160px;
    border: 2px solid black;
    border-radius: 22px;
    padding: 0px;
    left: 133px;
    top: 250px; 
        }
        #group{
            float: right;
            background-color: white;
            padding: 130px;
            margin: 20px;
            border-radius: 50px;
            width: 480px;
        }
        #votebtn{
            padding: 12px;
            border-radius: 16px;
            background-color: cornflowerblue;
            color: black;
        }
        #gimg{
            float: right;
            right: 55px;
        }
        #green{
            color: green;
        }
        #red{
            color: red;
        }
        #vote{
            padding: 12px;
            border-radius: 16px;
            background-color: green;
            color: black;
        }

</style>
<div id="main">
<div id="headersection">
<a href="../"> <button  id="back"> Back</button></a>
    <a href="logout.php"> <button id="logout"> LogOut</button></a>
  <center>  <h1>Online Voting System</h1>  </center>
    </div>
    <hr>
    <div id="profile">
        <img id="img" src="../upload/<?php echo $userdata['photo'] ?>" height="80" weight="80" alt="" srcset=""><br><br><br><br><br>
        <b>Name:</b>   <?php echo $userdata['name'] ?><br><br>
        <b>Mobile:</b> <?php echo $userdata['mobile'] ?><br><br>
        <b>Address:</b><?php echo $userdata['address'] ?><br><br>
        <b>Status:</b> <?php echo $status ?><br><br>
    </div>
    <div id="group">
        <?php
            if($_SESSION['groupdata'])
            {
                for($i=0;$i<count($groupdata);$i++)
                {
                    ?>
                        <div>
                            <img id="gimg" src="../upload/<?php echo $groupdata[$i]['photo'] ?>" height="100" weight="100" alt="" srcset=""><br>
                            <b>Group Name: </b><?php echo $groupdata[$i]['name'] ?><br><br>
                            <b>Votes: </b><?php echo $groupdata[$i]['votes'] ?><br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value=" <?php echo $groupdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value=" <?php echo $groupdata[$i]['id'] ?>">
                                <?php 
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                        <input type="submit" name="votebtn" value="votes" id="votebtn">
                                        
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button disabled type="button" name="votebtn" value="votes" id="vote">voted</button>
                                        <?php
                                    }

                                ?>
                            </form>
                        </div>
                        <hr>
                    <?php
                }
            }
            else{

            }
        ?>
    </div>
    </div>
</body>
</html>