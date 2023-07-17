<?php


namespace App\Services;

use App\Http\Resources\CityResource;
use App\Http\Resources\DistrictResource;
use App\Repositories\CityRepository;
use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;

class CityService extends BaseService
{

  private $districtRepository;

  public function __construct(CityRepository $repository, DistrictRepository $districtRepository, Request $request)
  {
    parent::__construct($repository, $request);
    $this->districtRepository  = $districtRepository;
    $this->with = [
      'districts'
    ];
  }

  public function getApi($city_id)
  {
    if ($city_id) {
      $data = $this->districtRepository->where('city_id', $city_id)->get();
      return DistrictResource::collection($data);
    } else {
      $data = $this->repository->get();
      return CityResource::collection($data);
    }
  }
}