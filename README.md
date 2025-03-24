# exagonal_blog

### Requirements
---

- PHP 8.3
- Symfony 7.2
- Apache 2.4
- MySQL 5.7
- Composer 2

### Usage
---

### Installation
---

```
git clone git@github.com:Jonathanlight/exagonal_blog.git
$ cd exagonal_blog

# or start docker containers
$ make docker-run

# install dependencies
$ make docker-exec apache bash
$ composer install

# create migrations
$ make docker-exec apache bin/console doctrine:migrations:migrate

# load fixtures
$ make docker-exec apache bin/console doctrine:fixtures:load

server running on http://localhost:8000
```

### Installation SSl
---
```
cd docker/etc/apache/ssl/

openssl req -x509 -out server.crt -keyout server.key \
-newkey rsa:2048 -nodes -sha256 \
-subj '/CN=localhost' -extensions EXT -config <( \
printf "[dn]\nCN=localhost\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:localhost\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth")

```

### Configuration
---

### Pipeline
---

```yaml
make phpstan

make php-cs-fixer
```

### Authors
---

- Jonathan

