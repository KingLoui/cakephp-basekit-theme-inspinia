<?php
// based loosely on https://github.com/Nek-/KnpMenu/blob/219add0a71e4c70f9f928d809a242c0ffa92ab86/src/Knp/Menu/Renderer/BreadcrumbRenderer.php 

namespace KingLoui\BaseKitThemeInspinia\Menu\Renderer;

use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\ListRenderer as KnpListRenderer;

class AdminMenuRenderer extends KnpListRenderer
{

    public function render(ItemInterface $item, array $options = array())
    {
        $options = array_merge($this->defaultOptions, $options);

        $html = $this->renderList($item, $item->getAttributes(), $options);

        if ($options['clear_matcher']) {
            $this->matcher->clear();
        }

        return $html;
    }

    protected function renderList(ItemInterface $item, array $attributes, array $options)
    {
        /**
         * Return an empty string if any of the following are true:
         *   a) The menu has no children eligible to be displayed
         *   b) The depth is 0
         *   c) This menu item has been explicitly set to hide its children
         */

        $html = '';

        if (!$item->hasChildren() || 0 === $options['depth'] || !$item->getDisplayChildren()) 
            return $html;
        
        $ulClass = 'nav';
        switch($item->getLevel()){
        	case 1:  $ulClass.=" nav-second-level"; break;
        	case 2:  $ulClass.=" nav-third-level"; break;
        }


        if($item->getLevel() !== 0)
        	$html .= $this->format('<ul class="'.$ulClass.'">', 'ul', $item->getLevel(), $options);
        $html .= $this->renderChildren($item, $options);
        if($item->getLevel() !== 0)
        	$html .= $this->format('</ul>', 'ul', $item->getLevel(), $options);

        return $html;
    }

    protected function renderLinkElement(ItemInterface $item, array $options)
    {


    	$childrenArrow = '';
    	if($item->hasChildren() && $item->getLevel() == 1)
    		$childrenArrow = '<span class="fa arrow"></span>';

    	$icon = '';
    	if($item->getExtra('icon'))
    		$icon = '<i class="'.$item->getExtra('icon').'"></i>';

        $label = $this->renderLabel($item, $options);
        if($item->getLevel() == 1)
            $label = '<span class="nav-label">'.$label."</span>";


        return sprintf('<a href="%s"%s>%s%s%s</a>', $this->escape($item->getUri()),$this->renderHtmlAttributes($item->getLinkAttributes()), $icon,$label ,$childrenArrow);
    }
}
