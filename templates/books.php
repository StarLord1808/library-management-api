<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Thiru1808@";
$dbname = "library-system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch books from database
$sql = "SELECT A.BOOKID ID, A.NAME TITLE, B.NAME AUTHOR, YEAR(A.ADDED_ON) FROM BOOK A INNER JOIN (SELECT NAME,AUTHORID FROM AUTHOR)B ON B.AUTHORID = A.AUTHORID";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management - Books</title>
</head>
<body>
    <h1>Books List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Published Year</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["author"] . "</td>
                        <td>" . $row["published_year"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>