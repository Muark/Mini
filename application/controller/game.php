<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Game extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    { 
        $this->game_model = $this->loadModel("game");

        $this->view->game = $this->game_model->getAllPhotos();

        $this->view->render("game/index");
    }

    public function play()
    { 
        $this->game_model = $this->loadModel("game");

        $this->view->game = $this->game_model->selectPhoto();

        $this->view->render("game/play");
    }

    public function score()
    { 
        $this->game_model = $this->loadModel("game");

        $this->view->game = $this->game_model->getDistance();

        $this->view->render("game/score");
    }
}
