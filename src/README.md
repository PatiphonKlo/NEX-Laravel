Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Useful extensions for VS code Developer

-   Auto close tag
-   Auto Rename Tag
-   Bracket Pair Colorization Toggler
-   highlight matching tag
-   Color Highlight
-   Tailwind CSS IntelliSense
-   JavaScript (ES6) code snippets
-   Path Intellisense
-   PHP Intelephense
-   Laravel Blade Snippets
-   Git Graph
-   Jira and Bitbucket (Atlassian Labs)

# Project initial step

-   Install tailwind with laravel version 10 https://tailwindcss.com/docs/guides/laravel
-   Install PHP version 8.1 (And set environment path)
-   Install Composer (installed globally)
-   Install Node.js
-   Install Kreait library version 7.x https://firebaseopensource.com/projects/kreait/firebase-php/ ,
    https://github.com/kreait/firebase-php
-   go to firebase and create a project https://firebase.google.com/
-   firebase setup database, rules, service plan
-   read docs to config firebase with laravel https://firebase-php.readthedocs.io/en/stable/
-   read official documentation to learn php and firebase https://firebase.google.com/docs/build
-   intall other library including
    -   flowbite css & javascript library to make components & templates
        https://flowbite.com/docs/getting-started/laravel/
    -   dompdf for generating pdf https://github.com/barryvdh/laravel-dompdf

############# use this to data add test ############
for ($i = 1; $i <= 10; $i++) {
                $faker = Factory::create();
                $postData1 = [
                    'created_at' => new Timestamp(new DateTime()),
                    'created_by' => Session::get('uid'),
                    'edited_at' => new Timestamp(new DateTime()),
                    'edited_by' => Session::get('uid'),
                    'product_name' => $faker->name(),
                    'product_group' => "HSD",
                    'product_model' => "UD-HSD-2200",
                    'product_price' => 2,
                    'product_down_payment' => 10,
                    'product_after_install' => 10,
                    'product_final_check' => 80,
                    'product_price_validity' => 10,
                    'product_delivery_term' => 10,
                    'product_credit_day' => 10,
                    'product_discount' => 10,
                    'product_assurance' => 10,
                    'assembly_part' => ["A-489489", "H-10092"],
                    'technical_data' => []
                ];
                $newDocument = $this->firestore->collection(config('firebase.collection.product'))->newDocument();
                $documentKey = $newDocument->id();
                $postDocument = $this->firestore->collection(config('firebase.collection.product'))->document($documentKey)->set($postData1);
}
