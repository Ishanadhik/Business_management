<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{

    public function home(){
        $data=[
        'name'=>'Ankit',
        'age'=>17
        ];
        return view('welcome')->with($data);
    }

    public function profile(){
        return view(view:'profile');
        $data=[
        'username'=>'Ankitsapkota'
        ];
        return view('profile')->with($data);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
        'product_name'=>'required',
        'product_price'=>'required',
        'product_quantity'=>'required',
        'Date_added'=>'required'
        ]);

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
       $product= Product::where('id',$id)->first();
     }

     public function update(){
       $product= Product::where('id',$id)->first();
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

    public function delete($id){

    $product= Product::where('id',$id)->first();
    if(File::exists('storage/image/' .$product->image)){
        File::delete('storage/image/' .$product->image);
    }
    $product->delete();
    return redirect(to:'/list');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/list');
    }

    public function registor(){

        return view('register');
    }



    public function login(){
    return view('login');
    }

    public function loginForm(Request $request){
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            return redirect("list");
        }else{
            return 'wrong credentials';
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
