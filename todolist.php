<?php
session_start();

require_once('process/db.php');

$fetch_sql = "SELECT *
                FROM task_list
                WHERE user_id = :user_id";

$stmt = $db->prepare($fetch_sql);
$user_id = $_SESSION['user_id'];

$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>To Do List</title>
</head>

<body>
    <div class="container">
        <h2><?= $_SESSION['user_name']?></h2>
        <h3><a href="process/logout.php" class=" text-decoration-none ">
            Logout
        </a></h3>
        <section class="my-4">
            <h1 class="mb-3">To Do List</h1>
            <form action="process/add_task.php" method="post">
                <div class="d-flex">
                    <input type="text" class="form-control" name="new_task" placeholder="add new task">
                    <button type="submit" class="rounded-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    </button>
                </div>
            </form>
            <table id="task-table" class="display order-column table table-bordered table-fixed rounded">
                <thead>
                    <tr>
                        <th>Priority</th>
                        <th>Task</th>
                        <th>Done</th>
                        <th>Progress</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($tasks as $row) {
                     ?>
                        <tr>
                            <td>
                                <?= $row['priority']?>
                            </td>
                            <td>
                            <?php
                                if ($row['status'] == 'Done') {
                                ?>
                                <p style="text-decoration: line-through;">
                                <?php
                                } else {
                                ?>
                                <p>
                                <?php
                                }
                                ?>
                                    <?= $row['task_name']?>
                                </p>
                            </p>
                            <td>
                                <form action="process/done_task.php" method="post" class="flex">
                                    <?php
                                    if($row['status'] == "Done") {
                                    ?>
                                        <button type="submit" class="border-0">
                                            <label for="checkbox">Done</label>
                                            <input type="hidden" name="id" value="<?= $row['id']?>">
                                            <input type="hidden" value="done" name="done_check">
                                            <input id="checkbox" type="checkbox" checked>
                                        </button>

                                        <?php
                                    } else {
                                        ?>
                                        <button type="type=" class="border-0">
                                            <label for="checkbox">Done</label>
                                            <input type="hidden" name="id" value="<?= $row['id']?>">
                                            <input type="hidden" value="not-done" name="done_check">
                                            <input id="checkbox" type="checkbox">
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </td>
                            <td><?= $row['status']?></td>
                            <td class=" w-25 ">
                                <div class="d-flex gap-3 ">
                                    <form action="process/delete_task.php" method="post">
                                        <input type="hidden" name="del_id" value="<?=$row['id']?>">
                                        <button type="submit" class="delete-task border-0">Delete</button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                     <?php
                        }
                     ?>
                </tbody>
            </table>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#task-table').DataTable({
                paging: false,
                searching: false,
                info: false,
                ordering: false
            });
        });

        $("input:checkbox").click(function(event) {
            event.preventDefault();
        });
    </script>

</body>

</html>
