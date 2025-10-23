

# Task manager
laravel + vue + inertia

Application allow to save notes, informations


### Project start

start docker

```
docker compose up
```

migracja

```
php artisan migrate
php artisan db:seed
```

Wykrywaj zmiany w vue

```
npm run dev
```


### CSS - gotowe komponenty

Wykorzystany jest  tailwindcss + daisyui

https://daisyui.com


# Migration

### Make model set

Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...

```
php artisan make:model Project -a
```

### Seeds

```
php artisan db:seed
php artisan db:seed ProjectSeeder
```

### Run migrations

```
php artisan migrate
php artisan make:migration add_some_column

```

rollback 1 migration file

```
php artisan migrate:rollback --step=1
```