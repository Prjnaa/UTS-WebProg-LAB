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
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" <?php if (isset($_GET['task_name'])) : ?>value="<?= $_GET['task_name'] ?>" <?php endif; ?>><br><br>
        <label for="task_desc">Task Description:</label>
        <textarea id="task_desc" name="task_desc"><?php if (isset($_GET['task_desc'])) echo $_GET['task_desc']; ?></textarea><br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Not started">Not started</option>
            <option value="In Progress">In Progress</option>
            <option value="Waiting On">Waiting On</option>
            <option value="Done">Done</option>
        </select><br><br>
        <button type="submit"><?php echo isset($_GET['id']) ? 'Update Task' : 'Add Task' ?></button>
    </form>
</body>
</html>
