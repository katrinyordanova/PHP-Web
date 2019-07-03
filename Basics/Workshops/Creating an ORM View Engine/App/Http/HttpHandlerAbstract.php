<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 1.11.2018 г.
 * Time: 15:02
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(TemplateInterface $template,DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder=$dataBinder;
    }

    public function render(string $templateName,$data=null){
        $this->render($templateName,$data);
    }

    public function redirect($url){
        header("Location: $url");
    }
}