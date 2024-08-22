<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    /**
     * Display a listing of the projects for admins.
     * @return \Illuminate\Contracts\Foundation\Application|Factory|Application|View
     * @internal param Project $project
     * This function is used to show the projects list
     */
    public function index()
    {
        $projects = Project::paginate(1);
        return view('admin.projects.index', compact('projects'));
    }



    /**
     * Display a listing of the projects for users.
     * @return Application|Factory|View
     * @internal param Project $project
     * This function is used to show the projects list
     */
    public function userIndex()
    {
        $locale = app()->getLocale();
        $projects = Project::all();
        return view('user.projects', compact('projects', 'locale'));
    }


    /**
     * Show the form for creating a new project.
     * @return Application|Factory|View
     * @internal param Project $project
     * This function is used to show the create project form
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Project $project
     * This function is used to store the project details in the database
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'image' => 'nullable|mimes:png,svg,jpg,jpeg',
            'name' => 'required',
            'description' => 'required',
            'team_description' => 'required',
            'objectives' => 'required',
            'destination' => 'required',
        ]);

        $project = new Project;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->slug = $project->generateSlug();
        $project-> team_description = $request->input('team_description');
        $project->objectives = $request->objectives;
        $project->destination = $request->destination;

         //Verificar si se proporcionó una imagen
//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('public/images');
//            $project->image = str_replace('public/images/', '', $path);
//        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $project->image = $fileName;
        }




        $project->save();

//        dd(asset($project->image));
        $message = Lang::get('proyectos.mess_create');
        return redirect('/' . app()->getLocale() . '/projects')->with('success', $message);
    }



    /**
     * Display the specified resource.
     * @param  string  $slug
     * @return Application|Factory|View
     * @internal param Project $project
     * This function is used to show the project details
     */
    public function show($locale, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $projects = Project::all();
        return view('admin.projects.show', compact('project', 'projects'));
    }

    /**
     * Display the specified resource for users.
     * @param string $locale
     * @param string $slug
     * @return Application|Factory|View
     * @internal param Project $project
     * This function is used to show the project details
     */
    public function userShow($locale, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $projects = Project::all();

        return view('user.project', compact('project', 'projects'));
    }



    /**
     * Show the form for editing the specified resource.
     * @param  string  $id
     * @return Application|Factory|View
     * @internal param Project $project
     * This function is used to show the edit project form
     */
    public function edit($locale, $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }


    /**
     * Update the specified project in storage.
     * @param Request $request
     * @param  string  $locale
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Project $project
     * This function is used to update the project details in the database
     */
    public function update(Request $request, $locale, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:png,svg,jpg,jpeg',
            'name' => 'required',
            'description' => 'required',
            'team_description' => 'required',
            'objectives' => 'required',
            'destination' => 'required',
        ]);

        $project->name = $request->name;
        $project->description = $request->description;
        $project->team_description = $request->team_description;
        $project->objectives = $request->objectives;
        $project->destination = $request->destination;

//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('images', 'public');
//            $project->image = $path;
//        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $project->image = $fileName;
        }

        $project->save();

        $message = Lang::get('proyectos.mess_update');

        return redirect()->route('admin.projects.index', ['locale' => app()->getLocale()])->with('success', $message);
    }


    /**
     * Remove the specified resource from storage.
     * @param  string  $locale
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @internal param Project $project
     * This function is used to delete the project from the database
     */
    public function destroy ($locale, Project $project)
    {
        $project->delete();
        $message = Lang::get('proyectos.mess_delete');

        return redirect()->route('admin.projects.index', ['locale' => app()->getLocale()])->with('success', $message);
    }

}
