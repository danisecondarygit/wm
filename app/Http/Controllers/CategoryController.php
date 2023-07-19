<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CategorySaveRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function create_category(Category $cmodel){
        return view('categories.new-category', [
            'categories'=>$cmodel->get(),
        ]);
    }
    public function save_category(CategorySaveRequest $req, Category $cmodel){
        $data = $req->validated();
        $cmodel->create($data);
        return redirect()->route('panel.categories.management')->with('success_msg', 'Category created');
    }
    public function delete_category(Category $category, CategoryRepository $crepo){
        $res = $crepo->delete_category($category);
        if($res){
            return redirect()->back()->with('success_msg', "Category deleted");
        }
        abort(500);
    }
    public function manage_categories(Category $cmodel){
        return view('categories.management', ['data'=>$cmodel->latest()->get(), ]);
    }
}
