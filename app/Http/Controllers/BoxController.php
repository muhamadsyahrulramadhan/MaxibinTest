<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumimate\Validator\Rule;

class BoxController extends Controller
{
    public function showBox()
    {
        $data['box'] = \App\Box::orderBy('id_box')->get();
        return view('box', $data);
    }

    public function showCreateBox()
    {
        return view('box.form');
    }

    public function createBox(Request $request)
    {
        // dd($request->all());
        $rule = [
            'name_box' => 'required',
            'id_shelf' => 'required|exists:shelves',
            'id_location' => 'required|exists:locations'
        ];
        $this->validate($request, $rule);

        $box = new \App\Box;
        $box->name_box = $request->name_box;
        $box->id_shelf = $request->id_shelf;
        $box->id_location = $request->id_location;
        $status = $box->save();

        if ($status) {
            return redirect('/box')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/box/create')->with('error', 'Data gagal diubah');
        }
    }

    public function editBox(Request $request, $id)
    {
        $data['box'] = \DB::table('boxes')->where('id_box', $id)->first();
        return view('box.form', $data);
    }

    public function updateBox(Request $request, $id)
    {
        $rule = [
          'name_box' => 'required',
          'id_shelf' => 'required|exists:shelves',
          'id_location' => 'required|exists:locations'
        ];
      $this->validate($request, $rule);

      $box = \App\Box::where('id_box', $id)->first();
      $box->name_box = $request->name_box;
      $box->id_shelf = $request->id_shelf;
      $box->id_location = $request->id_location;
      $status = $box->update();

      if ($status) {
        return redirect('/box')->with('success', 'Data berhasil diubah');
      }else{
        return redirect('/box/create')->with('error', 'Data gagal diubah');
      }
    }

    public function deleteBox(Request $request, $id)
    {
      $box = \App\Box::where('id_box', $id)->first();
      $status = $box->delete();

      if ($status) {
        return redirect('/box')->with('success', 'Data berhasil dihapus');
      }else{
        return redirect('/box/create')->with('error', 'Data gagal dihapus');
      }
    }
}
