<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\TreatmentType;
use App\DurationPrice   ;
use Storage;

class TreatmentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }

    public function index()
    {
        $treatment = Treatment::all();
        return view('treatment.index')->with('treatment',$treatment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $treatmenttypes = TreatmentType::all();
        return view('treatment.create')->with('treatmenttypes',$treatmenttypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        // Create Treatment
        $treatment = new Treatment;
        $treatment->name = $request->input('name');
        $treatment->description = $request->input('description');
        $product_category_name = $request->input('category');
        $treatment_type_name = $request->input('type');
        $treatmentType = TreatmentType::where('name', '=' ,$treatment_type_name)->firstOrFail();
        $treatment->treatment_type_id = $treatmentType->id;
        $treatment->save();
        $prices = $request->input('prices');
        $durations = $request->input('durations');
        for ($i=0; $i < count($prices); $i++) { 
            $durationPrice = new DurationPrice;
            $durationPrice->duration = $durations[$i];
            $durationPrice->price = $prices[$i];
            $durationPrice->treatment_id = $treatment->id;
            $durationPrice->save();
        }
        return redirect('/dashboard/treatments')->with('success', 'Treatment Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment= Treatment::find($id);
        return view('treatment.show')->with('treatment',$treatment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatment = Treatment::find($id);
        $treatmenttypes = TreatmentType::all();
        $durationPrices = $treatment->duration_prices; 
        return view('treatment.edit')->with('treatment',$treatment)->with('treatmenttypes',$treatmenttypes)->with('durationPrices',$durationPrices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        // Update Treatment
        $treatment = Treatment::find($id);
        $treatment->name = $request->input('name');
        $treatment->description = $request->input('description');
        $product_category_name = $request->input('category');
        $treatment_type_name = $request->input('type');
        $treatmentType = TreatmentType::where('name', '=' ,$treatment_type_name)->firstOrFail();
        $treatment->treatment_type_id = $treatmentType->id;
        $treatment->save();
        $durationPricesOld = $treatment->duration_prices;
        $durationPricesOld = DurationPrice::where('treatment_id', $treatment->id)->delete();
        $prices = $request->input('prices');
        $durations = $request->input('durations');
        for ($i=0; $i < count($prices); $i++) { 
            $durationPrice = new DurationPrice;
            $durationPrice->duration = $durations[$i];
            $durationPrice->price = $prices[$i];
            $durationPrice->treatment_id = $treatment->id;
            $durationPrice->save();
        }
        return redirect('/dashboard/treatments')->with('success', 'Treatment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $treatment = Treatment::find($id);
        $treatment->delete();
        return redirect('/dashboard/treatments')->with('success', 'Treatment Removed');
    }
}
