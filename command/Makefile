ifeq ($(OS),Windows_NT)
	ROOT_DIR = $(CURDIR)
else
	ROOT_DIR = $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))
endif

run:
	docker run -it --rm -v "$(ROOT_DIR)":/var/www/ -w /var/www/ php:7.3-cli php index.php