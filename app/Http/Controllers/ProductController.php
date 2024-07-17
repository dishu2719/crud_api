<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function saveProduct(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),
        [
            'name'=> "required",
            'description'=> "required",
            'selling_price'=>"required",
            'qty'   => 'required',
            'price'=> 'required',
            'stock'=> 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 400);
        }
      
        $name = $request->input('name');
        $description = $request->input('description');
        $selling_price=$request->input('selling_price');
        $qty= $request->input('qty');
        $price= $request->input('price');
        $stock= $request->input('stock');

        $result = Product::insert([
            'name'=> $name,
            'description'=> $description,
            'selling_price'=> $selling_price,
            'qty'=> $qty,
            "price"=>$price,
            "stock"=>$stock
        ]);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message'=> 'Product Created Successfully.',
                'data' => $result
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message'=> 'Something went wrong,please try again.',
                'data' => $result
                
            ], 400);
        }
    }

    public function getProducts(Request $request)
    {
        $data=Product::get();
        if($data)
        {
            return response()->json([
                'status' => 'success',
                'message'=> 'All Products Get Successfully.',
                'data' => $data
            ], 200);

        }else{
            return response()->json([
                'status' => 'error',
                'message'=> 'Not Product Found.!',
                'data' => $data
                
            ], 400);
        }
    }

    public function deleteProduct($id)
    {
        // $result = Product::destroy($id);
        $result = Product::where('id',$id)->delete();
        if ($result)
        {
            return response()->json([
                'status' => 'success',
                'message'=> 'Product Deleted Successfully.',
                'data' => $result
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message'=> 'Something went wrong,please try again.',
                'data' => $result
                
            ], 400);
        }
    }

    public function updateProduct(Request $request,$id)
    {
       
        $validator = Validator::make($request->all(),
        [
            'name'=> "required",
            'description'=> "required",
            'selling_price'=>"required",
            'qty'   => 'required',
            'price'=> 'required',
            'stock'=> 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 400);
        }
      
        $name = $request->input('name');
        $description = $request->input('description');
        $selling_price=$request->input('selling_price');
        $qty= $request->input('qty');
        $price= $request->input('price');
        $stock= $request->input('stock');

        $result = Product::where('id',$id)->update([
            'name'=> $name,
            'description'=> $description,
            'selling_price'=> $selling_price,
            'qty'=> $qty,
            "price"=>$price,
            "stock"=>$stock
        ]);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message'=> 'Product Updated Successfully.',
                'data' => $result
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message'=> 'Something went wrong,please try again.',
                'data' => $result
                
            ], 400);
        }
    }

}
