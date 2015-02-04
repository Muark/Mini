<?php

class Photos extends Controller
{
    public function index()
    {
        $this->photos_model = $this->loadModel("photos");

        $this->view->photos = $this->photos_model->getAllPhotos();

        $this->view->render("photos/index");
    }

    public function addPhoto()
    {
        $this->photos_model = $this->loadmodel("photos");

        if (isset($_POST['submit_add_photos'])){
            $message = $this->photos_model->addPhoto($_FILES);
        }

       header('location: ' . URL . 'photos/index');
    }
}