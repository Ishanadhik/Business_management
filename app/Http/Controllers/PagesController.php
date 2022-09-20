<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PagesController extends Controller
{

    public function home(){
        $data=[
        'name'=>'ishan',
        'age'=>17
        ];
        return view('welcome')->with($data);
    }

    public function profile(){
        return view(view:'profile');
        $data=[
        'username'=>'ishanadhikari'
        ];
        return view('profile')->with($data);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
     $product = new Product();
     $product->product_name =$request->product_name;
     $product->product_price =$request->product_price;
     $product->product_quantity =$request->product_quantity;
     $product->Date_added =$request->Date_added;
     $img = Image::make($request->file('image'));
     $filename = $request->file('image')->getClientOriginalName();
     $img->save('storage/image/'.$filename);
     $product->image=$filename;
     $product->save();
     return redirect('/list');
     return 'Saved';
     }

     public function list(){
        $product = Product::get();
        return view('list')->with('product',$product);
     }

     public function edit($id){
       $product= products::where('id',$id)->first();
     }

     public function update(){
       $product= products::where('id',$id)->first();
       $product->product_name =$request->product_name;
            $product->product_price =$request->product_price;
            $product->product_quantity =$request->product_quantity;
            $product->Date_added =$request->Date_added;
            $img = Image::make($request->file('image'));
            $filename = $request->file('image')->getClientOriginalName();
            $img->save('storage/image/'.$filename);
            $product->image=$filename;
            $product->save();
            return redirect('/list');
            return 'Saved';
     }

}
