<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    public function showLocation(){
        $data['location'] = \App\Location::orderBy('id_location')->get();
        return view('Location', $data);
    }

    public function showCreateLocation(){
        return view('location.form');
    }

    public function createLocation(Request $request) {
      // dd($request->all());
        $rule = [
            'name_location' => 'required|String'
          ];
          $this->validate($request, $rule);
    
          $input = $request->all();

        $location = new \App\Location;
        $location->name_location = $input['name_location'];
        $status = $location->save();

        if ($status) {
            return redirect('/location')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect('/location/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function editLocation(Request $request, $id)
    {
      $data['location'] = \DB::table('locations')->where('id_location', $id)->first();
      return view('location.form', $data);
    }

    public function updateLocation(Request $request, $id)
    {
      $rule = [
        'name_location' => 'required|string'
      ];
      $this->validate($request, $rule);

      $input = $request->all();
      $location = \App\Location::where('id_location', $id)->first();
      
      $location->name_location = $input['name_location'];
      
      $status = $location->update();

      if ($status) {
        return redirect('/location')->with('success', 'Data berhasil diubah');
      }else{
        return redirect('/location/create')->with('error', 'Data gagal diubah');
      }
    }

    public function deleteLocation(Request $request, $id)
    {
      $location = \App\Location::where('id_location', $id)->first();
      $status = $location->delete();

      if ($status) {
        return redirect('/location')->with('success', 'Data berhasil dihapus');
      }else{
        return redirect('/location/create')->with('error', 'Data gagal dihapus');
      }
    }
}
