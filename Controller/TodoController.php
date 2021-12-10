<?php

namespace Controller;

require_once("../Model/TodoModel.php");
require_once("../Model/TodoEntity.php");

/**
 * Controller todo logic
 */
class TodoController
{
    public $model;
    public $date;
    public $success;
    public $errors;

    public function __construct()
    {
        $this->model = new \Model\TodoModel();
        $this->date = "";
        $this->success = "";
        $this->errors = "";
    }

    public function index($date)
    {
        $this->date = $date;
        return $this->model->lists($this->date);
    }

    public function add()
    {
        $this->date = $_REQUEST['createDate'];

        $todo = new \Entity\TodoEntity(null, $_REQUEST['taskName'], $_REQUEST['startDate'], $_REQUEST['endDate'], $_REQUEST['status'], $_REQUEST['createDate']);

        if ($this->model->add($todo)) {
            $this->success = "Successfully!";
        } else {
            $this->errors = "Failed!";
        }
    }

    public function edit()
    {
        $this->date = $_REQUEST['createDate'];

        $todo = new \Entity\TodoEntity($_REQUEST['id'], $_REQUEST['taskName'], $_REQUEST['startDate'], $_REQUEST['endDate'], $_REQUEST['status'], $_REQUEST['createDate']);

        if ($this->model->edit($todo)) {
            $this->success = "successfully!";
        } else {
            $this->errors = "Failed!";
        }
    }

    public function delete()
    {
        if ($this->model->delete($_REQUEST['delete'])) {
            $this->success = "Successfully!";
        } else {
            $this->errors = "Failed!";
        }
    }
}

?>
