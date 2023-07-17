<?php


namespace App\Services;

use App\Repositories\ProductSizeRepository;
use App\Repositories\SizeRepository;
use Illuminate\Http\Request;

class ProductSizeService extends BaseService
{

    private $sizeRepository;

    public function __construct(ProductSizeRepository $repository, SizeRepository $sizeRepository, Request $request)
    {
        parent::__construct($repository, $request);
        $this->sizeRepository = $sizeRepository;
    }

    public function get()
    {
        $data = $this->repository->get();
        return $data;
    }
    public function allSizes()
    {
        $data = $this->sizeRepository->get();
        return $data;
    }
}