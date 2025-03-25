docker up:
	docker compose -p endpoint_php up -d --build --force-recreate

docker down:
	docker compose -p endpoint_php down

phpstan:
	docker exec endpoint_php vendor/bin/phpstan analyse app

test:
	docker exec endpoint_php vendor/bin/codecept run --steps

composer-install:
	docker exec endpoint_php composer install

composer-update:
	docker exec endpoint_php composer update