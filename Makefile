SHELL := /bin/bash

.PHONY: up down reset sh logs install migrate test artisan

up:
	docker compose up -d --build

down:
	docker compose down

reset:
	docker compose down -v
	rm -rf vendor node_modules bootstrap/cache/*.php public/storage
	rm -f .env

sh:
	docker compose exec -u www-data app bash

logs:
	docker compose logs -f --tail=100

install:
	# Crea Laravel solo si no existe (no pisa nada)
	if [ ! -f artisan ]; then \
		docker compose run --rm app bash -lc 'set -e; \
		  composer create-project laravel/laravel /tmp/laravel; \
		  shopt -s dotglob; \
		  cp -an /tmp/laravel/* /var/www/html/'; \
	fi
	cp -n .env.example .env || true
	docker compose run --rm app php artisan key:generate
	docker compose run --rm app php artisan storage:link

migrate:
	docker compose run --rm app php artisan migrate

test:
	docker compose run --rm app php artisan test -q

artisan:
	@docker compose run --rm app php artisan $(CMD)
	@true

composer:
	@docker compose run --rm app composer $(CMD)
	@true

reverb:
	docker compose exec app php artisan reverb:start --port=8081 --host=0.0.0.0

queue:
	docker compose exec app php artisan queue:work

npm:
	docker compose run --rm app npm $(CMD)

build:
	docker compose run --rm app npm run build

dev:
	docker compose run --rm app npm run dev

ollama-pull:
	docker compose exec ollama ollama pull llama3.2:3b

ollama-tags:
	docker compose exec app curl -sS http://ollama:11434/api/tags

ollama-generate:
	docker compose exec app curl -sS http://ollama:11434/api/generate \
		-H "Content-Type: application/json" \
		-d '{"model":"llama3.2:3b","prompt":"Escriu una frase curta sobre un estadi.","stream":false}'


