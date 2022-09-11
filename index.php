<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM siswa ORDER BY id DESC");
?>

<html>

<head>
    <title>Homepage</title>
    
</head>

<body>
    <a href="add.php">Add New User</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Tempat lahir</th>
            <th>Tanggal lahir</th>
            <th>Kelas</th>
            <th>Kejuruan</th>
            <th>Nilai</th>
            <th>Action</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['id'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['tempat_lahir'] . "</td>";
            echo "<td>" . $user_data['tnggl_lahir'] . "</td>";
            echo "<td>" . $user_data['kelas'] . "</td>";
            echo "<td>" . $user_data['kejuruan'] . "</td>";
            echo "<td>" . $user_data['nilai'] . "</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>