NAME=app

# http://www.linuxdevcenter.com/pub/a/linux/2002/01/31/make_intro.html?page=2
# Naming our phony targets
.PHONY: init up stop build ps

init:
	mkdir -p mongodb/data

up: stop init
	docker-compose up

stop:
	docker-compose stop

build: stop up
	docker-compose build

ps:
	docker-compose ps