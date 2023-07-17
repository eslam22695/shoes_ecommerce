<?php


namespace App\Services;

use App\Http\Resources\AddressResource;
use App\Repositories\AddressRepository;
use App\Repositories\CityRepository;
use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;

class AddressService extends BaseService
{

    private $cityRepository;
    private $districtRepository;

    public function __construct(AddressRepository $repository, CityRepository $cityRepository, DistrictRepository $districtRepository, Request $request)
    {
        parent::__construct($repository, $request);

        $this->with = [
            'city',
            'district'
        ];
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
    }

    public function get()
    {
        $data = $this->repository->where('user_id', getCurrentUser())->get();
        return $data;
    }

    public function getUserAddresses($user_id)
    {
        $data = $this->repository->where('user_id', $user_id)->where('status', '!=', '2')->get();
        return $data;
    }

    public function getِApi()
    {
        $data = $this->repository->where('user_id', getCurrentUser())->get();
        // return $data;
        return AddressResource::collection($data);
    }


    public function showApi($id, $with = [])
    {
        return new AddressResource(parent::show($id));
    }

    public function getCitiesForAddress()
    {
        $data = $this->cityRepository->where('status', '1')->pluck('name', 'id');
        return $data;
    }

    public function getDistrictsForAddress($city_id)
    {
        return $this->districtRepository->where('city_id', $city_id)->where('status', '1')->get();
    }
}
