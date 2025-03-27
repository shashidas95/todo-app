<?php include "backend.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card">
            <div class="card-body p-5">
              <form
                class="d-flex justify-content-center align-items-center mb-4" method="post" action="">
                <div data-mdb-input-init class="form-outline flex-fill">
                  <input type="text" id="form2" class="form-control" name="task" />
                  <label class="form-label" for="form2">New task...</label>
                </div>
                <button
                  type="submit"
                  data-mdb-button-init
                  data-mdb-ripple-init
                  class="btn btn-info ms-2">
                  Add
                </button>
              </form>

              <!-- Tabs navs -->
              <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link active"
                    id="ex1-tab-1"
                    data-mdb-tab-init
                    href="#ex1-tabs-1"
                    role="tab"
                    aria-controls="ex1-tabs-1"
                    aria-selected="true">Tasks List</a>
                </li>

              </ul>




              <!-- All Tasks -->
              <div class="tab-pane fade show active" id="all">
                <ul class="list-group">
                  <?php foreach ($tasks as $index => $task): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <!-- Mark task as completed -->
                      <form action="" method="post" class="d-inline">
                        <input type="hidden" name="complete_task" value="<?= $index ?>">
                        <input type="checkbox" name="complete_task" value="<?= $index ?>" <?= $task["completed"] ? "checked" : "" ?>>
                        <button type="submit" class="btn btn-info btn-sm ms-2">Mark as <?= $task["completed"] ? "Active" : "Completed" ?></button>
                      </form>
                      <?= $task["completed"] ? "<s>{$task['task']}</s>" : $task["task"] ?>
                      <!-- Delete task -->
                      <form action="" method="post" class="d-inline">
                        <input type="hidden" name="delete_task" value="<?= $index ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <!-- Completed Tasks -->
              <div class="tab-pane fade" id="completed">
                <ul class="list-group">
                  <?php foreach ($tasks as $index => $task): ?>
                    <?php if ($task["completed"]): ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center">

                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="complete_task" value="<?= $index ?>">
                          <input type="checkbox" name="complete_task" value="<?= $index ?>" <?= $task["completed"] ? "checked" : "" ?>>
                          <button type="submit" class="btn btn-info btn-sm ms-2">Mark as Active</button>
                        </form>
                        <s><?= $task["task"] ?></s>

                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="delete_task" value="<?= $index ?>">
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>