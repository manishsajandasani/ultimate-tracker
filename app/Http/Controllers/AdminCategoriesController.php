<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AdminCategoriesController extends Controller
{      
    public function categories_index() {
        active_tabs("admin-categories", Route::currentRouteName());
        $result_data = DB::table('categories')->get();
        return view("back.categories.admin-categories")->with("categories", $result_data);
    }

    public function categories_create() {
        active_tabs("admin-categories", Route::currentRouteName());
        return view("back.categories.admin-add-category");
    }

    public function categories_store(Request $request) {
        $request->validate([
            "cat_name" => "required",
            "is_active" => "required",
        ]);        

        $entity = DB::table('categories')->insert([
            'cat_name' => $request->cat_name,
            'is_active' => $request->is_active,
        ]);

        if($entity) {
            return redirect()->route('admin.categories.index')->with('entity-added-success', 'category Added Successfully');
        }

        return redirect()->route('admin.categories.index')->with('operation-fail', 'Something went wrong!');
    }

    public function categories_edit($the_id) {
        active_tabs("admin-categories", Route::currentRouteName());        
        $entity = DB::table('categories')->where(['id' => $the_id])->first();
        return view("back.categories.admin-edit-category")->with('category', $entity);
    }

    public function categories_update(Request $request, $the_id) {        
        $request->validate([
            "cat_name" => "required",
            "is_active" => "required",
        ]);

        $dataToUpdate = [
            "cat_name" => $request->cat_name,
            "is_active" => $request->is_active,
        ];
        
        $entity_updated = DB::table('categories')->where('id', $the_id)->update($dataToUpdate);

        if($entity_updated) {
            return redirect()->route('admin.categories.index')->with('entity-updated-success', 'Category Updated Successfully');
        }

        return redirect()->route('admin.categories.index')->with('operation-fail', 'Something went wrong!');
    }
}
