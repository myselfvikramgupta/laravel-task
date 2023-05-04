<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
class CategoryController extends Controller
{
   public function index(){
    return view("category.index");
   }
   public function add(Request $request){
    $request->validate([
        'name' => ['required', 'string', 'max:255']
    ]);
    $cat=$request->session()->has('cat') ? $request->session()->get('cat') : [];
    array_push($cat,$request->name);
    $request->session()->put('cat', $cat);
    return Redirect::route('categories');
   }
   public function addAll(Request $request){
        $allcat=$request->session()->get('cat');
        for($i=0;$i<count($allcat);$i++){
            $cat = Category::create([
                'name' => $allcat[$i]
            ]);
        }
        $request->session()->forget('cat');
        return Redirect::route('categories')->with('status', 'Added');
   }
}