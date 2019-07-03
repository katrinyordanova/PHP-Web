<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 2.11.2018 г.
 * Time: 16:20
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $form,$className);
}