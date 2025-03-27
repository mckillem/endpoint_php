<?php

namespace app\controllers;

use app\models\OrderManager;

class OrderController extends Controller
{
	function process(array $parameters): void
	{
		$api = $_SERVER['REQUEST_METHOD'];
		$orderManager = new OrderManager();

		$id = $parameters[1];
		if ($api === 'GET') {
			if (!empty($id)) {
				$this->getOrderById($id, $orderManager);
			}
		}
	}

	public function getOrderById(string $id, OrderManager $orderManager): void
	{
		echo json_encode($orderManager->returnOrder($id));
	}
}