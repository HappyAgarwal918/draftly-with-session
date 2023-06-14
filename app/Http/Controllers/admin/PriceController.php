<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\price;

class PriceController extends Controller
{

     public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Price.Price');
        }
    }

    public function edit()
    {
    	return view('admin.Price.EditPrice');
    }

    public function editPrice(Request $req)
    {
        $id = $req -> id;

    	$price = price::where('id', $id)->first();
    	$price -> price = $req -> price;
        $price -> deal_price = $req -> deal_price;

    	$price -> save();

    	return view('admin.Price.Price')->with('success','Price Changed Successfully');
    }

}