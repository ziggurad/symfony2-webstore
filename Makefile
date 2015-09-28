update: install-without-db update-schemas

install: directory-privilages install-without-db install-db

install-db: create-database create-schema load-fixtures

directory-privilages:
	mkdir -p app/cache app/logs
	rm -rf app/cache/*
	rm -rf app/logs/*
	sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs
	sudo setfacl -dR -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs

clean:
	rm -rf app/cache/*
	app/console cache:clear

update-schemas:
	app/console --no-interaction doctrine:schema:update --force --env=dev

fixtures:
	app/console doctrine:fixtures:load

install-without-db:
	composer --no-interaction install
	rm -rf app/cache/*
	app/console --no-interaction cache:clear --env=dev

create-database:
	app/console --no-interaction doctrine:database:create --env=dev

create-schema:
	app/console --no-interaction doctrine:schema:create --env=dev

load-fixtures:
	app/console doctrine:fixtures:load --env=dev

test:
	app/console --no-interaction lint:yaml src/
	app/console --no-interaction lint:twig src/
	vendor/fabpot/php-cs-fixer/php-cs-fixer --level=symfony fix src/ --dry-run --diff

fix:
	vendor/fabpot/php-cs-fixer/php-cs-fixer --level=symfony fix src/