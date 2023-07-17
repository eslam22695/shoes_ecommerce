<?php


namespace App\Services;


use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductSizeRepository;
use App\Repositories\ProductRateRepository;
use App\Repositories\ShoeModelRepository;
use App\Repositories\SoleRepository;
use App\Repositories\ColorRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\SizeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RelatedProductsResource;
use App\Repositories\FavouriteRepository;
use Symfony\Component\Mime\Part\Multipart\RelatedPart;

class ProductService extends BaseService
{
    private $categoryRepository;
    private $ProductSizeRepository;
    private $MaterialRepository;
    private $modelRepository;
    private $colorRepository;
    private $soleRepository;
    private $sizeRepository;
    private $productRateRepository;
    private $favouriteRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository, ProductSizeRepository $ProductSizeRepository, ShoeModelRepository $modelRepository, SoleRepository $soleRepository,SizeRepository $sizeRepository,  ColorRepository $colorRepository, MaterialRepository $materialRepository, ProductRateRepository $productRateRepository, FavouriteRepository $favouriteRepository, Request $request)
    {
        parent::__construct($repository, $request);
        $this->categoryRepository       = $categoryRepository;
        $this->ProductSizeRepository    = $ProductSizeRepository;
        $this->MaterialRepository       = $materialRepository;
        $this->modelRepository          = $modelRepository;
        $this->soleRepository           = $soleRepository;
        $this->sizeRepository           = $sizeRepository;
        $this->colorRepository          = $colorRepository;
        $this->productRateRepository    = $productRateRepository;
        $this->favouriteRepository      = $favouriteRepository;

        $this->with = [
            'sole',
            'material',
            'rates',
            'productImages',
            'category',
            'shoe_model',
            'sizes',
            'color'
        ];
    }

    public function getAllProducts($request)
    {
        if (empty($request)) {
            $data = $this->repository->paginate(8);
        } else {

            $input = $request->all();

            $data = $this->repository->query();

            if (isset($input['filter']['category_id'])) {
                $subCategories = $this->categoryRepository->where('parent_id', $input['filter']['category_id'])->pluck('id');
                $data = $data->whereIn('category_id', $subCategories);
            }

            if (isset($input['filter']['sub_category_id'])) {
                $data = $data->where('category_id', $input['filter']['sub_category_id']);
            }

            if (isset($input['filter']['color_id'])) {
                $data = $data->where('color_id', $input['filter']['color_id']);
            }

            if (isset($input['filter']['model_id'])) {
                $data = $data->where('model_id', $input['filter']['model_id']);
            }

            if (isset($input['filter']['size_id'])) {
                $products = $this->ProductSizeRepository->where('size_id', $input['filter']['size_id'])->pluck('product_id');
                $data = $data->whereIn('id', $products);
            }

            if (isset($input['filter']['min_price']) && isset($input['filter']['max_price'])) {

                $data = $data->whereBetween('discount_price', array($input['filter']['min_price'], $input['filter']['max_price']));
            }
            $data = $data->paginate(8);
        }
        return ProductResource::collection($data);
        //return $data;
    }
    public function getFormData()
    {
        return ['categories' => $this->categoryRepository->pluck('name', 'id'), 'models' => $this->modelRepository->pluck('name', 'id'), 'soles' => $this->soleRepository->pluck('name', 'id'), 'materials' => $this->MaterialRepository->pluck('name', 'id'), 'colors' => $this->colorRepository->pluck('name', 'id')];
    }

    public function show($id, $with = [])
    {
        return new ProductResource(parent::show($id));
    }

    public function related($category_id)
    {
        $related = $this->repository->get()->where('category_id', $category_id);
    }

    public function productRate($request)
    {
        return $this->productRateRepository->create($request);
    }

    public function relatedProducts($product_id)
    {

        $data = $this->repository->where('product_id', $product_id);
        return RelatedProductsResource::collection($data);
    }

    public function is_favourite($product_id)
    {

        $data =  DB::table('favourites')->where([
            ['product_id', '=', $product_id],
            ['user_id', '=', getCurrentUser()]
        ])->exists() ? 1 : 0;

        return $data;
    }

    public function search($filter)
    {
        $record = $this->repository->where('name', 'like', '%' . $filter . '%')->orWhere('description', 'like', '%' . $filter . '%')->paginate(8);
        return ProductResource::collection($record);
    }

    public function allLookups()
    {
        $data = [];

        $data['color'] = $this->colorRepository->get();
        $data['material'] = $this->MaterialRepository->get();
        $data['model'] = $this->modelRepository->get();
        $data['sole'] = $this->soleRepository->get();
        $data['size'] = $this->sizeRepository->get();
        $data['price']['min'] = $this->repository->min('discount_price');
        $data['price']['max'] = $this->repository->max('discount_price');

        return $data;
    }
}
