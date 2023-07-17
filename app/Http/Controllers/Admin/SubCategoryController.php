<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class SubCategoryController extends BaseController
{
    public function __construct(CategoryService $service)
    {
        parent::__construct($service);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parent_id)
    {
        $subcategories = $this->service->getSub($parent_id);
        return view('admin.subcategory.index', compact('subcategories', 'parent_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id)
    {
        return view('admin.subcategory.create', compact('parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $subcategory = $request->validated();
        $subcategory['image'] = uploadImage($subcategory['image'], 'subcategories');
        $this->service->store($subcategory);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = $this->service->show($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $subcategory = $request->validated();

        /* if ($request->hasfile('image')) {
            $subcategory['image'] = uploadImage($subcategory['image'], 'categories');
            $this->service->update($id, $subcategory);
        } */

        $subcategory['image'] = uploadImage($subcategory['image'], 'subcategories', 'categories', $id);

        $this->service->update($id, $subcategory);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = $this->service->show($id);
        $this->service->tempDestroy($id);
        return redirect(route('admin.sub_category.index', $subcategory->parent_id))->with(['success' => 'تم حذف القسم الفرعي بنجاح']);
    }
}
