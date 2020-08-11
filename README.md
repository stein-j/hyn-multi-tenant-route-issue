## The issue

With `hyn/multi-tenant`, url generation are broken when called inside of a queue worker.
This happens on any url generator: `route()` / `redirect()` / `URL::signedRoute()` etc... 

## How to reproduce
 
```bash
composer install 
```

```bash
cp .env.example .env 
```

Create a database, add it in the env configuration.

Because we're going to use database queues, make sure in your .env you have `QUEUE_CONNECTION=database` and not sync. (The default value in the .env.example has already been changed)
 
```bash
php artisan key:generate 
```

Update your `APP_URL` variable to your local FQDN

```bash
APP_URL=system.com
```

```bash
php artisan migrate 
```

Lets create a tenant:

```bash
php artisan tinker 
```

Lets create a tenant via Tinker, simply update the fqdn url `$hostname->fqdn = 'tenant.system.com';`

> NOTE: For this test you don't even need to create a tenant... but what the heck... You can skip this step

```php
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

$website = new Website;
app(WebsiteRepository::class)->create($website);

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

$hostname = new Hostname;
$hostname->fqdn = 'tenant.system.com';
$hostname = app(HostnameRepository::class)->create($hostname);
app(HostnameRepository::class)->attach($hostname, $website);
```

Lets run laravel:
```bash
php artisan serve 
```

Run a worker
```bash
php artisan queue:work
```

## Results

1) Go to `/job` (in the tenant or system fqdn)
2) This will run a small job that will be queued  
3) This job logs the generated urls inside of `storage/logs/laravel.log`.

Also you can tap on `/now` which will run the job in this instance without queuing it.
