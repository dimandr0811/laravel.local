<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuessBaseController;

/**
 * Базовый контроллер для всех контроллеров управления
 * блогом в панели администратора
 *
 * Должен быть родителем всех контроллеров управления блогом
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuessBaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }
}
