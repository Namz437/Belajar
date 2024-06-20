<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project1Controller​ extends Controller
{
    public function index(){
        return "Halo ini adalah method index, dalam controller Project1Controller";
       }

       public function about(){
        return "Halo ini adalah method about, dalam controller Project1Controller";
       }

       public function cek(){
        return "Halo ini adalah method cek, dalam controller Project1Controller";
       }
}
