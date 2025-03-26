<?php

namespace app\models;

class OrderManager
{
	public function returnOrder(string $id): array|false
	{
		return Db::queryOne('
			SELECT *
			FROM `order` 
			WHERE `id` = ?
		', array($id));
	}
}