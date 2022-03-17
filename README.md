# humorous-tech-challenge
A technical challenge using humorous units of measurement.

## Minimum Requirements

- Docker engine v19.03
- Docker compose v1.25
  
While it may be straightforward for users of MacOS and Linux, installing Docker into Windows may be a bit daunting since you will need to enable [Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/install) (WSL) first.
## How to Use

Clone the repository and change the environment variables as needed.

In `docker-compose.yml`:

```
TIME_ZONE: "Pacific/Auckland"
VIRTUAL_HOST: "localhost"
```

The `TIME_ZONE` variable have a [list of supported timezones](https://www.php.net/manual/en/timezones.php) while the `VIRTUAL_HOST` variable can accept any host (e.g., site.dev.local, example.com).

In `data/docker/secret.env`:

```
MYSQL_ROOT_PASSWORD=root123!
MYSQL_USER=devs
MYSQL_PASSWORD=devs123!
MYSQL_DATABASE=hum
```

Build the containers and access the `web` container:

```bash
docker-compose up -d --build

docker-compose run --rm web bash
```

From the default working directory, run Composer to install the package dependencies:

```bash
composer install
```

---
Work in progress.