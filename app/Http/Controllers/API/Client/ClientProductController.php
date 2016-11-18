<?php
namespace CodeDelivery\Http\Controllers\API\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\ProductRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->skipPresenter(false)->all();
    }
}