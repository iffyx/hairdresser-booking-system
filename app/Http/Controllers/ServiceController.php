<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /*public function index()
    {
        $services = DB::table('services')->get();

        return view('price-list', compact('services'));
    }*/

    public function priceList()
    {
        $services = DB::table('services')->get();

        return view('price-list', compact('services'));
    }

    public function index()
    {
        $services = Service::latest()->paginate(5);


        return view('services.index',compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('services.create');
    }


    public function store(Request $request){
        request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);


        Service::create($request->all());


        return redirect()->route('services.index')
            ->with('success','Product created successfully.');
    }

    public function show(Service $service)
    {
        return view('services.show',compact('service'));
    }


    public function edit(Service $service){
        return view('services.edit',compact('service'));
    }

    public function update(Request $request, Service $service){
        request()->validate([
            'name' => 'required',
            'price' => 'required',
        ]);


        $service->update($request->all());


        return redirect()->route('services.index')
            ->with('success','Product updated successfully');
    }


    public function destroy(Service $service){
        $service->delete();


        return redirect()->route('services.index')
            ->with('success','Product deleted successfully');
    }
}
