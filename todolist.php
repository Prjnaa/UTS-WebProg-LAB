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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body {
            font-family: sans-serif;
            background-image: url(images/gradient3.jpeg);
        }
            .table {
                background-color: rgba(255, 255, 255, 0.7);
                /* Ubah nilai alpha sesuai keinginan Anda */
            }

            .table tbody tr td {
                background-color: transparent;
                /* Hapus warna latar belakang kotak sel */
            }
        
    </style>
    <title>To Do List</title>
</head>

<body>
    <div class="container my-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>
                <?= $_SESSION['user_name'] ?>
            </h1>
            <a href="process/logout.php" class="btn btn-danger btn-lg">Logout</a>
        </div>

        <section class="my-5">
            <h1 class="mb-3 text-center">To Do List</h1>
            <form action="process/add_task.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="new_task" placeholder="Add new task">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
                <table id="task-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Priority</th>
                            <th>Task</th>
                            <th>Task Description</th>
                            <th>Done</th>
                            <th>Progress</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $row) { ?>
                            <tr>
                                <td>
                                    <?= $row['priority'] ?>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 'Done') { ?>
                                        <p style="text-decoration: line-through;">
                                            <?= $row['task_name'] ?>
                                        </p>
                                    <?php } else { ?>
                                        <p>
                                            <?= $row['task_name'] ?>
                                        </p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 'Done') { ?>
                                        <p style="text-decoration: line-through;">
                                        <?= $row['task_desc'] ?>
                                        </p>
                                    <?php } else { ?>
                                        <p>
                                        <?= $row['task_desc'] ?>
                                        </p>
                                    <?php } ?>
                                    </td>
                                <td>
                                    <form action="process/done_task.php" method="post" class="d-flex">
                                        <?php if ($row['status'] == "Done") { ?>
                                            <button type="submit" class="border-0">
                                                <label for="checkbox">Done</label>
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input type="hidden" value="done" name="done_check">
                                                <input id="checkbox" type="checkbox" checked>
                                            </button>
                                        <?php } else { ?>
                                            <button type="type=" class="border-0">
                                                <label for="checkbox">Done</label>
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input type="hidden" value="not-done" name="done_check">
                                                <input id="checkbox" type="checkbox">
                                            </button>
                                        <?php } ?>
                                    </form>
                                </td>
                                <td>
                                    <?= $row['status'] ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <form action="process/delete_task.php" method="post">
                                            <input type="hidden" name="del_id" value="<?= $row['id'] ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="input.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Edit Task</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#task-table').DataTable({
                paging: false,
                searching: false,
                info: false,
                ordering: false
            });
        });

        $("input:checkbox").click(function (event) {
            event.preventDefault();
        });
    </script>
</body>

</html>