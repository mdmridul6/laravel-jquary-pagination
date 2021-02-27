<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('index');
    }

   public function getMore(Request $request)
   {

    if ($request->key=== null) {
        if ($request->ajax()) {
            $blogs=blog::paginate($request->length);
            return response()->json($blogs);


           }
    } else {
        if ($request->ajax()) {
            $blogs=blog::where('title', 'like', '%'.$request->key.'%')->paginate($request->length);
            return response()->json($blogs);


           }
    }


   }


   public function getall()
   {
    $blogs=blog::all();
    return response()->json($blogs);
   }

}
