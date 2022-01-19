<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Specification;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->middleware('can:administrador');
        $this->product = $product;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(8);
        return view('dashboard.product.index',compact('products'));
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $products = $this->product->search($request->filter);
        return view('dashboard.product.index',compact('products','filters'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::kebab($data['title']);

         //pega a imagem
         if($request->hasFile('image')){
            $image = $request->file('image');

            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();

            $upload = $image->storeAs('public/products',$nameImage);
            $data['image'] = $nameImage;
        }


        Product::create($data);
        return redirect()->route("product");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function confirmeDeleteProduct($id){
        $product = Product::find($id);
        return response()->json(["product" => $product]);
    }

    public function delete($id){
        $product = Product::find($id);
        Storage::disk('local')->delete('products/'.$product->image);
        $product->delete();
        return redirect()->route("product");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('dashboard.product.create',compact('product','categories'));
    }

    public function editar($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.editar',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = Str::kebab($data['title']);

        

        //pega a imagem
        if($request->hasFile('image')){

            
            $image = $request->file('image');
            
            if (Storage::exists($image)) {
                Storage::delete($image);
            }

           $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();

           $upload = $image->storeAs('public/products',$nameImage);
           
           $data['image'] = $nameImage;
       }
        $product->update($data);
        return redirect()->route("product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function showSpecification($id){
        $product = Product::find($id);
        $specifications = $product->specifications;
        return view("dashboard.specification.index",compact("product","specifications"));
    }

    public function newSpecification($id){
        $product = Product::find($id);
        $specifications = $product->specifications;
        return view("dashboard.specification.create",compact("product"));
    }

    public function storeSpecification(Request $request){
        Specification::create($request->all());
        return redirect()->route("product.showSpecification",$request->product_id);
    }

    public function editSpecification($id){
        $specification = Specification::find($id);
        return view("dashboard.specification.edit",compact("specification"));
    }

    public function deleteSpecification($id){
        $specification =  Specification::find($id);
        $product = $specification->product;
        $specification->delete();
        return redirect()->route("product.showSpecification",$product->id);
    }

    public function updateSpecification(Request $request, $id){
        $specification =  Specification::find($id);
        $specification->update($request->all());
        return redirect()->route("product.showSpecification",$specification->product->id);
    }

}
