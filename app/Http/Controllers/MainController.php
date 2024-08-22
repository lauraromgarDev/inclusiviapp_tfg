<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('main.index', compact('projects'));
    }

    //metodo para mostra la seccion de acerca de
    public function about($locale)
    {
        return view('main.about', compact('locale'));
    }







}
