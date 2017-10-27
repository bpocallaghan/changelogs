# Changelogs
Add changelogs to your laravel admin project.
This will allow you to track the changes of your application.

## Installation
Update your project's `composer.json` file.

```bash
composer require bpocallaghan/changelogs
```

## Usage

Register the routes in the `routes/vendor.php` file.
- Website 
`Route::resource('changelog', 'Changelogs\Controllers\Website\ChangelogsController');`
- Admin 
`Route::resource('settings/changelogs', 'Changelogs\Controllers\Admin\ChangelogsController');`

## Commands
```bash
php artisan changelogs:publish
```
This will copy the `database/seeds` and `database/migrations` to your application.
Remember to add the `$this->call(ChangelogTableSeeder::class);` in the `DatabaseSeeder.php`

```bash
php artisan changelogs:publish --files=all
```
This will copy the `model, views and controller` to their respective directories. 
Please note when you execute the above command. You need to update your `routes`.
```bash 
// website
Route::get('/changelog', 'ChangelogsController@index');
// admin/settings
Route::resource('changelogs', 'ChangelogsController');
```

## Demo
This is being used inside [Laravel Admin Starter](https://github.com/bpocallaghan/laravel-admin-starter) project.

### TODO
- When the controller gets published - the vendor's views will be loaded (manually need to be updated)
- rename `changelogs::index` TO `settings.changelogs.index`