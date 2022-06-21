<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_sale = Auth::guard('user')->user()->prodSale()->whereNull('sale_id')->orderBy('id', 'desc')->get();

        return view('sale.index', ['product_sale' => $product_sale]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = Sale::max('id');
        $sale = "MACHPS-00".$codes+1;

        return view('sale.create', ['sale' => $sale]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {    
            $datas = $request->all();
            $grand_total = 0;
            foreach ($datas['price'] as $price) {
                $grand_total += $price;
            }
            $data['ref_no'] = "MHCIP-".now()->timestamp;
            $data['status'] = 0;
            $data['grand_total'] = $grand_total;
            $data['user_id'] = Auth::guard('user')->user()->id;
            $create = Sale::create($data);
    
            foreach ($datas['id'] as $idProdSale) {
                $dataProdSale['sale_id'] = $create->id;
                $prodSale = ProductSale::findOrFail($idProdSale)->update($dataProdSale);
            }         
    
            return redirect()->route('invoice', [$create->id])->with('success', 'Berhasil input data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sale.edit', ['sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sale $sale)
    {
        try {    
            $data = $request->all();
            $sale->update($data);
    
            return redirect()->route('invoice', [$sale->id])->with('success', 'Berhasil edit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    public function job(Request $request, sale $sale)
    {
        try {    
            $data = $request->all();
            $sale->update($data);
    
            return redirect()->back()->with('success', 'Berhasil edit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        try {
            $sale->delete();
    
            return redirect()->route('sale.index')->with('success', 'Berhasil delete data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    public function addCart(Request $request)
    {
        try {   
            $data = $request->all();
            $product = Product::findOrFail($data['product_id'])->price;
            $data['total'] = $product * $data['qty'];
            $data['user_id'] = Auth::guard('user')->user()->id;
            unset($data['_token']);
            $create = ProductSale::create($data);
    
            return response()->json(['status' => 'Berhasil input data']);
        } catch (\Exception $e) {
            return response()->json(['status' => $e->getMessage()]);
        }
    }

    public function todoPesanan()
    {
        $products = Auth::guard('user')->user()->product;
        $prodId = [];
        foreach ($products as $key => $product) {
            $prodId[$key] = $product->id;
        }
        
        $sales = ProductSale::whereIn('product_id', $prodId)->with('sale')->whereHas('sale', function($query) {
            $query->where('status', '<=', 4);
        })->get()->groupBy('sale_id');
        
        return view('sale.pesanan', ['sales' => $sales]);
    }

    public function todoPesananSaya()
    {
        $product_sale = Auth::guard('user')->user()->prodSale()->orderBy('id', 'desc')->get();
        $prodId = [];
        foreach ($product_sale as $key => $product) {
            $prodId[$key] = $product->product_id;
        }
        
        $sales = ProductSale::where('user_id', Auth::guard('user')->user()->id)->with('sale')->whereHas('sale', function($query) {
            $query->whereNotNull('status');
            $query->orderBy('status', 'asc');
        })->get()->groupBy('sale_id');
        
        return view('sale.pesananSaya', ['sales' => $sales]);
    }

    public function invoice($id)
    {
        $sale = Sale::findOrFail($id);

        return view('sale.invoice', ['sale' => $sale]);
    }

    public function ulasan(Request $request)
    {
        try {    
            $data = $request->all();
            $data['user_id'] = Auth::guard('user')->user()->id;
            $create = Ulasan::create($data);       
            
    
            $sale = Sale::findOrFail($data['sale_id']);
            $sale->status = 4;
            $sale->save();
            return redirect()->route('todoPesananSaya')->with('success', 'Berhasil input data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    public function buktiPembayaran(Request $request)
    {
        $data = $request->all();
        $files = $request->file('file');
        if ($files) {
            $file = $files->store('bukti_pembayaran', 'public');
            $data['file'] = $file;
        }
        $data['user_id'] = Auth::guard('user')->user()->id;
        $create = BuktiPembayaran::create($data);       
        try {    
            
            return redirect()->route('todoPesananSaya')->with('success', 'Berhasil input data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    public function prodSaleDestroy($id)
    {
        try {
            $prodSale = ProductSale::findOrFail($id)->delete();
    
            return redirect()->back()->with('success', 'Berhasil delete data');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
