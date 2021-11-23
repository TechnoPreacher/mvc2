<?php

namespace mvc\controllers;


class DefaultController extends MainController
{
    public function index()
    {
        $this->generate('commonview');
    }
}