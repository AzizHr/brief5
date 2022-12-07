<?php

class HomeController {

    public function index($data) {

        include('views/' . $data . '.php');
    }

}
