<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumimate\Validator\Rule;

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
    
    public function showItem()
    {
        $data['item'] = \App\Item::orderBy('id_item')->get();
        return view('home', $data);
    }

    public function showCreateItem()
    {
        return view('item.form');
    }

    public function createItem(Request $request)
    {
      // dd($request->all());
      // dd(auth()->user());
        $rule = [
            'name_item' => 'required',
            // 'id' => 'required|exists:users',
            'id_box' => 'required|exists:boxes',
            'id_location' => 'required|exists:locations',
            'id_project' => 'required|exists:projects'
        ];
        $this->validate($request, $rule);

        $item = new \App\Item;
        $item->name_item = $request->name_item;
        $item->id = auth()->user()->id;
        $item->id_box = $request->id_box;
        $item->id_location = $request->id_location;
        $item->id_project = $request->id_project;
        $status = $item->save();

        if ($status) {
            return redirect('/home')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/home/create')->with('error', 'Data gagal diubah');
        }
    }

    public function editItem(Request $request, $id)
    {
        $data['item'] = \DB::table('items')->where('id_item', $id)->first();
        return view('item.form', $data);
    }

    public function updateItem(Request $request, $id)
    {
        $rule = [
            'name_item' => 'required',
            'id' => 'required|exists:users',
            'id_box' => 'required|exists:boxes',
            'id_location' => 'required|exists:locations',
            'id_project' => 'required|exists:projects'
        ];
      $this->validate($request, $rule);

      $item = \App\Item::where('id_item', $id)->first();
      $item->name_item = $request->name_item;
      $item->id = $request->id;
      $item->id_box = $request->id_box;
      $item->id_location = $request->id_location;
      $item->id_project = $request->id_project;
      $status = $item->update();

      if ($status) {
        return redirect('/home')->with('success', 'Data berhasil diubah');
      }else{
        return redirect('/home/create')->with('error', 'Data gagal diubah');
      }
    }

    public function deleteItem(Request $request, $id)
    {
      $item = \App\Item::where('id_item', $id)->first();
      $status = $item->delete();

      if ($status) {
        return redirect('/home')->with('success', 'Data berhasil dihapus');
      }else{
        return redirect('/home/create')->with('error', 'Data gagal dihapus');
      }
    }
}
