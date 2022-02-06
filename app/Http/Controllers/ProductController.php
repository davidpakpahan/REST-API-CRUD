<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json(['pesan' => 'Semua pencarian data', 'products'=> $product],200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return response()->json(['pesan' => 'Produk berhasil ditambahkan'], 200);
    }

    public function show($productId)
    {
        $product = Product::find($productId);
        if($product)
        {
            return response()->json(['products' => $product], 200);
        } else
        {
            return response()->json(['pesan' => 'Data tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191',
        ]);

        $product = Product::find($productId);
        if($product)
        {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->update();

            return response()->json(['pesan' => 'Produk berhasil di update'], 200);
        } else
        {
            return response()->json(['pesan' => 'Produk tidak ditemukan'], 404);
        }
    }

    public function delete($productId)
    {
        $product = Product::find($productId);
        if($product)
        {
            $product->delete();
            return response()->json(['pesan' => 'Produk berhasil di hapus'], 200);
        } else
        {
            return response()->json(['pesan' => 'Produk tidak ditemukan'], 404);
        }
        
    }
}
