<?php

include('config/db.php');
$to_do = "SELECT * FROM `to_dos` ORDER BY `id`";
$result = $conn->query($to_do);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
<!--     <link rel="stylesheet" href="style.css" /> -->
</head>

<body class="mb-5 vh-100">
    <h2 class="text-center pt-5 fw-bold">To Do List</h2>
    <div class="container text-center mx-auto p-5">
        <div class="row">

            <!-- the to do cards appears here in loop -->
            <?php if (mysqli_num_rows($result) > 0) {
                while ($cards = $result->fetch_assoc()) { ?>
                    <div class="col d-flex aligns-items-center justify-content-center my-3">
                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    <?php echo $cards['title'] ?>
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php echo $cards['subtitle'] ?>
                                </h6>
                                <p class="card-text mt-4">
                                    <?php echo $cards['task'] ?>
                                </p>
                                <div class="mt-5">
                                    <a class="card-link fs-5 btn btn-warning me-5" data-bs-toggle="modal"
                                        data-bs-target="#addTask<?php echo $cards['id'];?>"><ion-icon name="create-outline"></ion-icon></a>

                                    <!-- Edit Task Modal Form -->
                                    <div class="modal fade" id="addTask<?php echo $cards['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Your Task</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="editTask.php" method="post">
                                                        <input type="hidden" name="id_to_edit" value="<?php echo $cards['id']; ?>">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title"
                                                                placeholder="task title" name="title" value="<?php echo $cards['title'];?>" required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="subtitle" class="form-label">subtitle</label>
                                                            <input type="text" class="form-control" id="subtitle"
                                                                placeholder="subtitle" name="subtitle" value="<?php echo $cards['subtitle'];?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="task" class="form-label">Task</label>
                                                            <input type="text" class="form-control" id="task"
                                                                placeholder="start typing" name="task" value="<?php echo $cards['task'];?>" required />
                                                        </div>
                                                        <button type="submit" class="btn btn-success w-100" name="editTask">
                                                            Save Changes ?
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="deleteTask.php?id=<?php echo $cards['id'] ?>" class="card-link fs-5 btn btn-danger"
                                        onclick="return confirm('Are you sure ?')"><ion-icon name="trash"></ion-icon></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- if no tasks are added -->
            <?php } else { ?>
                <div class="noTask mt-5">
                    <img width="96" height="96"
                        src="https://img.icons8.com/external-greeney-andi-nur-abdillah/96/external-Notes-education-(greeney)-greeney-andi-nur-abdillah.png"
                        alt="external-Notes-education-(greeney)-greeney-andi-nur-abdillah" />
                    <h4 class="mt-3">No notes here yet</h4>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- add button to add tasks -->
    <button class="btn btn-success position-absolute bottom-0 end-0 me-5 mb-5 d-flex align-items-center fs-5"
        data-bs-toggle="modal" data-bs-target="#addTask">
        Add <ion-icon name="add" class="ms-2"></ion-icon>
    </button>

    <!-- Add Task Modal Form -->
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Your Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addTask.php" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="task title" name="title"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">subtitle</label>
                            <input type="text" class="form-control" id="subtitle" placeholder="subtitle"
                                name="subtitle" />
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Task</label>
                            <input type="text" class="form-control" id="task" placeholder="start typing" name="task"
                                required />
                        </div>
                        <button type="submit" class="btn btn-success w-100" name="addTask">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
