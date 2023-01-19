# Simple PHP MVC Framework

## Using the **PSR-12** code standard
https://www.php-fig.org/psr/psr-12/

## Follow these steps to launch the application:

**1.** Go to docker directory.
```bash
cd docker
```

**2.** Run the following command (for Windows platform use **copy** command).
```bash
cp docker-compose.env.example docker-compose.env && cp docker-compose.override.example.yml docker-compose.override.yml
```

**3.** Run the following command.
```bash
docker-compose up -d
```

**4.** Go inside php container and run.
```bash
composer install
```

## Docker commands:

**1.** Show containers list.
```bash
docker ps
```

**2.** Go inside php container.
```bash
docker exec -ti mvc_php bash
```