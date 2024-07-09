<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $memos = Memo::where('user_id', $user['id'])->where('status', 1)->get();
        return view('home', compact('memos','user'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $memo_id = Memo::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'status' => 1
        ]);

        return redirect()->route('home');
    }

    public function delete(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        // 論理削除なので、status=2
        Memo::where('id', $id)->update([ 'status' => 2 ]);
        // ↓は物理削除
        // Memo::where('id', $id)->delete();

        return redirect()->route('home');
    }

    public function edit($id){


        // 該当するIDのメモをデータベースから取得
        $user = Auth::user();
        $memo = Memo::where('status', 1)->where('id', $id)->where('user_id', $user['id'])->first();
        $memos = Memo::where('user_id', $user['id'])->where('status', 1)->get();
        //取得したメモをViewに渡す
        return view('edit',compact('memo', 'user', 'memos'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Memo::where('id', $id)->update(['content' => $inputs['content']]);
        return redirect()->route('home');
    }

    public function create(){


        // 該当するIDのメモをデータベースから取得
        $user = Auth::user();
        $memos = Memo::where('user_id', $user['id'])->where('status', 1)->get();
        //取得したメモをViewに渡す
        return view('create',compact('user', 'memos'));
    }
}
