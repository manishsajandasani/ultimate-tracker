<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminTaskEntriesController extends Controller
{      
    public function task_entries_index() {
        active_tabs("admin-task-entries", Route::currentRouteName());
        $result_data = DB::table('task_entries')->get();
        return view("back.task-entries.admin-task-entries")->with("taskEntries", $result_data);
    }

    public function task_entries_create() {
        active_tabs("admin-task-entries", Route::currentRouteName());
        return view("back.task-entries.admin-add-task-entry");
    }

    public function task_entries_store(Request $request) {
        $request->validate([
            "task_entry_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('task_entries')->insert([
            "user_id" => get_current_user_id(),
            "task_entry_name" => $request->task_entry_name,
            "is_active" => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.task.entries.index')->with('entity-added-success', 'Task Added Successfully');
        }

        return redirect()->route('admin.task.entries.index')->with('operation-fail', 'Something went wrong!');
    }

    public function task_entries_edit($the_id) {
        active_tabs("admin-task-entries", Route::currentRouteName());        
        $entity = DB::table('task_entries')->where(['id' => $the_id])->first();
        return view("back.task-entries.admin-edit-task-entry")->with('entry', $entity);
    }

    public function task_entries_update(Request $request, $the_id) {        
        $request->validate([
            "task_entry_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "user_id" => get_current_user_id(),
            "task_entry_name" => $request->task_entry_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('task_entries')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.task.entries.index')->with('entity-updated-success', 'Task Updated Successfully');
        }

        return redirect()->route('admin.task.entries.index')->with('operation-fail', 'Something went wrong!');
    }
}
