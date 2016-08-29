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
            if ($this->formValid()){
                $userId = $_SESSION['user_id'];
                if ($this->model->create($part_name, $description, $car_kilometers, $part_life, $service_name, $archive, $userId)) {
                    $this->addInfoMessage("Part replacement created.");
                    $this->redirect("parts");
                } else {
                    $this->addErrorMessage("Error: cannot create part replacement.");
                    $this->addErrorMessage("Please contact Administrator!");
                }
            }
        }
    }

}