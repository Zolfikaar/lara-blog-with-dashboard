<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\User;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category();

        $category->name = $data['name'];
        $category->slug = Str::slug($data['name'],'-'); // to convert the name to slug
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //dd(date('now'));
            $imageName = date('now') . '-'. $category->name . '.' . $image->getClientOriginalExtension(); // renaming the image name, using timeStamp + category name + extension
            $destinationPath = public_path('uploads/categories/images/' . $category->name ); // to store the image in the public folder, and using category name as a sub folder
            $image->move($destinationPath, $imageName);
            $category->image = $imageName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status == true ? 1 : 0;
        $category->status = $request->status == true ? 1 : 0;

        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/categories')->with('success', 'Category added successfully');

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $data = $request->validated();

        $category = Category::find($id);

        $category->name = $data['name'];
        $category->slug = Str::slug($data['name'],'-'); // to convert the name to slug
        $category->description = $data['description'];

        if ($request->hasFile('image')) {

            // if there is a previous image, delete it
            $path = 'uploads/categories/images/' . $category->name . '/' . $category->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('image');
            //dd(date('now'));
            $imageName = date('now') . '-'. $category->name . '.' . $image->getClientOriginalExtension(); // renaming the image name, using timeStamp + category name + extension
            $destinationPath = public_path('uploads/categories/images/' . $category->name); // to store the image in the public folder, and using category name as a sub folder
            $image->move($destinationPath,$imageName);
            $category->image = $imageName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status == true ? 1 : 0;
        $category->status = $request->status == true ? 1 : 0;

        // $category->updated_by = Auth::user()->id;

        $category->update();

        return redirect('admin/categories')->with('success', 'Category updated successfully');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            $path = 'uploads/categories/images/' . $category->name . '/' . $category->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/categories')->with('success', "Category deleted with all it's posts successfully");
        }


        return redirect('admin/categories')->with('success', 'Category not found');
    }
}
