Sample application using yii2-ecom
=============
The only purpose of this package is to demonstrate usage and features of the package [opus-online/yii2-ecom](https://github.com/opus-online/yii2-ecom). Examples include:

- Example database setup with products, discounts, orders, invoices, users and payment log
- ActiveRecord models implementing Order and Product functionality
- Full order lifecycle (list → basket → order → payments → invoices)
- UI components to list all AR objects (plus shopping basket contents)

Installation 
------------
You need an environment running PHP 5.4+ and an empty database. 

1. `php composer.phar create-project opus-online/yii2-app-ecom ecom --stability=dev --prefer-dist`
2. `cd ecom`
3. Run `./yii init` and follow the instructions on the screen to set up the database
4. Open `<directory>/web` in your web browser

See the [documentation](https://github.com/opus-online/yii2-payment) for `opus-online/yii2-ecom` for more. 

Database schema
---------------
This is the database schema used by the application. Active Record models have been generated using [opus-online/yii2-advmodel](https://github.com/opus-online/yii2-advmodel).

![Database schema](https://github.com/opus-online/yii2-app-ecom/blob/master/schema/schema.png?raw=true "Database schema")
