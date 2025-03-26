<?php

namespace app\models;

use PDO;

/**
 * Wrapper pro snadnější práci s databází s použitím PDO a automatickým
 * zabezpečením parametrů (proměnných) v dotazech.
 */
class Db
{
	private static PDO $connection;

	private static array $settings = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	public static function connect(#[\SensitiveParameter] string $host, #[\SensitiveParameter] string $user, #[\SensitiveParameter] string $password, string $database): void
	{
		if (!isset(self::$connection)) {
			self::$connection = @new PDO(
				"mysql:host=$host;dbname=$database",
				$user,
				$password,
				self::$settings
			);
		}
	}

	public static function queryOne(string $query, array $parameters = array()): array|bool
	{
		$statement = self::$connection->prepare($query);
		$statement->execute($parameters);

		return $statement->fetch();
	}
}