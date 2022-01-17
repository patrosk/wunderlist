<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php
$task_id = $_GET['id'];
$tasks = get_tasks($database);
$user_id = $_SESSION['user']['id'];
?>



<!-- here you can update your task -->
<?php foreach ($tasks as $task) :
    if ($task_id == $task['id']) : ?>
        <h4> <?= $task['title']; ?> </h4>
        <p>Deadline at: <?= $task['deadline_at']; ?> </p>
        <form action="app/task/update.php?id=<?= $task_id ?>" method="post">
            <label for="title">Add a new title: </label>
            <input type="text" name="title" id="title" required> <br>
            <label for="content">Update the description: </label>
            <input type="text" name="content" id="content" required> <br>
            <label for="deadline">Update the deadline: </label>
            <input type="date" name="deadline" id="deadline" required> <br>
            <button type="submit">Update task!</button>
        </form>
        <!-- here you can mark task as completed and uncompleted -->
        <form action="app/task/status.php" method="post">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
            <label for="checkbox">completed</label>
            <input type="checkbox" name="checkbox" id="checkbox">
            <button type="submit">Submit</button>
        </form>

        <form action="app/task/status.php" method="post">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
            <label for="checkbox-uncompleted">not completed</label>
            <input type="checkbox" name="checkbox" id="checkbox-uncompleted">
            <button type="submit">Submit</button>
        </form>

        <!-- here you can delete a task -->
        <button>
            <a href="/app/task/delete.php?id= <?= $task['id']; ?>">
        </button>
    <?php endif ?>
<?php endforeach ?>
