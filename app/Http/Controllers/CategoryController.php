<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllcategories(){
        $Allcategories = category::all();
        return view('admin_dashboard/category',compact('Allcategories'));
    }
    public function addCategory(){
        $newcategory = new category();
        $newcategory->category = request('name');
        $newcategory->description = request('description');
        $newcategory->save();

        return redirect()->route('category.admin');
    }
    public function Editcategory(){
        $id = (int)request('idtoupdate');
        category::where('id', $id)->update([
            'category' => request('newcat'),
            'description' => request('newdescription'),
        ]);
        return redirect()->route('category.admin');
    }
    public function deleteCategory($id){
        category::findOrFail($id)->delete();
        return redirect()->route('category.admin');
    }
}
