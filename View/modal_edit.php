<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="todo.php" id="form-edit-todo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" name="type" value="EDIT">
                <input type="hidden" name="id" value="" id="id-edit">
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
                            <input class="form-control" type="text" value="" id="task-name-edit" name="taskName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label">Starting Date</label>
                        <div class="col-9">
                            <input class="form-control date-start-edit" type="date" value="2011-08-19" id="start-date-edit" name="startDate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label">Ending Date</label>
                        <div class="col-9">
                            <input class="form-control date-end-edit" type="date" value="2011-08-19" id="end-date-edit" name="endDate">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status-planning-edit" value="Planning" checked>
                                    <label class="form-check-label" for="status-planning-edit">
                                        Planning
                                    </label>
                                    <button type="button" class="btn btn-info btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status-doing-edit" value="Doing">
                                    <label class="form-check-label" for="status-doing-edit">
                                        Doing
                                    </label>
                                    <button type="button" class="btn btn-success btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status-complete-edit" value="Complete">
                                    <label class="form-check-label" for="status-complete-edit">
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