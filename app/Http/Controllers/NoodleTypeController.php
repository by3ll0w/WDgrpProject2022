<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\NoodleType;
use App\Models\Food;

class NoodleTypeController extends Controller
{
    //
    public function add()
    {
        $r = request();
        $addNoodleType = NoodleType::create([
            'name' => $r->noodleTypeName,
        ]);
        return redirect()->route('viewNoodleType');
    }

    public function view()
    {
        $viewNoodleType = NoodleType::all();
        return view('showNoodleType')->with('noodle_types', $viewNoodleType);
    }

    public function edit($id)
    {
        $noodleType = NoodleType::find($id);
        return view('editNoodleType', compact('noodleType'));
    }

    public function update($id)
    {
        $r = request();
        NoodleType::where('id', $id)->update(['name' => $r->noodleTypeName,]);
        return redirect()->route('viewNoodleType');
    }

    public function delete($id)
    {
        $noodleType = NoodleType::find($id);
        Food::where('NoodleTypeID', $id)->delete();
        $noodleType->delete();


        return redirect()->back();
    }
}
