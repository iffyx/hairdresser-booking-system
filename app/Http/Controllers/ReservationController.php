<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->paginate(5);
        return view('reservations.index',compact('reservations'))->with('i', (request()->input('page', 1) - 1) * 5);
        /*$services = Service::pluck('name', 'id');
        $time = DB::table('reservations')->select('date','time')->get();

        return view('create-reservation', compact('services', 'time'));*/
    }



    public function create(){
        $services = Service::pluck('name', 'id');
        $time = DB::table('reservations')->select('date','time')->get();
        return view('reservations.create', compact('services', 'time'));
    }


    public function store(Request $request, $bool){
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'mobile' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
            ->with('success','Product created successfully.');
    }


    public function edit(Reservation $reservation){
        return view('reservations.edit',compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation){
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'mobile' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);


        $reservation->update($request->all());


        return redirect()->route('reservations.index')
            ->with('success','Rezerwacja edytowana prawidłowo');
    }

    public function destroy(Reservation $reservation){
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success','Rezerwacja usunięta prawidłowo');
    }

    public function createReservation()
    {
        $services = Service::pluck('name', 'id');
        $time = DB::table('reservations')->select('date','time')->get();

        return view('create-reservation', compact('services', 'time'));
    }

    public function store2(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'mobile' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        Reservation::create($request->all());
        $services = Service::pluck('name', 'id');
        $time = DB::table('reservations')->select('date','time')->get();
        return view('create-reservation', compact('services', 'time'));
        /*return redirect()->route('reservations.index')
            ->with('success', 'Rezerwacja wykonana prawidłowo');*/
    }

}
