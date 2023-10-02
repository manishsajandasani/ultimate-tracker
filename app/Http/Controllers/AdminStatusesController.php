<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminStatusesController extends Controller
{
    public function statuses_index() {
        active_tabs("admin-statuses", Route::currentRouteName());
        $result_data = DB::table('statuses')->get();
        return view("back.statuses.admin-statuses")->with("statuses", $result_data);
    }

    public function statuses_create() {
        active_tabs("admin-statuses", Route::currentRouteName());
        return view("back.statuses.admin-add-status");
    }

    public function statuses_store(Request $request) {
        $request->validate([
            "status_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('statuses')->insert([
            "status_name" => $request->status_name,
            'is_active' => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.statuses.index')->with('entity-added-success', 'Status Added Successfully');
        }

        return redirect()->route('admin.statuses.index')->with('operation-fail', 'Something went wrong!');
    }

    public function statuses_edit($the_id) {
        active_tabs("admin-statuses", Route::currentRouteName());        
        $entity = DB::table('statuses')->where(['id' => $the_id])->first();
        return view("back.statuses.admin-edit-status")->with('record', $entity);
    }

    public function statuses_update(Request $request, $the_id) {        
        $request->validate([
            "status_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "status_name" => $request->status_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('statuses')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.statuses.index')->with('entity-updated-success', 'Status Updated Successfully');
        }

        return redirect()->route('admin.statuses.index')->with('operation-fail', 'Something went wrong!');
    }
}
