# Payments

I created this app to get an understanding of how to use Laravel Scout with a VueJS frontend.  
It's a _very_ basic setup, and I don't intend on spending any time adding support for other platforms.

## Initial Setup: 
```shell
composer install
npm install
```
If you're using Laravel Valet you can also run: 
```shell
valet link payments
```
This will setup a url for `http://payments.test`. If your app is configured using a different url you will have to update  
`/resources/js/utils/api.js` `url` variable and run `npm run prod` to ensure VueJS and call the API.


This app will require Redis and Meilisearch/Algolia to be properly configured to work.  
I've added some info below for how I got everything working. But your experience may vary.  

### Mac
Mac users can install Redis/Meilisearch locally using
```shell
brew install redis
brew install meilisearch
```

### Docs
Or you can get more info from the following docs:  
[Laravel Scout driver prerequisites](https://laravel.com/docs/9.x/scout#driver-prerequisites)  
[Meilisearch Setup and info](https://docs.meilisearch.com/learn/getting_started/quick_start.html#step-1-setup-and-installation)  
[Redis](https://redis.io/)  

### Next Steps
Once you've added Payment data to the database, you can import to Algolia/Meilisearch using
```shell
php artisan scout:import "App\Models\Payment"
php artisan queue:work
```
