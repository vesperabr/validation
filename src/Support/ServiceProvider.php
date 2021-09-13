<?php

namespace Vespera\Validation\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $rules = [
            'cnpj' => \Vespera\Validation\Rules\Cnpj::class,
            'cpf' => \Vespera\Validation\Rules\Cpf::class,
            'cpf_ou_cnpj' => \Vespera\Validation\Rules\CpfOuCnpj::class,
            'uf' => \Vespera\Validation\Rules\Uf::class,
        ];

        foreach ($rules as $name => $class) {
            $rule = new $class();

            $extension = static function ($attribute, $value) use ($rule) {
                return $rule->passes($attribute, $value);
            };

            $this->app['validator']->extend($name, $extension, $rule->message());
        }
    }
}
