<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();
        $tests = DB::table('tests')->get();
        dd($tests);
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        // chunks() ひとまとまりにする
        $chunks = $collection->chunk(6);
        $chunks->toArray();

        // var_dump($chunks);
        return view('tests.test', ['values'=>$values, 'chunks'=>$chunks]);
    }
}
