<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumimate\Validator\Rule;

class ProjectController extends Controller
{
    public function showProject()
    {
        $data['project'] = \App\Project::orderBy('id_project')->get();
        return view('project', $data);
    }

    public function showCreateProject()
    {
        return view('project.form');
    }

    public function createProject(Request $request)
    {
      // dd($request->all());
        $rule = [
            'name_project' => 'required'
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        $project = new \App\Project;
        $project->name_project = $input['name_project'];
        $status = $project->save();

        if ($status) {
            return redirect('/project')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/project/create')->with('error', 'Data gagal diubah');
        }
    }

    public function editProject(Request $request, $id)
    {
        $data['project'] = \DB::table('projects')->where('id_project', $id)->first();
        return view('project.form', $data);
    }

    public function updateProject(Request $request, $id)
    {
        $rule = [
            'name_project' => 'required'
        ];
      $this->validate($request, $rule);

      $input = $request->all();
      $project = \App\Project::where('id_project', $id)->first();
      $project->name_project = $input['name_project'];
      $status = $project->update();

      if ($status) {
        return redirect('/project')->with('success', 'Data berhasil diubah');
      }else{
        return redirect('/project/create')->with('error', 'Data gagal diubah');
      }
    }

    public function deleteProject(Request $request, $id)
    {
      $project = \App\Project::where('id_project', $id)->first();
      $status = $project->delete();

      if ($status) {
        return redirect('/project')->with('success', 'Data berhasil dihapus');
      }else{
        return redirect('/project/create')->with('error', 'Data gagal dihapus');
      }
    }
}
