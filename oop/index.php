<?php
include 'ColorClassifier.php';

// Initialize color classifier
$colorClassifier = new colorClassifier();

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["color_query"])) {
    $result = $colorClassifier->classifyColor($_POST["color_query"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Classifier</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"> </script>

</head>
<body>
    <div class="container">
        <h2>Modern Color Theory Classifier</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="color_query">Enter a color:</label><br>
      <input type="text" id="color_query" name="color_query"><br><br>
      <button type="submit" onclick="checkInput()">Classify</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["color_query"])) {
            // Output the classification result
            echo "<div class='result'>";
            $result = $colorClassifier->classifyColor($_POST["color_query"]);
            echo "<hr>Color query: " . $result['color_query'] . "<br>";
            echo "Highest Category: " . $result['highest_category'] . " with Score: " . $result['highest_score'];
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>