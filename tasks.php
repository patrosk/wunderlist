<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="completed">
    <h2>Your uncompleted tasks: </h2>
    <ul>
        <?php $tasks = uncompleted_tasks($database);
        foreach ($tasks as $task) : ?>
            <?php if ($_SESSION['user']['id']) : ?>
                <h4> <?= $task['title'] ?> </h4>
                <li>
                    <p> List: <?= $task['list_title'] ?> <br>
                        Deadline: <?= $task['deadline_at'] ?> <br>
                        Description: <?= $task['content'] ?> <br>

                    </p>
                </li>
                <h6>Do you want to update your task?</h6>
                <button>
                    <a href="/edit_task.php?id=<?= $task['id']; ?>">Update</a>
                </button>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>

<h2>Your completed tasks: </h2>
<ul>
    <?php $tasks = completed_tasks($database);
    foreach ($tasks as $task) : ?>
        <?php if ($_SESSION['user']['id']) : ?>
            <h4> <?= $task['title'] ?> </h4>
            <li>
                <p>
                    Deadline: <?= $task['deadline_at'] ?> <br>
                    Description: <?= $task['content'] ?> <br></p>
            </li>
        <?php endif ?>
    <?php endforeach ?>
</ul>
<?php require __DIR__ . '/views/footer.php'; ?>
