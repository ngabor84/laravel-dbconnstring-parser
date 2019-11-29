default: help

run_docker=docker run -v $(pwd):/app -w /app --rm -it laravel-db-connstring-parser

help: ## This help message
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' -e 's/:.*#/: #/' | column -t -s '##'

build-docker-image:
	docker build -t laravel-db-connstring-parser .

install: ## Install dependencies with Composer
	@$(MAKE) build-docker-image
	@$(run_docker) sleep 1 && composer install

update: ## Update dependencies with Composer
	@$(run_docker) sleep 1 && composer update

sh: ## Open a shell in the container
	@$(run_docker) sleep 1 && /bin/sh

check: ## Run PHP Insights
	@$(run_docker) sleep 1 && ./vendor/bin/phpinsights --config-path=insights.php --no-interaction --min-quality=100 --min-architecture=100 --min-style=100

check-native: ## Run PHP Insights without Docker
	./vendor/bin/phpinsights --config-path=insights.php --no-interaction --min-quality=100 --min-architecture=100 --min-style=100

test: ## Run tests
	@$(run_docker) sleep 1 && ./vendor/bin/phpunit -c phpunit.xml

test-native: ## Run tests without Docker
	./vendor/bin/phpunit -c phpunit.xml
