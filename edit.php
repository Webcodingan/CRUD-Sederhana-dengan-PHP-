<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tnggl_lahir = $_POST['tnggl_lahir'];
    $kelas = $_POST['kelas'];
    $kejuruan = $_POST['kejuruan'];
    $nilai = $_POST['nilai'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE siswa SET nama='$nama',tempat_lahir='$tempat_lahir',tnggl_lahir='$tnggl_lahir',kelas='$kelas',kejuruan='$kejuruan',nilai='$nilai' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $tempat_lahir = $user_data['tempat_lahir'];
    $tnggl_lahir = $user_data['tnggl_lahir'];
    $kelas = $user_data['kelas'];
    $kejuruan = $user_data['kejuruan'];
    $nilai = $user_data['nilai'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempat_lahir" value=<?php echo $tempat_lahir; ?>></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="text" name="tnggl_lahir" value=<?php echo $tnggl_lahir; ?>></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" value=<?php echo $kelas; ?>></td>
            </tr>
            <tr>
                <td>Kejuruan</td>
                <td><input type="text" name="kejuruan" value=<?php echo $kejuruan; ?>></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="text" name="nilai" value=<?php echo $nilai; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>