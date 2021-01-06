<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Laracasts\Flash\Flash;
use App\Helpers\APIHelpers;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepo)
    {   
        $this->categoryRepository = $categoryRepo;
       // dd( $this->categoryRepository);
    }

    public function index(Request $request)
    {
        $categorys = $this->categoryRepository->paginate(10);
        return view('categorys.index')
            ->with('categorys', $categorys);
        // $categorys=Category::all();
        // $response=APIHelpers::createAPIResponse(false, 200, '',$categorys);
        // return response()->json($response,200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('category saved successfully.');

        return redirect(route('categorys.index'));
        // $category=new Category();
        // $category->name=$request->name;
        
        // $category_save=$category->save();
        // if($category_save){
        //     $response=APIHelpers::createAPIResponse(false, 201, 'Category Added Successfully',null);
        //     return response()->json($response,200);
        // }else{
        //     $response=APIHelpers::createAPIResponse(true, 400, 'Category Creation Failed',null);
        //     return response()->json($response,400);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('category not found');

            return redirect(route('categorys.index'));
        }

        return view('categorys.show')->with('category', $category);
    //     $category=Category::find($id);
    //    $response=APIHelpers::createAPIResponse(false, 200, '',$category);
    //    return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('category not found');

            return redirect(route('categorys.index'));
        }

        return view('categorys.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('category not found');

            return redirect(route('categorys.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('category updated successfully.');

        return redirect(route('categorys.index'));
        // $category=Category::find($id);
        // $category->name=$request->name;
        
        // $category_update=$category->save();
        // if($category_update){
        //     $response=APIHelpers::createAPIResponse(false, 201, 'Category Update Successfully',null);
        //     return response()->json($response,200);
        // }else{
        //     $response=APIHelpers::createAPIResponse(true, 400, 'Category Update Failed',null);
        //     return response()->json($response,400);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('category not found');

            return redirect(route('categorys.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('category deleted successfully.');

        return redirect(route('categorys.index'));
        // $category=Category::find($id);
        // $category_delete= $category->delete();
        // if($category_delete){
        //     $response=APIHelpers::createAPIResponse(false, 201, 'Category Delete Successfully',null);
        //     return response()->json($response,200);
        // }else{
        //     $response=APIHelpers::createAPIResponse(true, 400, 'Category Delete Failed',null);
        //     return response()->json($response,400);
        // }
    }
}       





