<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function __construct(ProductService $service)
    {
        parent::__construct($service);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->service->get();
        // dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = $this->service->getFormData();
        return view('admin.product.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $request->validated();

        $product['image'] = uploadImage($product['image'], 'products');

        !isset($product['is_discount']) || $product['is_discount'] == 0 ? $product['discount_price'] = $product['price'] : '';

        $this->service->store($product);
        return redirect()->back()->with(['success' => 'تم تخزين المنتج بنجاح']);
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
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->service->getFormData();
        $product = $this->service->show($id);
        return view('admin.product.edit', compact('product', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $request->validated();
        if ($request->hasFile('image')) {
            $product['image'] = uploadImage($product['image'], 'products', 'products', $id);
        }

        if (!isset($product['is_discount']) || $product['is_discount'] == 0) {
            $product['discount_price'] = $product['price'];
            $product['is_discount'] = 0;
        }

        $this->service->update($id, $product);
        return redirect()->back()->with(['success' => 'تم تعديل المنتج بنجاح']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->tempDestroy($id);
        return redirect(route('admin.product.index'))->with(['success' => 'تم حذف المنتج بنجاح']);
    }
}
