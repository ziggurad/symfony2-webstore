directory-privilages:
	mkdir -p app/cache app/logs
	rm -rf app/cache/*
	rm -rf app/logs/*
	sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs
	sudo setfacl -dR -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs

clean:
	rm -rf app/cache/*
	app/console cache:clear

create-database:
	app/console --no-interaction doctrine:database:create --env=dev

schema-update:
	app/console --no-interaction doctrine:schema:update --force --env=dev

fixtures:
	app/console doctrine:fixtures:load

test:
	app/console --no-interaction lint:yaml src/
	app/console --no-interaction lint:twig src/
	vendor/fabpot/php-cs-fixer/php-cs-fixer --level=symfony fix src/ --dry-run --diff

fix:
	vendor/fabpot/php-cs-fixer/php-cs-fixer --level=symfony fix src/
