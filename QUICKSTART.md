## Installation

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

4. Run migrations
```bash
php artisan migrate
```

5. Create a new Filament user (refer to the Filament documentation)
[https://filamentphp.com/docs/2.x/admin/installation#installation](https://filamentphp.com/docs/2.x/admin/installation#installation)

6. Server your project
```bash
php artisan serve
```
Here you can see a menu named `Workflows` under `Settings` menu group, it's where you can manage your workflows.

## Configuration

1. Create your model
```bash
php artisan make:model MyModel
```

2. Configure your model to implement Workflow manager
```bash
use Heloufir\FilamentWorkflowManager\Core\HasWorkflow;
use Heloufir\FilamentWorkflowManager\Core\InteractsWithWorkflows;
// ...

class Project extends Model implements HasWorkflow
{
    use InteractsWithWorkflows;
    
    // ...
}
```

Here you need to add the implementation of the interface `InteractsWithWorkflows` and add the use of the trait `InteractsWithWorkflows` to your model.

3. Create a workflow
After you have configured your model, you can now create a workflow linked to this model:


5. Add a Filament resource to manage your model
Refere to the Filament documentation: [https://filamentphp.com/docs/2.x/admin/resources/getting-started#creating-a-resource](https://filamentphp.com/docs/2.x/admin/resources/getting-started#creating-a-resource)


