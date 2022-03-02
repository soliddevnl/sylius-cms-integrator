test:
	symfony php vendor/bin/phpunit

check-fix:
	symfony php vendor/bin/ecs check src --fix
	symfony php vendor/bin/ecs check tests --fix
