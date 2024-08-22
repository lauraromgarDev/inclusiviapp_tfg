<?php

namespace App\Http\Controllers;

use App\Mail\InscripcionFormMail;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to display the inscription form to the user
     */
    public function create()
    {
        //get all the projects from the database
        $projects = Project::all();
        return view('user.students.create', compact('projects'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * This function is used to store the student details in the database
     */


    public function store(Request $request)
    {
        // Validate the form fields
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required|integer',
            'es_socio' => 'required',
            'diversidad_funcional',
            'diversidad_descripcion' => 'nullable',
            'email' => 'required|email',
            'telefono' => 'required',
            'project_id' => 'required',
        ]);

        // Get the project
        $project = Project::find($request->project_id);

        // Store the student details in the database
        $alumno = new Student();
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->edad = $request->edad;
        $alumno->es_socio = $request->es_socio;
        // Verifica si el usuario es socio
        if ($request->es_socio) {
            // Obtiene el ID del usuario autenticado
            $userId = Auth::id();
            // Asigna el user_id del usuario autenticado al estudiante
            $alumno->user_id = $userId;
        }
        $alumno->diversidad_funcional = $request->diversidad_funcional === 'true' ? true : false;
        $alumno->diversidad_descripcion = $request->diversidad_descripcion;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->project_id = $request->project_id;
        $alumno->save();


        // Get the project name from the database
        $nombreProyecto = $project->name;

        // Send the email to the admin
        $datosInscripcion = [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
            'es_socio' => $request->es_socio,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'diversidad_funcional' => $request->diversidad_funcional,
            'diversidad_descripcion' => $request->diversidad_descripcion,
            'project_id' => $request->project_id,
            'nombreProyecto' => $nombreProyecto,
        ];

        // Send the contact email
        $locale = app()->getLocale();
        Mail::to('laura.inclusiviapp@gmail.com')->send(new InscripcionFormMail($datosInscripcion, $locale));

        $message = Lang::get('alumnos.mess_create');
        // Redirect to the contact page with a success message
        return back()->with('message_sent', $message);


    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to display the students list to the admin
     */
    public function index(Request $request)
    {
        //get all the projects from the database
        $selectedProjectId = $request->get('project_id');
        //we filter projects by the selected project id and name
        $projects = Project::pluck('name', 'id');

        $students = Student::with('project');

        if ($selectedProjectId) {
            $students->where('project_id', $selectedProjectId);
        }

        $students = $students->latest('created_at')->paginate(10);

        return view('admin.students.index', compact('students', 'projects', 'selectedProjectId'));
    }




    /**
     * @param Student $student
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to display the student details to the admin
     */
    public function edit($locale, Student $student)
    {
        //get all the projects from the database and the student details
        $students = Student::all();
        $projects = Project::all();

        return view('admin.students.edit', compact('student', 'projects'));
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     * This function is used to update the student details in the database
     */
    public function update(Request $request, $locale, Student $student)
    {
        // Validate the form fields
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required|integer',
            'es_socio' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'diversidad_funcional' => 'nullable',
            'diversidad_descripcion' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the student details in the database
        $student->nombre = $request->nombre;
        $student->apellidos = $request->apellidos;
        $student->edad = $request->edad;
        $student->es_socio = $request->es_socio;
        $student->diversidad_funcional = $request->diversidad_funcional === 'true' ? 1 : 0;
        $student->diversidad_descripcion = $request->diversidad_descripcion;
        $student->email = $request->email;
        $student->telefono = $request->telefono;
        $student->project_id = $request->project_id;
        $student->save();

        $message = Lang::get('alumnos.mess_update');

        // Redirect to the students list with a success message
        return redirect()->route('admin.students.index', ['locale' => app()->getLocale()])->with('success', $message);
    }


    /**
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     * This function is used to delete the student from the database
     */
    public function destroy($locale, Student $student)
    {
        $student->delete();

        $message = Lang::get('alumnos.mess_delete');

        return redirect()->route('admin.students.index', ['locale' => app()->getLocale()])->with('success', $message);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to display the student details to the admin
     */
    public function show($locale, $id)
    {
        //get the student details from the database
        $student = Student::find($id);

        //if the student is not found, redirect to the students list with an error message
        if (!$student) {
            return redirect()->route('admin.students.index', ['locale' => $locale])->with('error', 'Alumno no encontrado');
        }

        return view('admin.students.show', ['locale' => app()->getLocale(), 'student' => $student]);
    }

    public function showUserProjects()
    {
        $user = Auth::user();

        // Obtén los estudiantes (proyectos inscritos) del usuario actual con los datos relacionados del proyecto
        $estudiantes = $user->students()->with('project')->get();


        // Puedes pasar los estudiantes a la vista para mostrarlos
        return view('user.students.mis-proyectos', ['estudiantes' => $estudiantes]);
    }


//    public function showUserProjects()
//    {
//
//    $user = Auth::user();
//
//    // Obtén los estudiantes (proyectos inscritos) del usuario actual
//    $estudiantes = $user->students;
//
//    // Obtén los nombres de los proyectos inscritos
//    $proyectosInscritos = $estudiantes->map(function ($estudiante) {
//        return $estudiante->project->nombre;
//    });
//
//    // Puedes pasar los proyectos inscritos a la vista para mostrarlos
//    return view('user.students.mis-proyectos', ['proyectosInscritos' => $proyectosInscritos]);
//
//    }









}
