default: help

run_docker=docker run -v $(shell pwd):/app -w /app --rm -it laravel-db-connstring-parser

help: ## This help message
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' -e 's/:.*#/: #/' | column -t -s '##'

build-docker-image:
	docker build -t laravel-db-connstring-parser .

install: ## Install dependencies with Composer
	@$(MAKE) build-docker-image
	@$(run_docker) composer install

update: ## Update dependencies with Composer
	@$(run_docker) composer update

sh: ## Open a shell in the container
	@$(run_docker) /bin/sh

check: ## Run PHP Insights
	@$(run_docker) ./vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=2G

check-native: ## Run PHP Insights without Docker
	./vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=2G

test: ## Run tests
	@$(run_docker) ./vendor/bin/phpunit -c phpunit.xml

test-native: ## Run tests without Docker
	./vendor/bin/phpunit -c phpunit.xml
