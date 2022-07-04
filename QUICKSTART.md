1. Create a Laravel project
```bash
laravel new MyProject
```

2. Install the package
```bash
composer require heloufir/filament-workflow-manager
```

3. Register package into your application providers `config/app.php`
```bash
\Heloufir\FilamentWorkflowManager\FilamentWorkflowManagerServiceProvider::class,
```

4. Publish migrations (Optional)
```bash
php artisan vendor:publish --tag="filament-workflow-manager-migrations"
```

5. Publish config file (Optional)
```bash
php artisan vendor:publish --tag="filament-workflow-manager-config"
```

6. Run migrations
```bash
php artisan migrate
```

7. Create a new Filament user (refer to the Filament documentation)
[https://filamentphp.com/docs/2.x/admin/installation#installation](https://filamentphp.com/docs/2.x/admin/installation#installation)

8. Server your project
```bash
php artisan serve
```
Here you can see a menu named `Workflows` under `Settings` menu group, it's where you can manage your workflows.
