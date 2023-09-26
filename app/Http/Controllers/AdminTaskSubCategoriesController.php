<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminTaskSubCategoriesController extends Controller
{
    public function task_sub_categories_index() {
        active_tabs("admin-task-sub-categories", Route::currentRouteName());
        $result_data = DB::table('task_sub_categories AS tsc')
                    ->join('task_categories AS tc', 'tc.id', '=', 'tsc.task_category_id')
                    ->where(['tc.user_id' => get_current_user_id()])
                    ->select('tsc.*', 'tc.task_category_name')
                    ->get();
        return view("back.task-sub-categories.admin-task-sub-categories")->with("taskCategories", $result_data);
    }

    public function task_sub_categories_create() {
        active_tabs("admin-task-sub-categories", Route::currentRouteName());
        $currentUserCategories = DB::table("task_categories")->where(["user_id" => get_current_user_id()])->get();
        return view("back.task-sub-categories.admin-add-task-sub-category")->with(compact('currentUserCategories'));
    }

    public function task_sub_categories_store(Request $request) {
        $request->validate([
            "task_category_id" => "required",
            "task_sub_category_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('task_sub_categories')->insert([
            "task_category_id" => $request->task_category_id,
            "task_sub_category_name" => $request->task_sub_category_name,
            'is_active' => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.task.sub.categories.index')->with('entity-added-success', 'Task Sub Category Added Successfully');
        }

        return redirect()->route('admin.task.sub.categories.index')->with('operation-fail', 'Something went wrong!');
    }

    public function task_sub_categories_edit($the_id) {
        active_tabs("admin-task-sub-categories", Route::currentRouteName());        
        $entity = DB::table('task_categories')->where(['id' => $the_id])->first();
        return view("back.task-sub-categories.admin-edit-task-sub-category")->with('category', $entity);
    }

    public function task_sub_categories_update(Request $request, $the_id) {        
        $request->validate([
            "cat_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "cat_name" => $request->cat_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('task_categories')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.task.categories.index')->with('entity-updated-success', 'Category Updated Successfully');
        }

        return redirect()->route('admin.task.categories.index')->with('operation-fail', 'Something went wrong!');
    }
}
