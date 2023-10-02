<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminPrioritiesController extends Controller
{
    public function priorities_index() {
        active_tabs("admin-priorities", Route::currentRouteName());
        $result_data = DB::table('priorities')->get();
        return view("back.priorities.admin-priorities")->with("priorities", $result_data);
    }

    public function priorities_create() {
        active_tabs("admin-priorities", Route::currentRouteName());
        return view("back.priorities.admin-add-priority");
    }

    public function priorities_store(Request $request) {
        $request->validate([
            "priority_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('priorities')->insert([
            "priority_name" => $request->priority_name,
            'is_active' => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.priorities.index')->with('entity-added-success', 'Priority Added Successfully');
        }

        return redirect()->route('admin.priorities.index')->with('operation-fail', 'Something went wrong!');
    }

    public function priorities_edit($the_id) {
        active_tabs("admin-priorities", Route::currentRouteName());        
        $entity = DB::table('priorities')->where(['id' => $the_id])->first();
        return view("back.priorities.admin-edit-priority")->with('record', $entity);
    }

    public function priorities_update(Request $request, $the_id) {        
        $request->validate([
            "priority_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "priority_name" => $request->priority_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('priorities')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.priorities.index')->with('entity-updated-success', 'Priority Updated Successfully');
        }

        return redirect()->route('admin.priorities.index')->with('operation-fail', 'Something went wrong!');
    }
}
