<?php

namespace App\Http\Controllers;
use App\Product;
use App\PCategory;
use Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        auth()->user()->authorizeRoles(['administrator', 'manager']); 
        $products = Product::orderby('p_category_id')->paginate(10);
        return view('products.index')->with('products',$products); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['administrator', 'manager']);
        $categories = PCategory::all();
        return view('products.create')->with('categories',$categories);
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
            'name' => 'required',
            'code' => 'required',
            'size' => 'required',
            'description' => 'required',
            'cover_image1' => 'required',
            'cover_image1' => 'image|nullable|max:1999',
            'cover_image2' => 'image|nullable|max:1999',
            'cover_image3' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image1')->storeAs('public/cover_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }
        if($request->hasFile('cover_image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image2')->storeAs('public/cover_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }
        if($request->hasFile('cover_image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image3')->storeAs('public/cover_images', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }
        // Create Product
        $product = new Product;
        $product->name = $request->input('name');
        $product->size = $request->input('size');
        $product->productCode = $request->input('code');
        $product->description = $request->input('description');
        $product_category_name = $request->input('category');
        $category = PCategory::where('name', '=' ,$product_category_name)->firstOrFail();
        $product->p_category_id =$category->id ;
        $product->cover_img1 = $fileNameToStore1;
        $product->cover_img2 = $fileNameToStore2;
        $product->cover_img3 = $fileNameToStore3;
        $product->price=$request->input('price');
        $product->save();
        return redirect('/product')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
     return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = PCategory::all();
        $category = PCategory::find($product->p_category_id);
        return view('products.edit')->with('product',$product)->with('categories',$categories)->with('category',$category);
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
            'name' => 'required',
            'code' => 'required',
            'size' => 'required',
            'description' => 'required',
            'cover_image1' => 'required',
            'cover_image1' => 'image|nullable|max:1999',
            'cover_image2' => 'image|nullable|max:1999',
            'cover_image3' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image1')->storeAs('public/cover_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }
        if($request->hasFile('cover_image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image2')->storeAs('public/cover_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }
        if($request->hasFile('cover_image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image3')->storeAs('public/cover_images', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }
        // Update Product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->size = $request->input('size');
        $product->productCode = $request->input('code');
        $product->description = $request->input('description');
        $product_category_name = $request->input('category');
        $category = PCategory::where('name', '=' ,$product_category_name)->firstOrFail();
        $product->p_category_id =$category->id ;
        if($request->hasFile('cover_image1')){
            Storage::delete('public/cover_images/' . $product->cover_img1);
            $product->cover_img1 = $fileNameToStore1;
        }
        if($request->hasFile('cover_image2')){
            Storage::delete('public/cover_images/' . $product->cover_img2);
            $product->cover_img2 = $fileNameToStore2;
        }
        if($request->hasFile('cover_image3')){
            Storage::delete('public/cover_images/' . $product->cover_img3);
            $product->cover_img3 = $fileNameToStore3;
        }
        $product->price=$request->input('price');
        $product->save();
        return redirect('dashboard/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->cover_img1 != 'noimage.jpg'){
            // Delete Image 1
            Storage::delete('public/cover_images/'.$product->cover_img1);
        }
        if($product->cover_img2 != 'noimage.jpg'){
            // Delete Image 2
            Storage::delete('public/cover_images/'.$product->cover_img2);
        }
        if($product->cover_img2 != 'noimage.jpg'){
            // Delete Image 3
            Storage::delete('public/cover_images/'.$product->cover_img3);
        }
        
        $product->delete();
        return redirect('/product')->with('success', 'Product Removed');
    }
}
