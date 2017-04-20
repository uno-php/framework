<?php

namespace App\Controllers;

//use Uno\Database\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;

class PagesController
{

    /**
     * @var DB
     */
    private $database;

    public function __construct()
    {
        $this->database = app('database');
    }

    public function welcome()
    {
        return view('welcome', ['version' => app()->version() ]);
    }

    public function withData()
    {
        $data = $this->database->getAllData('mobnu_users');

        return view('welcome', compact('data'));
    }
}