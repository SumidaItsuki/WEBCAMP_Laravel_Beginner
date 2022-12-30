<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('test.index');
    }

    /**
     * 入力を受け取る
     * 
     * @return \Illuminate\View\View
     */
    public function input(Request $request)
    {
        // データの取得＋validate
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'max:72'],
        ]);

        //
        var_dump($validatedData); exit;
        
        //return view('test.input');
    }
}