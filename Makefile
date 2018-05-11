# http://www.linuxdevcenter.com/pub/a/linux/2002/01/31/make_intro.html?page=2
# Naming our phony targets
.PHONY: init up stop build ps config

IMAGE_VERSION := $(shell git rev-parse --short HEAD)

export IMAGE_VERSION

init:
	mkdir -p mongodb/data

up: stop init
	docker-compose up

up-dev: stop init
	docker-compose -f docker-compose-dev.yml up

stop:
	docker-compose stop

down:
	docker-compose down

build: stop
	docker-compose build

ps:
	docker-compose ps

config:
	docker-compose config