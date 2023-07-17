<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;
use App\Helpers\functions;
use App\Services\AddressService;
use Auth;
use Exception;

class AddressController extends BaseController
{
    public function __construct(AddressService $service)
    {
        parent::__construct($service);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $addresses = $this->service->getUserAddresses($user_id);
        return view('admin.address.index', compact('addresses', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $city = $this->service->getCitiesForAddress();
        return view('admin.address.create', ['user_id' => $user_id, 'city' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.address.index', $request->user_id);
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->service->show($id);
        return view('admin.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = $this->service->getRecordData($id);
        $city = $this->service->getCitiesForAddress();
        $districts = $this->service->getDistrictsForAddress($record->city_id);
        return view('admin.address.create', ['city' => $city,'districts' => $districts, 'record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, AddressRequest $request)
    {
        $this->service->update($id, $request->validated());
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
        $address = $this->service->show($id);
        $this->service->tempDestroy($id);
        return redirect(route('admin.address.index', $address->user_id))->with(['success' => 'تم حذف العنوان بنجاح']);
    }

    public function fetch_districts(Request $request)
    {

        $data['districts'] = $this->service->getDistrictsForAddress($request->city_id);
        return response()->json($data);
    }
}
