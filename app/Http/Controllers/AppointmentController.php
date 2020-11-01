<?php

namespace App\Http\Controllers;

use App\User;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        $doctor = User::all()->where('role', '=', 'doctor');

        // dd($doctor);
        return view('sante.rdv', compact('doctor'));
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'motif' => ['required', 'string', 'max:255'],
            'heure' => ['required'],
            'jour' => ['required', ],
            'to' => ['required', ],
            ]);
        $sta = 0;
        $user =   Appointment::create([
                    'motif' => $data['motif'],
                    'heure' => $data['heure'],
                    'jour' => $data['jour'],
                    'to' => $data['to'],
                    'from' => auth()->user()->name,
                    'phone' => auth()->user()->phone,
                    'email' => auth()->user()->email,
                    'status' => $sta
                ]);
        toastr()->success('Envoyer avec success');
        return redirect()->route('home');
    }

    public function changestatus($id, Request $request)
    {
        // dd($id);
        $rdv = Appointment::find($id);
        $data = ['name' => $rdv->name];
        $rdvupdate = $rdv;
        $rdvupdate->status = $request->status;
        $rdvupdate->save();
        if ($request->status == 1) {
            Mail::send('mail', $data, function ($message) {
                $message->to('Admin@gmail.com', 'Message')->subject('Information sur votre Demande');
                $message->from(auth()->user()->email, 'Virat Gandhi');
            });
        } elseif ($request->status == 2) {
            Mail::send('mail', $data, function ($message) {
                $message->to('Admin@gmail.com', 'Message')->subject('Information sur votre Demande');
                $message->from(auth()->user()->email, 'Virat Gandhi');
            });
        }
        return redirect()->route('prodil.index');
        // dd($rdv);
        // die();
        // return dd($id, $request->all());
        // $rdv->update()
    }
}
