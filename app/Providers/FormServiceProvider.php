<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Form::component('myText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('mySelect', 'components.form.select', ['name', 'value' => null, 'options' => [], 'attributes' => []]);
        Form::component('myEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('myDate', 'components.form.date', ['name', 'value' => null, 'attributes' => []]);
        Form::component('myNumber', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);
        Form::component('myMobile', 'components.form.mobile', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}