<?php include("./parts/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #121212;
            color: #fff;
        }
        
        .profile-container {
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: left;
        }
        
        .profile-image {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        
        .profile-table {
            margin-top: 20px;
        }
        
        .profile-table td {
            padding: 10px;
        }
        
        .btn-primary {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background-color: #4267B2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #3b5998;
        }
        
        .btn-secondary {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #000;
            background-color: #e4e6eb;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #dfe3e8;
        }
        
        .success {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profile</h1>

        <?php 
            if(isset($_SESSION['add'])){
                echo "<h2 class='success'>" . $_SESSION['add'] . "</h2>";
                unset($_SESSION['add']);
            }
            $username = $_GET['username'];
        ?>

        <div>
            <a href="index.php" class="btn-primary">Back to dashboard</a>
        </div>
        
        <div class="profile-table">
            <table>
                <?php
                    $query = "SELECT * FROM cbtp.users WHERE username='$username'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error());

                    if($result == TRUE){
                        $rows = mysqli_num_rows($result);
                        if($rows > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                $id = $rows['user_id'];
                                $username = $rows['username'];
                                $role = $rows['role'];
                                $f_name = $rows['f_name'];
                                $m_name = $rows['m_name'];
                                $l_name = $rows['l_name'];
                                $phone_number = $rows['phone_number'];
                                $email = $rows['email'];
                                $image_url = $rows['image_url'];
                            ?>
                                <tr>
                                    <td>
                                        <img class="profile-image" src="./../images/users/<?php echo $image_url ?>" alt="Profile Image">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Username:</strong> <?php echo $username ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Role:</strong> <?php echo $role ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>First Name:</strong> <?php echo $f_name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Middle Name:</strong> <?php echo $m_name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Last Name:</strong> <?php echo $l_name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Phone Number:</strong> <?php echo $phone_number ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Email:</strong> <?php echo $email ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="change_password.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
                                    </td>
                                </tr>
                <?php 
                            }
                        }
                        else {
                            // No data available in the database
                        }
                    }
                ?>
            </table>
        </div>
    </div>
 <div class="clear-fixt"></div>
    </div>

    <?php include('./parts/footer.php');?>