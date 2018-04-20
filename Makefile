NAME=app

up: stop
	docker-compose up

stop:
	docker-compose stop

build: stop up
	docker-compose build

ps:
	docker-compose ps