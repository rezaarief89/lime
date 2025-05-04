<?php
namespace Lime\Sample\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldText()
    {
        return '<h1>Hello World</h1>';
    }
}
