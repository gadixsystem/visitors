# Visitors (Laravel Package)
Simple visitor middleware for your laravel project with UI and helpers!!

## **Installation:**

From your command line run: 

*composer require gadixsystem/visitors*

**Register the provider**

In config/app.php add the follow line:
```
 'providers' => [
        //Visitors
        gadixsystem\visitors\VisitorsServiceProvider::class,
  ]
  ```
  **The publish methods**

You need to make some migrations:
From your command line type: 
```
php artisan vendor:publish --provider="gadixsystem\visitors\VisitorsServiceProvider" --tag=migrations
```
  
  Now your migrations are in your database/migrations directory.
  
  Run Migrations:
  ```
php artisan migrate
  ```
  
  
  ## **The UI**
  By default your UI is available in https://yourApp.domain/visitors, but first you need to make 1 more step:
  
  ```
php artisan vendor:publish --provider="gadixsystem\visitors\VisitorsServiceProvider" --tag=views
  ```
  
  With this command, the views of visitors package are availabe in your resources/views folder (Feel free to customize!).

  
  
  ### **Config file**
  
    
  But... the permissions ?? No problem with that! The visitors package have a config file to customize your middleware:
  
  Only run:
  
    
  ```
php artisan vendor:publish --provider="gadixsystem\visitors\VisitorsServiceProvider" --tag=config
  ```
  
  And new file is appear in your config folder.
  
  * Dashboard: true/false 
  
  * Prefix: The prefix of visitors UI
  
  * Middleware: you can add additional middleware to your dashboard.
  
   ```
  return [
    /**
     * Visual interface of visitors
     */
    'dashboard' => true,
    /**
     * Prefix for visitors route
     * Navigate to your app /visitors (or your new path to view interface)
     */
    'prefix' => 'visitors',
    /**
     * Middleware
     * Here you can put your prefers middleware to visitors dashboard
     */
    'middleware' => [
        'web',
        //'auth',
        'visitors'
        // ...
    ]
];
  ```
  
  
  ### *How to use?*
  
  It's very simple, you only need to add **visitors** middleware to the routes for track:
  
  * E.g:
   ```
  Route::get('/', 'YourController@index')->middleware(['visitors']);
   ```
  
  
  ### *Helper*
 You can make your own dashboard:
  
  * First, add VisitorsHelper to your Controller
  ```
  use gadixsystem\visitors\VisitorsHelper;
  ```
  
* **Methods:**
  
  * **VisitorsHelper::getToday();**
  
  * **VisitorsHelper::getActive();**
  
  * **VisitorsHelper::getBlocked();**
  
  * **VisitorsHelper::getTotal();**
  
  * **VisitorsHelper::graphic();**
  
 
  
 ### *Test*
  
  Run:
    ```
  vendor/bin/phpunit vendor/gadixsystem/visitors/src/tests
    ```
 
