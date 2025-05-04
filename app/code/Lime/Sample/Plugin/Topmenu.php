<?php

namespace Lime\Sample\Plugin;
use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\UrlInterface;

class Topmenu
{
    protected $nodeFactory;
    protected $urlBuilder;

    public function __construct(NodeFactory $nodeFactory, UrlInterface $urlBuilder)
    {
        $this->nodeFactory = $nodeFactory;
        $this->urlBuilder = $urlBuilder;
    }

    public function beforeGetHtml(\Magento\Theme\Block\Html\Topmenu $subject, $outermostClass = '', $childrenWrapClass = '', $limit = 0)
    {
        $homeNode = $this->nodeFactory->create(['data' => $this->getNodeAsArray("Home", "homeMenu", "/"),
            'idField' => 'id',
            'tree' => $subject->getMenu()->getTree()]);
        $subject->getMenu()->addChild($homeNode);

        $helloNode = $this->nodeFactory->create(['data' => $this->getNodeAsArray("Hello", "helloMenu", "/sample/index"),
            'idField' => 'id',
            'tree' => $subject->getMenu()->getTree()]);
        $subject->getMenu()->addChild($helloNode);

    }

    protected function getNodeAsArray($name, $id, $url)
    {
        return ['name' => __($name),
            'id' => $id,
            'url' => $url,
            'has_active' => false,
            'is_active' => false,];
    }
}