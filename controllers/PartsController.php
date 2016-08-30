<?php

class PartsController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    function index()
    {
        $this->parts = $this->model->getAll();
    }


    function create()
    {
        if($this->isPost) {
            $part_name = $_POST['part_name'];
            if (strlen($part_name) < 1) {
                $this->setValidationError("part_name", "The part name cannot be empty!");
            }
            $description = $_POST['description'];
            if (strlen($description) < 1) {
                $this->setValidationError("description", "The description cannot be empty!");
            }
            $car_kilometers = $_POST['car_kilometers'];
            if (strlen($car_kilometers) < 1) {
                $this->setValidationError("car_kilometers", "The kilometers cannot be empty!");
            }
            $part_life = $_POST['part_life'];
            if (strlen($part_life) < 1) {
                $this->setValidationError("part_life", "The part life cannot be empty!");
            }
            $service_name = $_POST['service_name'];
            if (strlen($service_name) < 1) {
                $this->setValidationError("service_name", "The service name cannot be empty!");
            }
            $archive = $_POST['archive'];
            if (strlen($archive) < 1) {
                $this->setValidationError("archive", "The Part Status Value cannot be empty!");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if (!preg_match($dateRegex, $date)) {
                $this->setValidationError("post_date", "Invalid date!");
            }
            if ($this->formValid()){
                $userId = $_SESSION['user_id'];
                if ($this->model->create($part_name, $description, $car_kilometers, $part_life, $service_name, $archive, $date, $userId)) {
                    $this->addInfoMessage("Part replacement created.");
                    $this->redirect("parts");
                } else {
                    $this->addErrorMessage("Error: cannot create part replacement.");
                    $this->addErrorMessage("Please contact Administrator!");
                }
            }
        }
    }

    function replace(int $id)
    {
        if($this->isPost) {
            $part_life = $_POST['part_life'];
            if (strlen($part_life) < 1) {
                $this->setValidationError("part_life", "Enter part life kilometers");
            }
            $archive = $_POST['archive'];
            if (strlen($archive)< 1) {
                $this->setValidationError("archive", "Type 'Yes'.");
            }
            $date_replaced = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if (!preg_match($dateRegex, $date_replaced)) {
                $this->setValidationError("post_date", "Invalid date!");
            }

            if ($this->formValid()) {
                if ($this->model->replace($part_life, $archive, $date_replaced, $id )) {
                    $this->addInfoMessage("Part replaced and archived");
                } else {
                    $this->addErrorMessage("Error: cannot replace that part.");
                }
                $this->redirect('parts');
            }
        }
        // HTTP GET
        // Show "confirm delete" form
        $part = $this->model->getPartById($id);
        if (!$part) {
            $this->addErrorMessage("Error: part does not exist");
            $this->redirect("parts");
        }
        $this->part = $part;
    }

    function edit(int $id)
    {
        if ($this->isPost) {

            // HTTP POST
            $part_name = $_POST['part_name'];
            if (strlen($part_name) < 1) {
                $this->setValidationError("part_name", "The part name cannot be empty!");
            }
            $description = $_POST['description'];
            if (strlen($description) < 1) {
                $this->setValidationError("description", "Type some info for this part!");
            }
            $car_kilometers = $_POST['car_kilometers'];
            if (strlen($car_kilometers) < 1) {
                $this->setValidationError("car_kilometers", "The part name cannot be empty!");
            }
            $part_life = $_POST['part_life'];
            if (strlen($part_life) < 1) {
                $this->setValidationError("part_life", "Use 1000 for example.");
            }
            $service_name = $_POST['service_name'];
            if (strlen($service_name) < 1) {
                $this->setValidationError("service_name", "Where was the replacement location?");
            }
            $archive = $_POST['archive'];
            if (strlen($archive) < 1) {
                $this->setValidationError("archive", "Must be 'Yes' or 'No'! Default is 'No'");
            }

            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if (!preg_match($dateRegex, $date)) {
                $this->setValidationError("post_date", "Invalid date!");
            }
            if ($this->formValid()) {
                if ($this->model->edit($part_name, $description, $car_kilometers, $part_life, $service_name, $archive, $date, $id )) {
                    $this->addInfoMessage("Part edited.");
                } else {
                    $this->addErrorMessage("Error: cannot edit part.");
                }
                $this->redirect('parts');
            }
        }

        // HTTP GET
        // Show "confirm delete" form
        $part = $this->model->getPartById($id);
        if (!$part) {
            $this->addErrorMessage("Error: part does not exist");
            $this->redirect("parts");
        }
        $this->part = $part;
    }

    function delete(int $id) {

            if ($this->isPost) {
                // HTTP POST
                // delete the requested post by id
                if ($this->model->delete($id)){
                    $this->addInfoMessage("Part deleted.");
                } else {
                    $this->addErrorMessage("Error: cannot delete part.");
                }
                $this->redirect('parts');
            }
            else {
                // HTTP GET
                // Show "confirm delete" form
                $part = $this->model->getPartById($id);
                if(!$part) {
                    $this->addErrorMessage("Error: part does not exist");
                    $this->redirect("parts");
                }
                $this->part = $part;
            }

    }

}