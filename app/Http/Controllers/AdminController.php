<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  VIEW CATEGORY
    public function index()
    {
<<<<<<< HEAD
        // $products = Auth::guard('user')->user()->product;
        $products = Product::all();
=======
        $products = Auth::guard('user')->user()->product;
>>>>>>> e64af6b (First Commit)
        $prodId = [];
        foreach ($products as $key => $product) {
            $prodId[$key] = $product->id;
        }
        
        $sales = ProductSale::whereIn('product_id', $prodId)->with('sale')->whereHas('sale', function($query) {
            $query->where('status', '>=', 3);
        })->get();

        $prod_sale = $sales->count();
        $grandTotal = 0;
        $customer = $sales->groupBy('sale_id')->count();

<<<<<<< HEAD

=======
>>>>>>> e64af6b (First Commit)
        foreach ($sales as $sale) {
            $grandTotal += $sale->sale->grand_total;
        }

<<<<<<< HEAD
        // dd($grandTotal."-".$prod_sale);

        $avg = 0;
        if ($grandTotal != 0 || $prod_sale != 0){
            $avg = $grandTotal/$prod_sale;
        } else {
            $avg = 0;
        }
=======
        $avg = $grandTotal/$prod_sale;
>>>>>>> e64af6b (First Commit)

        $data = array(
            'prod_sale' => $prod_sale,
            'grandTotal' => $grandTotal,
            'customer' => $customer,
            'avg' => $avg
        );

        return view('dashboard.index', $data, ['sales' => $sales->groupBy('sale_id')]);
    }

    public function category()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('dashboard.category', ['categories' => $categories]);
    }

    public function product($id)
    {
        $products = Category::findOrFail($id)->product;
        // dd($products);
        return view('dashboard.menu', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
