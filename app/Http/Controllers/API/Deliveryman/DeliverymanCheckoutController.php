<?php
namespace CodeDelivery\Http\Controllers\API\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;
    private $with = ['client', 'cupom', 'items'];

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository->skipPresenter(false)->with($this->with)->scopeQuery(function ($query) use ($id) {
            return $query->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }

    public function show($id)
    {
        $id_deliveryman = Authorizer::getResourceOwnerId();
        return $this->orderRepository->skipPresenter(false)->getByIdAndDeliveryman($id, $id_deliveryman);
    }

    public function updateStatus(Request $request, $id) {
        $id_deliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderService->updateStatus($id, $id_deliveryman, $request->get('status'));
        if($order){
            return $this->orderRepository->find($order->id);
        } else {
            return abort(400, 'Order not found.');
        }
    }
}