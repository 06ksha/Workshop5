<?php
include 'header.php';
include 'functions.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $fileName = uploadPortfolioFile($_FILES['portfolio']);
        $message = "File uploaded successfully: $fileName";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h2>Upload Portfolio</h2>
<p><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="portfolio" required>
    <button type="submit">Upload</button>
</form>

<?php include 'footer.php'; ?>
