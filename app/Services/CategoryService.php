<?php


namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService extends BaseService
{

    public function __construct(CategoryRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function getApi($parent_id)
    {
        $data = $this->repository->where('parent_id', $parent_id)->get();
        return CategoryResource::collection($data);
    }

    public function getSub($parent_id)
    {
        $data = $this->repository->where('parent_id', $parent_id)->where('status', '!=', 2)->get();
        return $data;
    }
}
