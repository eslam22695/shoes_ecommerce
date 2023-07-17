<?php


namespace App\Services;

use App\Prototype\FilterMeta;

use App\Repository\IRepository;
use App\Repositories\DistrictRepository;
use App\Utils\FilterUtil;
use Illuminate\Http\Request;

class DistrictService extends BaseService
{

    public function __construct(DistrictRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function getAll($city_id)
    {
        $data = $this->repository->where('city_id', $city_id)->get();
        return $data;
    }
}
