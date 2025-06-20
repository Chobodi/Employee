<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "form2";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id']; // Retrieve the ID from the URL parameter

$sql = mysqli_query($conn, "SELECT * FROM registration WHERE id=$id");
$row = mysqli_fetch_assoc($sql); // Fetch the single row

if ($row) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
</head>
<body>
    <h1>Update Form</h1>
    <form action="updatequery.php?id=$id" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" cols="30" required><?php echo $row['message']; ?></textarea><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php 
} else {
    echo "No record found with the specified ID.";
}

mysqli_close($conn);
?>
