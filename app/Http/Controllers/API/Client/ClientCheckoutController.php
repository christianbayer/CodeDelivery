<?php
namespace CodeDelivery\Http\Controllers\API\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
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
        $clientId = $this->userRepository->find(Authorizer::getResourceOwnerId())->client->id;
        $orders = $this->orderRepository->skipPresenter(false)->with($this->with)->scopeQuery(function ($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Authorizer::getResourceOwnerId())->client->id;
        $data['client_id'] = $clientId;
        $order = $this->orderService->create($data);

        return $this->orderRepository->skipPresenter(false)->with($this->with)->find($order->id);
    }

    public function show($id)
    {
        return $this->orderRepository->skipPresenter(false)->with($this->with)->find($id);
    }
}