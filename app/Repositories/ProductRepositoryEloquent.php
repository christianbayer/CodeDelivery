<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\ProductPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Entities\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{

    protected $skipPresenter = true;

    public function getProducts(){
        return $this->model->get(['id', 'name', 'price']);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ProductPresenter::class;
    }
}
