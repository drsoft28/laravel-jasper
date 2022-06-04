

# LaravelJasper
_A Laravel Report Generator_

this package copied from 
https://github.com/PHPJasper/phpjasper

## Installation
Install [Composer](http://getcomposer.org) if you don't have it.

```
composer require drsoft/laraveljasper
```
```
php artisan vendor:publish --tag=laravel-jasper-config
```
you can change `path_executable` and `jre_bin` if java 8 is not as default.


----------------------------------------------------------------------------------------------------------------------------


## Examples

### The *Hello World* example.

Go to the examples directory in the root of the repository (`vendor/drsoft/laraveljasper/examples`).
Open the `hello_world.jrxml` file with Jaspersoft Studio or with your favorite text editor and take a look at the source code.

#### Compiling

First we need to compile our `JRXML` file into a `JASPER` binary file. We just have to do this one time.

**Note 1:** You don't need to do this step if you are using *Jaspersoft Studio*. You can compile directly within the program.
**Note 2:** `$path_reports` if is null the command  will execute where jasperstart else will execute where report so will know subreport in the same directory and also resources.

```php

use LaravelJasper;
$path_reports = null
$input = __DIR__ . '/vendor/drsoft/laraveljasper/examples/hello_world.jrxml'; 

OR  

$input = 'hello_world.jrxml'; 
$path_reports = __DIR__ . '/vendor/drsoft/laraveljasper/examples/';

LaravelJasper::compile($input,'',$path_reports)->execute();
```

This commando will compile the `hello_world.jrxml` source file to a `hello_world.jasper` file.

#### Processing

Now lets process the report that we compile before:

```php


use LaravelJasper;

$path_reports = null
$input = __DIR__ . '/vendor/drsoft/laraveljasper/examples/hello_world.jasper'; 

OR  

$input = 'hello_world.jasper'; 
$path_reports = __DIR__ . '/vendor/drsoft/laraveljasper/examples/';

$output = __DIR__ . '/vendor/drsoft/laraveljasper/examples';    
$options = [ 
    'format' => ['pdf', 'rtf'] 
];


LaravelJasper::process(
    $input,
    $output,
    $options,
    $path_reports
)->execute();
```

Now check the examples folder! :) Great right? You now have 2 files, `hello_world.pdf` and `hello_world.rtf`.

Check the *methods* `compile` and `process` in `src/LaravelJasper.php` for more details

#### Listing Parameters

Querying the jasper file to examine parameters available in the given jasper report file:

```php


use LaravelJasper;

$path_reports = null
$input = __DIR__ . '/vendor/drsoft/laraveljasper/examples/hello_world.jrxml'; 

OR  

$input = 'hello_world.jrxml'; 
$path_reports = __DIR__ . '/vendor/drsoft/laraveljasper/examples/';


$output = LaravelJasper::listParameters($input,$path_reports)->execute();

foreach($output as $parameter_description)
    print $parameter_description . '<pre>';
```

### Using database to generate reports

We can also specify parameters for connecting to database:

```php

use LaravelJasper;    

$path_reports = null
$input = '/your_input_path/your_report.jasper'; 

OR 
$path_reports = 'your_input_path'
$input = 'your_report.jasper'; 

$output = '/your_output_path';
$connection= config('database.default');
$databaseName = config('database.connections.'.$connection);
        
            
            $options = [
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => [
                    "RECORD_ID"=>1,

                ],
            
                'db_connection' => [
                    'driver' => $connection, //mysql, ....
                    'username' => $databaseName['username'],
                    'password' => $databaseName['password'],
                    'host' => $databaseName['host'],
                    'database' => $databaseName['database'],
                    'port' => $databaseName['port']
                ]
            ];


LaravelJasper::process(
        $input,
        $output,
        $options,
        $path_reports
)->execute();
```

## Thanks

Geekcom for the [PHPJasper](https://github.com/PHPJasper/phpjasper).

[Cenote GmbH](http://www.cenote.de/) for the [JasperStarter](http://jasperstarter.sourceforge.net/).

## [Questions?](https://github.com/drsoft/laravel-jasper/issues)

Open a new [Issue](https://github.com/drsoft/laravel-jasper/issues) or look for a closed issue


## License

MIT#� �l�a�r�a�v�e�l�-�j�a�s�p�e�r�
�
�
