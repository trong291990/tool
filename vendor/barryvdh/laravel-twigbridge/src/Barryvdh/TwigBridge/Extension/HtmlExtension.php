<?php
namespace Barryvdh\TwigBridge\Extension;

use  Illuminate\Html\HtmlBuilder;
use  Illuminate\Support\Str;

class HtmlExtension extends \Twig_Extension
{
    protected $html;

    public function __construct(HtmlBuilder $html){
        $this->html = $html;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(){
        return 'laravel_html';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions(){
        $html = $this->html;
        return array(
            new \Twig_SimpleFunction('link_to', array($html, 'link'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('link_to_asset', array($html, 'linkAsset'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('link_to_route', array($html, 'linkRoute'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('link_to_action', array($html, 'linkAction'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('html_*', function($name) use($html){
                $arguments = array_slice(func_get_args(), 1);
                $name = Str::camel($name);
                return call_user_func_array(array($html, $name), $arguments);
            }, array('is_safe' => array('html'))),

        );
    }

}
