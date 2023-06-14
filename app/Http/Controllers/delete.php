<?php

namespace App\Http\Controllers;
use App\del;
use Illuminate\Http\Request;

class delete extends Controller
{
	public function delete(Request $req)
	{
		$del=del::find($req->id);
		echo $del->delete();

		return redirect('home');
	}
}
