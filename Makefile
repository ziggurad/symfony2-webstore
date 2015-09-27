directory-privilages:
	mkdir -p app/cache app/logs
	rm -rf app/cache/*
	rm -rf app/logs/*
	sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs
	sudo setfacl -dR -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs