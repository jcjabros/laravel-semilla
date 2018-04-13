<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeSlider;
class HomeSliderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'image1' => 'required',
            'image1' => 'image|nullable|max:1999',
            'image2' => 'image|nullable|max:1999',
            'image3' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image1')->storeAs('public/cover_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }
        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image2')->storeAs('public/cover_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }
        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image3')->storeAs('public/cover_images', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }
        // Create Home Siler
        $slider = new HomeSlider;
        $slider->image1 = $fileNameToStore1;
        $slider->image2 = $fileNameToStore2;
        $slider->image3 = $fileNameToStore3;
        $slider->save();
        return redirect('/')->with('success', 'Home Slider Created');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'image1' => 'required',
            'image1' => 'image|nullable|max:1999',
            'image2' => 'image|nullable|max:1999',
            'image3' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image1')->storeAs('public/cover_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }
        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image2')->storeAs('public/cover_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }
        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image3')->storeAs('public/cover_images', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }
        // Create Home Siler
        $slider = HomeSlider::find($id);
        if($request->hasFile('image1')){
        $slider->image1 = $fileNameToStore1;
        }
        if($request->hasFile('image2')){
        $slider->image2 = $fileNameToStore2;
        }
        if($request->hasFile('image3')){
        $slider->image3 = $fileNameToStore3;
        }
        $slider->save();
        return redirect('/dashboard/sliders')->with('success', 'Home Slider Updated');
    }
}
