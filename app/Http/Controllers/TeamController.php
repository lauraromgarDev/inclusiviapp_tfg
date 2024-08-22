<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TeamController extends Controller
{
    /**
     * Display a listing of the team for admin.
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the team list for admin
     */
    public function index(Request $request, $locale)
    {
        // Get the team type from the request
        $teamType = $request->input('teamType');

        // Get the teams from the database
        if ($teamType == 'directors') {
            $teams = Team::where('is_director', true)->get();
        } elseif ($teamType == 'non_directors') {
            $teams = Team::where('is_director', false)->get();
        } else {
            $teams = Team::all();
        }

        // Return the view with the teams
        return view('admin.teams.index', compact('teams', 'teamType'))->with('locale', $locale);
    }



    /**
     * Display a listing of the team for users.
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the team list for users
     */
    public function userIndex()
    {
        $locale = App::getLocale();
        $teams = Team::all();

        return view('user.teams', compact('teams', 'locale'))->with('locale', $locale);
    }


    /**
     * Show the form for creating a new member of the team.
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the create member of the team form
     */
    public function create()
    {
        $locale = app()->getLocale();
        $projects = Project::all();
        $administrators = Administrator::all();

        return view('admin.teams.create', compact('projects', 'administrators', 'locale'))->with('locale', $locale);
    }

    /**
     * Store a newly created member of the team in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Team $team
     * This function is used to store the member of the team details in the database
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,svg,jpg,jpeg',
        ]);

        // Create a new team
        $team = new Team();
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->slug = $team->generateSlug();
        $team->project_id = $request->input('project_id');
        $team->is_director = $request->has('is_director');

        // If the team is a director, validate the director fields
        if ($team->is_director) {
            $request->validate([
                'director_position' => 'required',
                'director_description' => 'required',
            ]);

            $team->position = $request->input('director_position');
            $team->director_position = $request->input('director_position');
            $team->director_description = $request->input('director_description');
            // If the team is not a director, validate the position field
        } else {
            $team->position = $request->input('position');
            $team->director_position = null;
            $team->director_description = null;
        }

        // If the request has an image, store it
//        $path = $request->file('image')->store('public/images');
//        $team->image = str_replace('public/images/', '', $path);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $team->image = $fileName;
        }

        $team->save();

        $message = Lang::get('sobreNosotros.mess_create');
        return redirect('/' . app()->getLocale() . '/teams')->with('success', $message);
    }


    /**
     * Display the specified member of the team for admin.
     * @param Team $team
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the member of the team details for admin
     */

    public function show($locale, $slug)
    {
        $team = Team::where('slug', $slug)->firstOrFail();
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Display the specified member of the team for user.
     * @param Team $team
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the member of the team details for user
     */
    public function userShow($locale, $slug)
    {
        $team = Team::where('slug', $slug)->firstOrFail();

        return view('user.team', compact('team'));
    }



    /**
     * Show the form for editing the specified member of the team.
     * @param Team $team
     * @return Application|Factory|View
     * @internal param Team $team
     * This function is used to show the edit member of the team form
     */
    public function edit($locale, Team $team)
    {
        $projects = Project::all();
        $administrators = Administrator::all();


        return view('admin.teams.edit', compact('team', 'projects', 'administrators'));
    }

    /**
     * Update the specified member of the team in storage.
     * @param Request $request
     * @param Team $team
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Team $team
     * This function is used to update the member of the team details in the database
     */
    public function update(Request $request, $locale, Team $team)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
        ]);

        // Update the team
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->project_id = $request->input('project_id');
        $team->is_director = $request->has('is_director');

        // If the team is a director, validate the director fields
//        if ($team->is_director) {
//            $request->validate([
//                'director_position' => 'required',
//                'director_description' => 'required',
//            ]);
//
//            $team->position = $request->input('director_position');
//            $team->description = $request->input('director_description');
//            // If the team is not a director, validate the position field
//        } else {
//            $team->position = $request->input('position');
//        }
        // If the team is a director, validate the director fields
        if ($team->is_director) {
            $request->validate([
                'director_position' => 'required',
                'director_description' => 'required',
            ]);

            $team->director_position = $request->input('director_position');
            $team->director_description = $request->input('director_description');
            // If the team is not a director, validate the position field
        } else {
            $team->position = $request->input('position');
        }



        // If the request has an image, store it
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $team->image = $fileName;
        }

        $team->save();

        $message = Lang::get('sobreNosotros.mess_update');

        return redirect('/' . app()->getLocale() . '/teams')->with('success', $message);
    }



    /**
     * Remove the specified member of the team from storage.
     * @param Team $team
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @internal param Team $team
     * This function is used to delete the member of the team from the database
     */
    public function destroy($locale, Team $team)
    {
        $team->delete();

        $message = Lang::get('sobreNosotros.mess_delete');

        return redirect('/' . app()->getLocale() . '/teams')->with('success', 'Team deleted successfully.');
    }

}

