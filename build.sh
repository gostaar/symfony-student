#!/bin/bash

# Installer les dépendances
composer install --no-dev --optimize-autoloader

# Construire le projet Symfony (par exemple, migrer la base de données)
php bin/console doctrine:migrations:migrate

# Nettoyer les caches Symfony
php bin/console cache:clear --env=prod
