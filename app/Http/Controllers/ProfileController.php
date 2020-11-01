<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::where('user_id', '=', Auth::id())->get();
        $rdvs = Appointment::all()->where('to', '=', auth()->user()->id);
        // dd($rdvs);
        return view('profile.index', ['profiles' => $profiles, 'rdvs' => $rdvs]);
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'programme' => ['required'],
            'heure_on' => ['required', ],
            'heure_fm' => ['required', ],
            'specialite' => ['required', 'string',],
            'hopital' => ['required', 'string'],
            'status' => ['required', 'string'],
            'ville' => ['required', 'string'],
            'quatier' => ['required', 'string'],
            'avatar' => ['required', 'file']
            ]);
        $programme = $request->all();
        $prog['programme'] = json_encode($programme['programme']);
        $p = serialize($prog);
        $a  = $request->file('avatar');
        $filename = uniqid().'-'.$a->getClientOriginalName();
        $a->move(public_path().'/uploads/', $filename);


        Profile::create([
            'description' => $data['description'],
            'programme' => $p,
            'heure_ou' => $data['heure_on'],
            'heure_fm' => $data['heure_fm'],
            'specialite' => $data['specialite'],
            'hopital' => $data['hopital'],
            'status' => $data['status'],
            'ville' => $data['ville'],
            'quatier' => $data['quatier'],
            'avatar' => $filename,
            'user_id' => auth()->user()->id
        ]);

        toastr()->success('Mise a jour Resussite!!!😃');

        return redirect('/home');
    }
    public function profile()
    {
        return view('profile.store');
    }

    public function update()
    {
        return view('profile.update');
    }

    public function delete($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        toastr()->success('Suppresion avec Success');

        return redirect('/home');
    }

    public function updated(Request $request)
    {
        $data = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'programme' => ['required'],
            'heure_on' => ['required', ],
            'heure_fm' => ['required', ],
            'specialite' => ['required', 'string',],
            'hopital' => ['required', 'string'],
            'status' => ['required', 'string'],
            'ville' => ['required', 'string'],
            'quatier' => ['required', 'string'],
            'avatar' => ['required', 'file']
            ]);
        $programme = $request->all();
        $prog['programme'] = json_encode($programme['programme']);
        $element = serialize($prog);
        $p = serialize($prog);
        $a  = $request->file('avatar');
        $filename = uniqid().'-'.$a->getClientOriginalName();
        $a->move(public_path().'/uploads/', $filename);


        Profile::updated([
            'description' => $data['description'],
            'programme' => $p,
            'heure_ou' => $data['heure_on'],
            'heure_fm' => $data['heure_fm'],
            'specialite' => $data['specialite'],
            'hopital' => $data['hopital'],
            'status' => $data['status'],
            'ville' => $data['ville'],
            'quatier' => $data['quatier'],
            'avatar' => $filename,
            'user_id' => auth()->user()->id
        ]);

        toastr()->success('Mise a jour Resussite!!!😃');

        return redirect('/home');
    }
}
