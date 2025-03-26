<?php

namespace app\models;

class OrderManager
{
	public function returnOrder(string $id): array|false
	{
		return Db::queryOne('
			SELECT *
			FROM `order`
			JOIN `order_item` on `order`.`order_id` = ?
			JOIN `item` on `order_item`.`item_id`
		', array($id));

//		return Db::queryOne('
//			SELECT *
//			FROM `order`
//			WHERE order_id = ?
//		', array($id));
	}
}