<?php

require "vendor/autoload.php";

session_start();

// 4.

use App\QuestionManager;

$score = null;
try {
    $manager = new QuestionManager;
    $manager->initialize();

    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }
    $score = $manager->computeScore($_SESSION['answers']);
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
</head>
<style>
    body{
            text-align: left;
            font-family: arial;
    }
    
    h1{
        font-size: 70px;
    }

    .unbold{
        font-weight:normal;
    }

</style>
<body style="background-color:#1CFFE0">

<h1>Thank You</h1>

<h3>
    Congratulations <?php echo $_SESSION['user_fullname']; echo $_SESSION['user_email']; ?>!</h3>
    <h3 class="unbold">Score: <?php echo "<h3 style='color:blue'>$score</h3>"?></h3>
    <h3 class="unbold"> out of <?php echo $manager->getQuestionSize() ;?>&nbsp;items</h3>
    <h3 class="unbold"> Your answers</h3>

</body>
</html>
<?php 
correctIncorrect();
?>
<!-- DEBUG MODE -->
<pre>
<?php
var_dump($_SESSION);
?>
</pre>