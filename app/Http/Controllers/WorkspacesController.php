<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Workspace;
use Illuminate\Support\Facades\Validator;

class WorkspacesController extends Controller
{
    public function index()
    {
        // return Inertia::render('TestPage', [
        //     "workspaces" => Workspace::orderBy('id', 'DESC')->paginate(10)
        // ]);
        $data = Workspace::all();
        // return Inertia::render('TestPage', ['data' => $data]);
        return Inertia::render('TestPage',[
            'workspaces' => Workspace::all()->map(fn($workspace) => [
                'id' => $workspace->id,
                'workspace_name'=> $workspace->workspace_name,
                'workspace_description'=> $workspace->workspace_description
            ])
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'workspace_name' => ['required'],
            'workspace_description' => ['required'],
        ])->validate();
  
        Workspace::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Workspace Created Successfully.');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'workspace_name' => ['required'],
            'workspace_description' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Workspace::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Workspace Updated Successfully.');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Workspace::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
