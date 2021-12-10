<div class="col-md-12">
    <?php if ($todoController->success) { ?>
        <div class="alert alert-success" role="alert">
            <?= $todoController->success ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($todoController->errors) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $todoController->errors ?>
        </div>
    <?php } ?>
</div>