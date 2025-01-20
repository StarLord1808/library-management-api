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

// Fetch book counts from database
$totalBooksSql = "SELECT COUNT(*) AS total FROM book";
$totalBooksResult = $conn->query($totalBooksSql);
$totalBooks = $totalBooksResult->fetch_assoc()['total'];

$availableBooksSql = "SELECT COUNT(*) AS available FROM book WHERE status = 'ENABLE'";
$availableBooksResult = $conn->query($availableBooksSql);
$availableBooks = $availableBooksResult->fetch_assoc()['available'];

$returnedBooksSql = "SELECT COUNT(*) AS returned FROM issued_book WHERE status = 'RETURNED'";
$returnedBooksResult = $conn->query($returnedBooksSql);
$returnedBooks = $returnedBooksResult->fetch_assoc()['returned'];

$issuedBooksSql = "SELECT COUNT(*) AS issued FROM issued_book WHERE status = 'ISSUED'";
$issuedBooksResult = $conn->query($issuedBooksSql);
$issuedBooks = $issuedBooksResult->fetch_assoc()['issued'];

$conn->close();
?>
