<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __construct(OrderService $service)
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
        $orders = $this->service->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->service->show($id);
        return view('admin.order.show', compact('order'));
    }

    public function updateStatus($order_id, $status)
    {
        $status = $this->service->updateStatus($order_id, $status);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->back();
    }
}
