<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Laracasts\Flash\Flash;
use App\Helpers\APIHelpers;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $products = $this->productRepository->paginate(10);
        // $products=Product::all();
        // $response=APIHelpers::createAPIResponse(false, 200, '',$products);
        // return response()->json($response,200);

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->cat_id=$request->cat_id;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->total= $request->quantity*$request->price;
        $product->remarks=$request->remarks;
        $product_save=$product->save();
        if($product_save){
            Flash::success('Product saved successfully.');
            return redirect(route('products.index'));
        //   $response=APIHelpers::createAPIResponse(false, 201, 'Product Added Successfully',null);
        //   return redirect(route('products.index'))->response()->json($response,200);
        }else{
            $response=APIHelpers::createAPIResponse(true, 400, 'Product Creation Failed',null);
            return redirect(route('products.index'))->response()->json($response,400);
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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('product not found');

            return redirect(route('products.index'));
        }

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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('product not found');

            return redirect(route('products.index'));
        }
        $product =Product::find($id);
        $product->name=$request->name;
        $product->cat_id=$request->cat_id;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->total=$request->price*$request->quantity;
        $product->remarks=$request->remarks;
        $product_update=$product->save();
        if($product_update){
            Flash::success('Product updated successfully.');
            return redirect(route('products.index'));
        //     $response=APIHelpers::createAPIResponse(false, 201, 'Product Update Successfully',null);
        //     return response()->json($response,200);
        }else{
            $response=APIHelpers::createAPIResponse(true, 400, 'Product Update Failed',null);
            return response()->json($response,400);
        }
        
        // $product = $this->productRepository->update($request->all(), $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product =Product::find($id);
        // $product_delete= $product->delete();
        // if($product_delete){
        //     $response=APIHelpers::createAPIResponse(false, 201, 'Product Delete Successfully',null);
        //     return response()->json($response,200);
        // }else{
        //     $response=APIHelpers::createAPIResponse(true, 400, 'Product Delete Failed',null);
        //     return response()->json($response,400);
        // }
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('product deleted successfully.');

        return redirect(route('products.index'));

    }
}
