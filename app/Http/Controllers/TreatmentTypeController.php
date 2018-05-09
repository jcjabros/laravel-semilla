<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TreatmentType;
use Storage;

class TreatmentTypeController extends Controller
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
        $treatmentTypes = TreatmentType::all();
        return view('treatmenttype.index')->with('treatmentTypes',$treatmentTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        return view('treatmenttype.create');
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
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Rreatment Type
        $treatmentType = new TreatmentType;
        $treatmentType->name = $request->input('name');
        $treatmentType->description = $request->input('description');
        $treatmentType->cover_image = $fileNameToStore;
        $treatmentType->save();
        return redirect('/dashboard/treatmenttypes')->with('success', 'Treatment Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatmentType = TreatmentType::find($id);
        $treatments = $treatmentType->treatments;
        return view('treatmenttype.show')->with('treatments',$treatments)->with('treatmentType',$treatmentType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatmentType = TreatmentType::find($id);
        return view('treatmenttype.edit')->with('treatmentType',$treatmentType);
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
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Rreatment Type
        $treatmentType = TreatmentType::find($id);
        $treatmentType->name = $request->input('name');
        $treatmentType->description = $request->input('description');
        if($request->hasFile('cover_image')){
            Storage::delete('public/cover_images/' . $treatmentType->cover_image);
            $treatmentType->cover_image = $fileNameToStore;
        }
        $treatmentType->save();
        return redirect('/dashboard/treatmenttypes')->with('success', 'Treatment Type Updated');
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
        $treatmentType = TreatmentType::find($id);
        if($treatmentType->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$treatmentType->cover_image);
        }
        
        $treatmentType->delete();
        return redirect('/dashboard/treatmenttypes')->with('success', 'Treatment Type Removed');
    }
}
