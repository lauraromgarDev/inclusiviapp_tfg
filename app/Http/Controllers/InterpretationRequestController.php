<?php

namespace App\Http\Controllers;

use App\Mail\InterpretationRequestMail;
use App\Models\InterpretationRequest;
use App\Models\Interpreter;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InterpretationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {

        $interpretationRequests = InterpretationRequest::latest('id')->paginate(5);

        return view('admin.requests.index', compact('interpretationRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     * This function is used to display the interpretation request form to the user
     */
    public function create($locale)
    {

        // Get all the interpreters from the database
        $interpreters = Interpreter::all();

        return view('user.ask_for_date', compact('interpreters', 'locale'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     * This function is used to store the interpretation request details in the database
     */
    public function getInterpreters(Request $request, $locale)
    {
        // Obtén el servicio seleccionado por el usuario
        $service = $request->input('service');

        // Verifica si el servicio es válido
        if ($service === 'ilse' || $service === 'gilse') {
            // Obtén todos los intérpretes que proporcionan el servicio seleccionado
            $interpreters = Interpreter::where('service', $service)->get();
        } else {
            // Si el servicio no es válido, devuelve un array vacío
            $interpreters = [];
        }

        // Devuelve los intérpretes como una respuesta JSON
        return response()->json(['interpreters' => $interpreters]);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     * This function is used to store the interpretation request details in the database
     */
    public function userRequests()
    {
        $locale = App::getLocale();

        // Obtener las solicitudes de interpretación del usuario
        $user = Auth::user();
        $requests = $user->interpretationRequests()->orderBy('created_at', 'desc')->paginate(10);

        return view('user.my_requests', compact('requests', 'locale'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * This function is used to store the interpretation request details in the database
     */

    public function store(Request $request)
    {
        $locale = App::getLocale();

        // Validate the interpretation request details
        $validatedData = $request->validate([
            'user_id' => 'required',
            'interpreter_id' => 'required',
            'request_date' => 'required',
            'request_message' => 'required',
            'service' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
        ]);

        // Store the interpretation request details in the database
        $interpretationRequest = new InterpretationRequest();
        $interpretationRequest->user_id = auth()->user()->id;
        $interpretationRequest->interpreter_id = $validatedData['interpreter_id'];
        $interpretationRequest->request_date = $validatedData['request_date'];
        $interpretationRequest->request_message = $validatedData['request_message'];
        $interpretationRequest->service = $validatedData['service'];
        $interpretationRequest->save();

//        dd($validatedData);

        // Send an email to the administrator
        $user = User::find(auth()->user()->id);
        $interpreter = Interpreter::find($validatedData['interpreter_id']);
        $datosSolicitud = [
            'user_id' => auth()->user()->id,
            'interpreter_id' => $validatedData['interpreter_id'],
            'request_date' => $validatedData['request_date'],
            'request_message' => $validatedData['request_message'],
            'nombre' => $user->name,
            'interprete' => $interpreter->interpreter_name,
            'service' => $validatedData['service'],
            'email' => $validatedData['email'],
            'telefono' => $validatedData['telefono'],
        ];


        Mail::to('laura.inclusiviapp@gmail.com')->send(new InterpretationRequestMail($datosSolicitud, $locale));
        $message = Lang::get('interpreters.mess_create');

        return back()->with('message_sent', $message);
    }



    /**
     * Display the specified resource.
     * @param int $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     * This function is used to display the interpretation request details
     */
    public function show($locale, $id)
    {
        // Get the interpretation request details
        $request = InterpretationRequest::find($id);

        // Check if the request exists
        if (!$request) {
            // If the request does not exist, redirect to the interpretation requests page with an error message
            return redirect()->route('admin.requests.index')->with('error', 'Solicitud no encontrada');
        }

        return view('admin.requests.show', compact('request'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     * This function is used to display the interpretation request details in the form
     */
    public function edit($locale, $id)
    {
        $request = InterpretationRequest::findOrFail($id);
        $request->requester_name = $request->user->name;

        // Obtener la lista de intérpretes según el servicio seleccionado
        $interpreters = Interpreter::where('service', $request->service)->get();

        // Obtener el intérprete previamente seleccionado
        $selectedInterpreter = $request->interpreter_id;

        return view('admin.requests.edit', compact('request', 'interpreters', 'selectedInterpreter'));
    }





    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * This function is used to update the interpretation request details in the database
     */
//    public function update(Request $request, $locale, $id)
//    {
//        // Validate the interpretation request details
//        $validatedData = $request->validate([
//            'user_id' => 'required',
//            'interpreter_id' => 'required',
//            'request_date' => 'required',
//            'request_message' => 'required',
//            'request_status' => 'required|in:pendiente,aceptada,rechazada',
//        ]);
//
//        // Find the interpretation request to update
//        $interpretationRequest = InterpretationRequest::findOrFail($id);
//
//        // Update the interpretation request details
//        $interpretationRequest->user_id = $request->user_id;
//        $interpretationRequest->interpreter_id = $request->interpreter_id;
//        $interpretationRequest->request_date = $request->request_date;
//        $interpretationRequest->request_message = $request->request_message;
//        $interpretationRequest->status = $request->request_status;
//        $interpretationRequest->save();
//
//        $message = Lang::get('interpreters.mess_update');
//
//        return redirect()->to(url('/' . $locale . '/solicitudes'))->with('success', $message);
//    }

    public function update(Request $request, $locale, $id)
    {
        // Validate the interpretation request details
        $validatedData = $request->validate([
            'original_user_id' => 'required',
            'interpreter_id' => 'required',
            'request_date' => 'required',
            'request_message' => 'required',
            'request_status' => 'required|in:pendiente,aceptada,rechazada',
        ]);

        // Find the interpretation request to update
        $interpretationRequest = InterpretationRequest::findOrFail($id);

        // Update the interpretation request details
        $interpretationRequest->user_id = $request->original_user_id; // Use the original user ID
        $interpretationRequest->interpreter_id = $request->interpreter_id;
        $interpretationRequest->request_date = $request->request_date;
        $interpretationRequest->request_message = $request->request_message;
        $interpretationRequest->status = $request->request_status;
        $interpretationRequest->save();

        $message = Lang::get('interpreters.mess_update');

        return redirect()->to(url('/' . $locale . '/solicitudes'))->with('success', $message);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * This function is used to delete the interpretation request details from the database
     */
    public function destroy($locale, $id)
    {
        // Get the interpretation request details from the database
        $interpretationRequest = InterpretationRequest::find($id);

        // Check if the request exists
        if (!$interpretationRequest) {
            // Manejar el caso si la solicitud no existe
            return redirect()->route('admin.requests.index')->with('error', 'Solicitud no encontrada');
        }

        // Delete the interpretation request details from the database
        $interpretationRequest->delete();

        $message = Lang::get('interpreters.mess_delete');

        return redirect()->route('admin.requests.index', app()->getLocale())->with('success', $message);


    }

}
