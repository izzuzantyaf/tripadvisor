<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Home",
            "places" => array_reverse($this->model("Place_model")->get_all_places())
        ];
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }

    public function get_update()
    {
        echo json_encode($this->model("Place_model")->get_single_place("id", $_POST["id"]));
    }

    public function update()
    {
        $this->model("Place_model")->update_place($_POST);
        header("Location: " . BASEURL);
    }

    public function add_place()
    {
        $this->model("Place_model")->add_place($_POST);
        header("Location: " . BASEURL);
    }

    public function delete()
    {
        $this->model("Place_model")->delete_place($_POST["id"]);
        header("Location: " . BASEURL);
    }
}
