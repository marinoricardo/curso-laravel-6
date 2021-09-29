<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    protected $request;
    public function __contruct(Request $request){
        $this->request = $request;
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
        if($request->file('photo')->isValid()){
            $nameFile = $request->nome . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }
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
        //
        return view('admin.pages.products.edit', compact('id'));
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
        //
        dd('Editando produto...');
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
    }
}
