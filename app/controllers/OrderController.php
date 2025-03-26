<?php

namespace app\controllers;

use app\models\OrderManager;

class OrderController extends Controller
{
	function process(array $parameters): void
	{
		$api = $_SERVER['REQUEST_METHOD'];
		$orderManager = new OrderManager();

		if ($api === 'GET') {
			$this->getOrderById($parameters, $orderManager);
		}
	}

	public function getOrderById(array $parameters, OrderManager $orderManager): void
	{
//		echo json_encode($orderManager->returnOrder($parameters[1]));
		var_dump($orderManager->returnOrder($parameters[1]));
	}
}