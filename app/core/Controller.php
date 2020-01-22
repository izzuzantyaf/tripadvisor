<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once "../app/views/$view.php";
    }

    public function model($model_name)
    {
        require_once "C:/xampp/htdocs/traveladvisor/app/models/$model_name.php";
        return new $model_name;
    }
}
