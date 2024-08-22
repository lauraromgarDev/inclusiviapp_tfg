<?php
namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @return Application|Factory|View
     * This function is used to show the contact page
     */
    public function contact($locale)
    {
        return view('emails.contact');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * This function is used to send the contact email
     */
    public function sendEmail(Request $request, $locale)
    {
        //validate the contact form fields
        $details = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        //send the contact email
        Mail::to('laura.inclusiviapp@gmail.com')->send(new ContactMail($details));

        // Obtener el mensaje de éxito traducido
        $successMessage = Lang::get('contact.message_sent');

        // Redirigir a la página de contacto con el mensaje de éxito
        return back()->with('message_sent', $successMessage);
    }
}
