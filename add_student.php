<?php
include 'header.php';
include 'functions.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skillsInput = $_POST['skills'];

        if (empty($name) || !validateEmail($email)) {
            throw new Exception("Invalid name or email");
        }

        $skillsArray = cleanSkills($skillsInput);
        saveStudent($name, $email, $skillsArray);

        $message = "Student added successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h2>Add Student</h2>
<p><?php echo $message; ?></p>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter Email" required>
    <textarea name="skills" placeholder="Comma separated skills" required></textarea>
    <button type="submit">Save Student</button>
</form>

<?php include 'footer.php'; ?>
