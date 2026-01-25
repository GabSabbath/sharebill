# https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: 
	@grep -E '^[a-zA-Z_-]+.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

setup: ## Setup dev environment
	./docker/setup.sh

reset: ## Reset the dev environment 
	make destroy 
	make setup

install-npm: ## npm install
	docker compose run --rm node npm install

install-composer: ## composer install 
	docker compose run --rm php composer install

destroy: ## Destroy and purge all dev environment 
	docker compose -f docker-compose.dev.yml down --rmi all --volumes
	rm .env 
	rm -rf node_modules
	rm -rf .npm-cache
	rm -rf vendor/
	rm -rf composer.lock

start: ## Start the dev environment (do `dev-setup` at least once first)
	docker compose start 

stop: ## Stop containers
	docker compose stop

puml-generate: ## Generate the `svg` files from `/models/*.puml`
	docker compose run --rm -T plantuml-converter --svg '/doc/**/*.puml'

ssh-add-key: ## Unlock your ssh key so you enter your password all the time
	eval `ssh-agent`
	ssh-add

prettier: ## Run prettier on the entire project
	docker compose run --rm php npx prettier --write .