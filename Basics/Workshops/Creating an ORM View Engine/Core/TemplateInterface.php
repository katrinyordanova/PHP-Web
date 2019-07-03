<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 31.10.2018 г.
 * Time: 18:15
 */

namespace Core;

interface TemplateInterface
{
    public function render(string $templateName, $data);
}