<?php


namespace App\Services;

use App\Http\Resources\ProductSoleResource;
use App\Repositories\ProductImageRepository;
use Illuminate\Http\Request;

class ProductImageService extends BaseService
{

    public function __construct(ProductImageRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function get()
    {
        $data = $this->repository->get();
        return $data;
    }
}