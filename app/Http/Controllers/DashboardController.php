<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostUser;
use GuzzleHttp\Psr7\Request;

class DashboardController extends AdminController
{
   // private  $user;
    //
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
       parent::getDataCounters();
       // parent::$data["title"]="";
       // parent::$data["bread_route"]="";
       // parent::$data["breadcrumb"]="";
       return view('home',parent::$data);

    }
}
