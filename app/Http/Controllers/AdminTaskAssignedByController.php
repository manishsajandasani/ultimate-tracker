<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminTaskAssignedByController extends Controller
{
    public function task_assigned_by_index() {
        active_tabs("admin-task-assigned-by", Route::currentRouteName());
        $result_data = DB::table('task_assigned_by AS tab')
                    ->where(['tab.user_id' => get_current_user_id()])
                    ->select('tab.*')
                    ->get();
        return view("back.task-assigned-by.admin-task-assigned-by")->with("taskAssignedBy", $result_data);
    }

    public function task_assigned_by_create() {
        active_tabs("admin-task-assigned-by", Route::currentRouteName());
        return view("back.task-assigned-by.admin-add-task-assigned-by");
    }

    public function task_assigned_by_store(Request $request) {
        $request->validate([
            "task_assigned_by_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('task_assigned_by')->insert([
            "user_id" => get_current_user_id(),
            "task_assigned_by_name" => $request->task_assigned_by_name,
            'is_active' => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.task.assigned.by.index')->with('entity-added-success', 'Task Assigned By Added Successfully');
        }

        return redirect()->route('admin.task.assigned.by.index')->with('operation-fail', 'Something went wrong!');
    }

    public function task_assigned_by_edit($the_id) {
        active_tabs("admin-task-assigned-by", Route::currentRouteName());        
        $entity = DB::table('task_assigned_by')->where(['id' => $the_id])->first();
        return view("back.task-assigned-by.admin-edit-task-assigned-by")->with('record', $entity);
    }

    public function task_assigned_by_update(Request $request, $the_id) {        
        $request->validate([
            "task_assigned_by_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "task_assigned_by_name" => $request->task_assigned_by_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('task_assigned_by')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.task.assigned.by.index')->with('entity-updated-success', 'Assigned By Updated Successfully');
        }

        return redirect()->route('admin.task.assigned.by.index')->with('operation-fail', 'Something went wrong!');
    }
}
