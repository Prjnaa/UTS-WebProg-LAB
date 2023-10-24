<?php
session_start();

require_once('process/db.php');

$task_name = "";
$task_desc = "";
$priority = "";
$status = "";

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $query = "SELECT * FROM task_list WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $taskId, PDO::PARAM_INT);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    $task_name = $task['task_name'];
    $task_desc = $task['task_desc'];
    $priority = $task['priority'];
    $status = $task['status'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
</head>

<body>
    <h2><?php echo isset($_GET['id']) ? 'Edit Task' : 'Add New Task' ?></h2>
    <form action="process/task_handler.php" method="post">
        <?php if (isset($_GET['id'])) : ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif; ?>
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="1" <?= $priority == 1 ? 'selected' : '' ?>>High</option>
            <option value="2" <?= $priority == 2 ? 'selected' : '' ?>>Medium</option>
            <option value="3" <?= $priority == 3 ? 'selected' : '' ?>>Low</option>
        </select><br><br>
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?= $task_name ?>"><br><br>
        <label for="task_desc">Task Description:</label>
        <textarea id="task_desc" name="task_desc"><?= $task_desc ?></textarea><br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Not started" <?= $status == 'Not started' ? 'selected' : '' ?>>Not started</option>
            <option value="In Progress" <?= $status == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="Waiting On" <?= $status == 'Waiting On' ? 'selected' : '' ?>>Waiting On</option>
            <option value="Done" <?= $status == 'Done' ? 'selected' : '' ?>>Done</option>
        </select><br><br>
        <button type="submit"><?php echo isset($_GET['id']) ? 'Update Task' : 'Add Task' ?></button>
    </form>
</body>
</html>
