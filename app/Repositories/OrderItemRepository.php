<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderItemRepository
 * @package namespace CodeDelivery\Repositories;
 */
interface OrderItemRepository extends RepositoryInterface
{
    public function getByIdAndDeliveryman($id, $deliveryman);
}
