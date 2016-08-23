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


}