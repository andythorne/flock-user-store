# Flock User Store

[![Packagist](https://img.shields.io/packagist/dt/andythorne/flock.svg?style=flat-square)](https://packagist.org/packages/andythorne/flock)

Storage system for users with oauth2 support, written in [Symfony >= 3.4/4.0](http://symfony.com/) with [FOSOAuth](https://github.com/FriendsOfSymfony/FOSOAuthServerBundle), 
[FOSUser](https://github.com/FriendsOfSymfony/FOSUserBundle) and [EasyAdmin](https://github.com/javiereguiluz/EasyAdminBundle).

## Installation
Flock is a Symfony project, not a bundle. To install it, create a new project with composer: 

```bash
composer create-project andythorne/flock flock
cd flock
```

> With the incoming release of [Symfony Flex](https://symfony.com/doc/current/setup/flex.html), this will be moved to a pack rather than a project.

## Running With Docker

Flock comes with an example [Docker](https://www.docker.com/) container setup using:
  - [richarvey/nginx-php-fpm](https://hub.docker.com/r/richarvey/nginx-php-fpm/)
  - [mariadb10](https://hub.docker.com/_/mariadb/)

To get started, run:
```bash
docker-compose up -d
```

Docker will expose the app over the external network `flock`, which your can link to.

## Usage

### Public Endpoints
Flock uses the standard [FOSUser](https://github.com/FriendsOfSymfony/FOSUserBundle) endpoints for user registration,
login and profile management. 

> See https://symfony.com/doc/master/bundles/FOSUserBundle/index.html for documentation for extending flock's FOSUser
implementation

### Administration
Flock uses [EasyAdmin](https://github.com/javiereguiluz/EasyAdminBundle) to provide an admin interface for managing users
and OAuth clients. Create a super admin user (`./bin/console fos:user:create <username> <email> <password> --super-admin`)
and head to `/admin`.

### OAuth2
In order to use OAuth2, you first need to create an OAuth Client. Head to `/admin` and create a new `Client`, and copy
the generated `public id` and `secret` into your app's OAuth Client.

| Endpoint          | Description    |
|-------------------|----------------|
| `/oauth/v2/token` | Token          |
| `/oauth/v2/auth`  | Authentication |
| `/api/user`       | User Data      |

For a guide on how to use [HWIOAuthBundle](https://github.com/hwi/HWIOAuthBundle) in your app to authenticate with flock,
see

## Authors
Written by: 
   - [Andy Thorne](https://github.com/andythorne)
