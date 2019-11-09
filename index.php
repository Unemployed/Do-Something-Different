<?php
require 'vendor/autoload.php';
require 'database.php';

$db = new Database();
use Carbon\Carbon;

$task = $db->getTask(Carbon::now()->toDateString());
$showPost = true;
if (!$task) {
    $showPost = false;
    $task = [
        "task" => "(We don't know yet!)"
    ];
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Do something new.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="raster.css">
</head>

<body>
    <h1>Everyday</h1>
    <h1>I challenge you to do something new.</h1>
    <hr />
    <grid columns=4>
        <c></c>
        <c>
            <h1>Today...</h1>
        </c>
        <c>
            <h1><?= $task['task'] ?>.</h1>
        </c>
        <c></c>
    </grid>
    <hr />
    <?php if ($showPost) { ?>
    <h1><?= $task['num_completed'] . " People have done it." ?></h1>
    <h1>Have you?</h1>
    <form action="/done.php" method="POST">
        <button type="submit">I've done it!</button>
    </form>
    <?php }; ?>
</body>

</html>