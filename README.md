# PHP Memory leaks - and how to find them
This repo contains source codes for talk about memory leaks delivered on PHP Poland 2023


## prerequisite

### build docker
```bash
docker build -t php81-xdebug .
```

### dump autoloader
```bash
composer dump-autoload
```


## execute examples


```bash
./php81 complexExample.php
```

You can play with memory limit by setting property "memory_limit":
```bash
./php81 -d memory_limit=3000M complexExample.php
```

