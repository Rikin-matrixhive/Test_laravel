<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();

        return view('products', [
            'categories' => $categories, 'subcategories' => $subcategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new Product();
        $input->pname = $request->input('pname');
        $input->category = $request->input('category');
        $input->subcategory = $request->input('subcategory');
        $input->price = $request->input('price');
        if ($request->hasfile('pic')) {
            $file = $request->file('pic');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $input->pic = $filename;
        }
        $input->desc = $request->input('desc');
        $input->status = $request->input('status');
        $input->quantity = $request->input('quantity');
        $input->save();
        return redirect('list')->with('message','Data Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $productdata = Product::all();
        return view('list',['productdata'=>$productdata]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = Product::find($id);
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        return view('update', ['updatedata'=> $editdata,'categories'=>$categories,'subcategories'=>$subcategories]);    
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
        $update = Product::find($id);
        $update->pname = $request->input('pname');
        $update->category = $request->input('category');
        $update->subcategory = $request->input('subcategory');
        $update->price = $request->input('price');
        if ($request->hasfile('pic')) {
            $file = $request->file('pic');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $update->pic = $filename;
        }
        $update->desc = $request->input('desc');
        $update->status = $request->input('status');
        $update->quantity = $request->input('quantity');
        $update->update();
        return redirect('list')->with('message','Data Updated!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedata = Product::find($id);
        $deletedata->delete();
        return redirect('list')->with('message','Data Deleted!!');


    }

    // for getting category in select tag
    public function getCategory(Request $request)
    {
        $category = DB::table('categories')
            ->get();

        return view('dropdown', compact('categories'));
    }

    // for getting subcategory in select tag

    public function getsubCategory(Request $request)
    {
        $subcategory = DB::table('subcategories')
            ->where('category_id', $request->category_id)
            ->get();

        if (count($subcategory) > 0) {
            return response()->json($subcategory);
        }   
    }
}
