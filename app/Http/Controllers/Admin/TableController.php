<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Table $table)
    {
        if($request->ajax())
        {
            $table = Table::select();
            return datatables()->of($table)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return $this->getActionColumn($data);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.table.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.table.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $table = Table::create($request->all());

        return redirect()->route('admin.table.index')->with('success', 'Success Create Table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('admin.table.create-edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $table->update($request->all());

        return redirect()->route('admin.table.index')->with('success', 'Successfully Updated Table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        try {
            $table->delete();
            return redirect()->route('admin.table.index')->with('success', 'Successfully Deleted Table');
        } catch (\Throwable $th) {
            return redirect()->route('admin.table.index')->with('error', 'Failed to Deleted Table');
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('admin.table.edit', $data->id);
        $deleteBtn = route('admin.table.destroy', $data->id);
        $ident = Str::random();

        return
        '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        . '<button type="button" onclick="delete_data(\'form'.$ident .'\')" class="mx-1 my-1 btn btn-sm btn-outline-danger">Delete</button>'
        .'<form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }
}
