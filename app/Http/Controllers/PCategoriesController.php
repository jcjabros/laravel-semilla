<?php

namespace App\Http\Controllers;
use App\PCategory;
use App\Product;
use Illuminate\Http\Request;
use Storage;

class PCategoriesController extends Controller
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
        $categories = PCategory::all();
        return view('pcategories.index')->with('name','CATALOG')->with('categories',$categories);
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = PCategory::find($id);
        if($category->children->count() > 0 ){
            $categories = $category->children;
            return view('pcategories.index')->with('categories',$categories)->with('name',$category->name);
        }
        $products = $category->products;
        return view('pcategories.products')->with('products',$products)->with('name',$category->name);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        return view('pcategories.create')->with('categories',PCategory::all());
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
            'size' => 'required',
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
        // Create Category
        $pCategory = new PCategory;
        $pCategory->name = $request->input('name');
        $pCategory->sizes = $request->input('size');
        $pCategory->description = $request->input('description');
        $pCategory->cover_image = $fileNameToStore;
        if($request->input('parent')!='None'){
            $parent = PCategory::find($request->input('parent'));
            $pCategory->parent_id = $parent->id;
        }
        else{
        $pCategory->parent_id = '0';
        }
        $pCategory->save();
        return redirect('/dashboard/categories')->with('success', 'Category Created');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $pCategory=PCategory::find($id);
     return view('pcategories.edit')->with('pCategory',$pCategory);
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
            'size' => 'required',
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
        // Update Category
        $pCategory = PCategory::find($id);
        $pCategory->name = $request->input('name');
        $pCategory->sizes = $request->input('size');
        $pCategory->description = $request->input('description');
        if($request->hasFile('cover_image')){
            Storage::delete('public/cover_images/' . $pCategory->cover_image);
            $pCategory->cover_image = $fileNameToStore;
        }
        $pCategory->save();
        return redirect('/dashboard/categories')->with('success', 'Category Updated');
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
        $pCategory = PCategory::find($id);
        if($pCategory->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$pCategory->cover_image);
        }
        
        $pCategory->delete();
        return redirect('/dashboard/categories')->with('success', 'Category Removed');
    }
}
