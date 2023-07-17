<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductSizeRequest;
use App\Services\ProductSizeService;
use Illuminate\Http\Request;

class ProductSizeController extends BaseController
{
    public function __construct(ProductSizeService $service)
    {
        parent::__construct($service);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $productSizes = $this->service->get()->where('product_id', $product_id);
        return view('admin.productsize.index', compact('productSizes', 'product_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $sizes = $this->service->allSizes();
        return view('admin.productsize.create', compact('product_id', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSizeRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->service->show($id);
        return view('admin.productsize.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSize = $this->service->show($id);
        return view('admin.productsize.edit', compact('productSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSizeRequest $request, $id)
    {
        $product = $request->validated();
        $product['image'] = uploadImage($product['image'], 'products', 'product_images', $id);
        $this->service->update($id, $product);
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
        $this->service->destroy($id);
        return redirect()->back();
    }
}