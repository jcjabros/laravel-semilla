<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeforenAfter;
use Storage;
class BeforenAfterController extends Controller
{
    public function show(){
        $BnASliders = BeforenAfter::all();
        return view('pages.beforenafter')->with('BnASliders',$BnASliders);
    }


    public function store(Request $request){
        $this->validate($request, [ 
            'description' => 'required',
            'before-img' => 'required|image|nullable|max:1999',
            'after-img' => 'required|image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('before-img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('before-img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('before-img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('before-img')->storeAs('public/before_after_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }
        if($request->hasFile('after-img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('after-img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('after-img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('after-img')->storeAs('public/before_after_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }
        // Create B/A Siler
        $slider = new BeforenAfter;
        $slider->title = $request->input('description');
        $slider->before_img = $fileNameToStore1;
        $slider->after_img = $fileNameToStore2;
        $slider->save();
        return redirect('/dashboard/beforenafter')->with('success', 'Before & After Created');
    }

    public function destroy($id){
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $slider = BeforenAfter::find($id);
        if($slider->before_img != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/before_after_images/'.$slider->before_img);
        }
        if($slider->after_img != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/before_after_images/'.$slider->after_img);
        }
        
        $slider->delete();
        return redirect('/dashboard/beforenafter')->with('success', 'Before & After Removed');
    }
}
