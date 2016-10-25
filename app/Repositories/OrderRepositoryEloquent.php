<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Entities\Order;
use CodeDelivery\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    protected $skipPresenter = true;

    public function getByIdAndDeliveryman($id, $deliveryman)
    {
        $result = $this->with(['client', 'items.product', 'cupom'])->findWhere(['id' => $id, 'user_deliveryman_id' => $deliveryman]);
        if($result instanceof Collection){
            $result = $result->first();
        } else {
            if(isset($result['data']) && count($result['data']) == 1){
                $result = [
                    'data' => $result['data'][0]
                ];
            } else {
                throw new ModelNotFoundException('Order does not exist.');
            }
        }

        return $result;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
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
        return OrderPresenter::class;
    }
}
