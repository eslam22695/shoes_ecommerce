<?php


namespace App\Services;

use App\Http\Resources\ProductSoleResource;
use App\Repositories\SoleRepository;
use Illuminate\Http\Request;

class SoleService extends BaseService
{

    public function __construct(SoleRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function get()
    {
        $data = $this->repository->get();
        // return $data;
        return ProductSoleResource::collection($data);
    }
}