<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="todo.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" name="type" value="ADD">
                <input type="hidden" name="createDate" value="<?= $todoController->date ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Task info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label">Work Name</label>
                        <div class="col-9">
                            <input class="form-control" type="text" value="" id="example-text-input" name="taskName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label">Starting Date</label>
                        <div class="col-9">
                            <input class="form-control date-start-add" type="date" value="" id="example-date-input" name="startDate" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label">Ending Date</label>
                        <div class="col-9">
                            <input class="form-control date-end-add" type="date" value="" id="example-date-input" name="endDate" required>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="Planning" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Planning
                                    </label>
                                    <button type="button" class="btn btn-info btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="Doing">
                                    <label class="form-check-label" for="gridRadios2">
                                        Doing
                                    </label>
                                    <button type="button" class="btn btn-success btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="Complete">
                                    <label class="form-check-label" for="gridRadios3">
                                        Complete
                                    </label>
                                    <button type="button" class="btn btn-warning btn-sm"></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit-form">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>