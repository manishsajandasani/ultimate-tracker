<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminTaskCategoriesController extends Controller
{      
    public function task_categories_index() {
        active_tabs("admin-task-categories", Route::currentRouteName());
        $result_data = DB::table('task_categories')->get();
        return view("back.task-categories.admin-task-categories")->with("taskCategories", $result_data);
    }

    public function task_categories_create() {
        active_tabs("admin-task-categories", Route::currentRouteName());
        return view("back.task-categories.admin-add-task-category");
    }

    public function task_categories_store(Request $request) {
        $request->validate([
            "task_category_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('task_categories')->insert([
            "user_id" => get_current_user_id(),
            "task_category_name" => $request->task_category_name,
            "is_active" => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.task.categories.index')->with('entity-added-success', 'Task Category Added Successfully');
        }

        return redirect()->route('admin.task.categories.index')->with('operation-fail', 'Something went wrong!');
    }

    public function task_categories_edit($the_id) {
        active_tabs("admin-task-categories", Route::currentRouteName());        
        $entity = DB::table('task_categories')->where(['id' => $the_id])->first();
        return view("back.task-categories.admin-edit-task-category")->with('category', $entity);
    }

    public function task_categories_update(Request $request, $the_id) {        
        $request->validate([
            "task_category_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "user_id" => get_current_user_id(),
            "task_category_name" => $request->task_category_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('task_categories')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.task.categories.index')->with('entity-updated-success', 'Task Category Updated Successfully');
        }

        return redirect()->route('admin.task.categories.index')->with('operation-fail', 'Something went wrong!');
    }
}
