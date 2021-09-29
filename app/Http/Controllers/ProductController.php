<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    private $repository;
    public function __contruct(Request $request, Product $product){
        $this->request = $request;
        $this->repository = $product;
        // $this->user = $user;
        // $this->middleware('auth');
        // $this->middleware('auth')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products = Product::all();
        $products = Product::paginate(10);
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        // Capturar valores usando um request
        // dd($request->all()); // pegar todos os dados
        // dd($request->only(['nome'])); // pegar dados especificos
        // dd($request->input('nome'));
        // dd($request->except('_token'));
        // dd();
        // $request->validate([
        //     'nome' => 'required | min:3 | max:250',
        //     'descricao' => 'required | min:3 | max:250',
        //     'photo' => 'required | image',
        // ]);
        // dd('Ok');
        // if($request->file('photo')->isValid()){
        //     $nameFile = $request->nome . '.' . $request->photo->extension();
        //     dd($request->file('photo')->storeAs('products', $nameFile));
        // }
        $data = $request->only('name', 'price', 'description');

        if($request->hasFile('image') && $request->image->isValid()){
            // dd('aasas');
            // $nameFile = $request->name . '.' . $request->image->extension();
            // dd($request->file('image')->storeAs('products', $nameFile));
            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }
        

        Product::create($data); // uma das formas de criar o produto

        return redirect()->route('products.index');
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
        // $product = Product::where('id',$id)->first();

        // $product = Product::find();
        if(!$product = Product::find($id))
            return redirect()->back();
        
        return view('admin.pages.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(!$product = Product::find($id))
        return redirect()->back();

        return view('admin.pages.products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        //
        if(!$product = Product::find($id))
        return redirect()->back();
        $data = $request->all();

        
        if($request->hasFile('image') && $request->image->isValid()){
            // dd('aasas');
            // $nameFile = $request->name . '.' . $request->image->extension();
            // dd($request->file('image')->storeAs('products', $nameFile));

            // verificar se existe imagem antiga
            if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
            }
            
            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $product->update($data);
        // $product->update($request->all());
        return redirect()->route('products.index');

        // dd("Editando produto...{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $product = $this->repository->where('id',$id)->first();
        $product = Product::find($id);

        if(!$product)
            return redirect()->back();
        
        if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $products = $this->repository->search($request->filter);
    }
}
