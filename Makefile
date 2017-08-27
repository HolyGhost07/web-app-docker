NAME=app

build:
	docker build -f nginx/Dockerfile -t project-nginx .
	docker build -f php/prod/Dockerfile -t project-php-prod .
	docker build -f php/dev/Dockerfile -t project-php-dev .

run-dev:
	docker stack deploy -c docker-compose-dev.yml $(NAME)

run-prod:
	docker stack deploy -c docker-compose-prod.yml $(NAME)

remove:
	docker stack rm $(NAME)

services:
	docker stack services $(NAME)

init:
	docker swarm init

leave:
	docker swarm leave -f