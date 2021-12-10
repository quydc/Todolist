<?php
require_once("../Controller/TodoController.php");
$todoController = new Controller\TodoController();
$todos = null;
// list
if ($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_REQUEST['date'])) {
    $todos = $todoController->index($_REQUEST['date']);
}
// Add
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['type'] == "ADD") {
    $todoController->add();
    $todos = $todoController->index($todoController->date);
}
// Edit
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['type'] == "EDIT") {
    $todoController->edit();
    $todos = $todoController->index($todoController->date);
}
// Delete
if ($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_REQUEST['delete'])) {
    $todoController->delete();
    $todos = $todoController->index($_REQUEST['date']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/todo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php if ($todoController->date) { ?>
    <div class="container">
        <!-- messages-->
        <?php include 'messages.php'; ?>
        <div class="col-md-12">
            <!-- body -->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <a href="../index.php" class="btn"><i class="fa fa-home"></i></a>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                            role="tablist">
                            <li class="nav-item m-tabs__item">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addModal">
                                    Add
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget4_tab1_content">
                            <div class="m-widget4 m-widget4--progress">
                                <?php foreach ($todos as $todo) { ?>
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__info">
												<span class="m-widget4__sub">
													Start Date : <?= $todo->startDate ?>
												</span>
                                            <br>
                                            <span class="m-widget4__sub">
													End Date : <?= $todo->endDate ?>
												</span>
                                        </div>
                                        <div class="m-widget4__progress show_form_edit" data-id="<?= $todo->id ?>">
                                            <div class="m-widget4__progress-wrapper">
													<span class="m-widget17__progress-number">
														<?= $todo->taskName ?>
													</span>
                                                <span class="m-widget17__progress-label">
														<?= $todo->status ?>
													</span>
                                                <?php
                                                $colorStatus = "";
                                                switch ($todo->status) {
                                                    case 'Planning':
                                                        $colorStatus = "#17a2b8";
                                                        break;
                                                    case 'Doing':
                                                        $colorStatus = "#28a745";
                                                        break;
                                                    case 'Complete':
                                                        $colorStatus = "#ffc107";
                                                        break;
                                                }
                                                ?>
                                                <div class="progress m-progress--sm"
                                                     style="background-color: <?= $colorStatus ?>;">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 63%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="63"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="todo.php?delete=<?= $todo->id ?>&date=<?= $todo->createDate ?>"
                                               class="m-btn m-btn--hover-brand m-btn--pill btn btn-sm btn-secondary">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <?php include 'modal_add.php'; ?>

    <!-- Modal Edit-->
    <?php include 'modal_edit.php'; ?>

    <script>
        $( document ).ready(function() {
            $(".date-start-add, .date-end-add").change(function () {
                let start = $(".date-start-add").val();
                let end = $(".date-end-add").val();
                compareDate(start, end);
            });

            $(".date-start-edit, .date-end-edit").change(function () {
                let start = $(".date-start-edit").val();
                let end = $(".date-end-edit").val();
                compareDate(start, end);
            });

            function compareDate(start, end) {
                if (new Date(start) > new Date(end)) {
                    alert("Start date is greater than the end date");
                    $(".btn-submit-form").prop('disabled', true);
                } else {
                    $(".btn-submit-form").prop('disabled', false);
                }
            }


            $(".show_form_edit").click(function () {
                $('#form-edit-todo').trigger("reset");
                $(".btn-submit-form").prop('disabled', true);

                let id = $(this).attr("data-id");
                let todos = <?php echo json_encode($todos); ?>;
                let todoInfo = null;
                for (let [index, todo] of Object.entries(todos)) {
                    for (let [key, value] of Object.entries(todo)) {
                        if (todo['id'] == id) {
                            todoInfo = todo;
                            break;
                        }
                    }
                    if (todoInfo !== null) {
                        break;
                    }
                }
                // Set value for form edit from todoInfo
                $('#id-edit').val(todoInfo['id']);
                $('#task-name-edit').val(todoInfo['taskName']);
                $('#start-date-edit').val(todoInfo['startDate']);
                $('#end-date-edit').val(todoInfo['endDate']);
                switch (todoInfo['status']) {
                    case "Planning":
                        $("#status-planning-edit").prop("checked", true);
                        break;
                    case "Doing":
                        $("#status-doing-edit").prop("checked", true);
                        break;
                    case "Complete":
                        $("#status-complete-edit").prop("checked", true);
                        break;
                }

                $('#editModal').modal('show');
            });
        });
    </script>
<?php }else{ ?>
    <div class="row">
        <div class="col-12 text-center">
            <h1>404 NOT FOUND</h1>
        </div>
    </div>
<?php } ?>
</body>
</html>
