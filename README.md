The `vesperabr/validation` package provides an easy whay to validate input data.

It could be used in pure PHP or in Laravel projects.

## Installation
You can install the package via composer:

```bash
$ composer require vesperabr/validation
```

The package will automatically register itself in Laravel.

## How to use in Laravel
All you need to do is append the rule to your rules list.

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'cpf' => 'required|cpf',
    ]);
}
```

### Available rules
- cnpj
- cpf
- cpf_ou_cnpj
- uf

## How to use in PHP
```php
use Vespera\Validation\Cpf;
$validation = Cpf::make('111.111.111-11')->validate();
```

### Avaiable classes
- `Vespera\Validation\Cnpj`
- `Vespera\Validation\Cpf`
- `Vespera\Validation\CpfOuCnpj`
- `Vespera\Validation\Uf`

## Testing
```bash
$ composer test
```

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits
- [Ricardo Monteiro](https://github.com/ricazao)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
