<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Storage;
use App\User;
class GalleryController extends Controller
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
        $gallery  = Gallery::orderby('created_at','desc')->paginate(15);
        return  view('gallery.index')->with('gallery',$gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['administrator','employee', 'manager']);
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
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
        // Create Gallery
        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('body');
        $gallery->image = $fileNameToStore;
        $gallery->save();
        return redirect('/gallery')->with('success', 'Image added to gallery.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     auth()->user()->authorizeRoles(['administrator','employee', 'manager']);
     $image=Gallery::find($id);
     return view('gallery.edit')->with('image',$image);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
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
        }
        // Update Image
        $gallery = Gallery::find($id);
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('body');
        if($request->hasFile('cover_image')){
            Storage::delete('public/cover_images/' . $post->cover_image);
            $gallery->cover_image = $fileNameToStore;
        }
        $gallery->save();
        return redirect('/gallery')->with('success', 'Image Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->authorizeRoles(['administrator','employee', 'manager']);
        $image = Gallery::find($id);
        if($image->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$image->image);
        }
        
        $image->delete();
        return redirect('/gallery')->with('success', 'Image Removed');
    }
}
