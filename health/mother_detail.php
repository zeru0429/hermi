<?php
include("./parts/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mother Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }
        
        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            margin-top: -100px;
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
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Mother Profile</h1>

        <?php
        $m_id = $_GET['id'];

        $query = "SELECT * FROM mother_table WHERE m_id = $m_id";
        $result = mysqli_query($conn, $query) or die(mysqli_error());

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            $f_name = $row['f_name'];
            $m_name = $row['m_name'];
            $l_name = $row['l_name'];
            $birthdate = $row['bithdate'];
            $photo_url = $row['photo_url'];
            $blood_type = $row['blood_type'];
            $m_phone = $row['m_phone'];
            $zone = $row['zone'];
            $wereda = $row['wereda'];
            $kebele = $row['kebele'];
            ?>

            <div>
                <?php if (!empty($photo_url)) { ?>
                    <img class="profile-image" src="../images/mother/<?php echo $photo_url; ?>" alt="Profile Image">
                <?php } ?>
            </div>

            <div class="profile-table">
                <table>
                    <tr>
                        <td><strong>First Name:</strong></td>
                        <td><?php echo $f_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Middle Name:</strong></td>
                        <td><?php echo $m_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Last Name:</strong></td>
                        <td><?php echo $l_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birthdate:</strong></td>
                        <td><?php echo $birthdate; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Blood Type:</strong></td>
                        <td><?php echo $blood_type; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number:</strong></td>
                        <td><?php echo $m_phone; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Zone:</strong></td>
                        <td><?php echo $zone; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Wereda:</strong></td>
                        <td><?php echo $wereda; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Kebele:</strong></td>
                        <td><?php echo $kebele; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div>
                <a href="child_list.php?m_id=<?php echo $m_id; ?>" class="btn-primary">Child List</a>
                <button onclick="showPopup()" class="btn-primary">Vaccination Information</button>
            </div>
        </div>

        <div class="overlay" id="overlay"></div>

        <div class="popup" id="popup">
            <h2>Vaccination Information</h2>
            <form method="POST" action="">
                <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
                <label for="tt1">TT1:</label>
                <input type="number" name="tt1" id="tt1">
                <br>
                <label for="tt2">TT2:</label>
                <input type="number" name="tt2" id="tt2">
                <br>
                <label for="tt3">TT3:</label>
                <input type="number" name="tt3" id="tt3">
                <br>
                <label for="tt4">TT4:</label>
                <input type="number" name="tt4" id="tt4">
                <br>
                <label for="tt5">TT5:</label>
                <input type="number" name="tt5" id="tt5">
                <br>
                <label for="rh">RH:</label>
                <input type="number" name="rh" id="rh">
                <br>
                <input type="submit" value="Save">
                <button onclick="hidePopup()" type="button">Cancel</button>
            </form>
        </div>

        <script>
            function showPopup() {
                document.getElementById("overlay").style.display = "block";
                document.getElementById("popup").style.display = "block";
            }

            function hidePopup() {
                document.getElementById("overlay").style.display = "none";
                document.getElementById("popup").style.display = "none";
            }
        </script>

        <?php include('./parts/footer.php'); ?>
    </body>
    </html>
