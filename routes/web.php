<?php

Illuminate\Support\Facades\Auth::routes();

$this->get('/', 'HomeController@index')->name('home.index');
