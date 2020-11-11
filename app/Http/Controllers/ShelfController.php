<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumimate\Validator\Rule;

class ShelfController extends Controller
{
    public function showShelf()
    {
        $data['shelf'] = \App\Shelf::orderBy('id_shelf')->get();
        return view('shelf', $data);
    }

    public function showCreateShelf()
    {
        return view('shelf.form');
    }

    public function createShelf(Request $request)
    {
      // dd($request->all());
        $rule = [
            'name_shelves' => 'required',
            'id_location' => 'required|exists:locations'
        ];
        $this->validate($request, $rule);

        $shelf = new \App\Shelf;
        $shelf->name_shelves = $request->name_shelves;
        $shelf->id_location = $request->id_location;
        $status = $shelf->save();

        if ($status) {
            return redirect('/shelf')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/shelf/create')->with('error', 'Data gagal diubah');
        }
    }

    public function editShelf(Request $request, $id)
    {
        $data['shelf'] = \DB::table('shelves')->where('id_shelf', $id)->first();
        return view('shelf.form', $data);
    }

    public function updateShelf(Request $request, $id)
    {
        $rule = [
          'name_shelves' => 'required',
          'id_location' => 'required|exists:locations'
        ];
      $this->validate($request, $rule);

      $shelf = \App\Shelf::where('id_shelf', $id)->first();
      $shelf->name_shelves = $request->name_shelves;
      $shelf->id_location = $request->id_location;
      $status = $shelf->update();

      if ($status) {
        return redirect('/shelf')->with('success', 'Data berhasil diubah');
      }else{
        return redirect('/shelf/create')->with('error', 'Data gagal diubah');
      }
    }

    public function deleteShelf(Request $request, $id)
    {
      $shelf = \App\Shelf::where('id_shelf', $id)->first();
      $status = $shelf->delete();

      if ($status) {
        return redirect('/shelf')->with('success', 'Data berhasil dihapus');
      }else{
        return redirect('/shelf/create')->with('error', 'Data gagal dihapus');
      }
    }

    public function getShelf($id) {
      $shelf = Shelf::where('id_location', $id)->get(['id_shelf', 'name_shelf']);

      return response()->json([
          'shelf' => $shelf
      ]);
  }
}
