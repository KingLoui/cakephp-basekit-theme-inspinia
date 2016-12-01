<?php

namespace KingLoui\BaseKitThemeInspinia\Menu\Renderer;

use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\ListRenderer as KnpListRenderer;

class BreadcrumbsRenderer extends KnpListRenderer
{

    public function render(ItemInterface $item, array $options = array())
    {
        $manip = new \Knp\Menu\Util\MenuManipulator();
        $options = array_merge($this->defaultOptions, $options);
        $currentItem = $this->getCurrentItem($item);
        if($currentItem == null)
            return '';
        $breadcrumb = $manip->getBreadcrumbsArray($currentItem);
        if (empty($breadcrumb)) {
            return '';
        }

        return $this->renderBreadcrumbs($breadcrumb, $options);
    }

    protected function getCurrentItem(ItemInterface $menu) {
        $treeIterator = new \RecursiveIteratorIterator(
            new \Knp\Menu\Iterator\RecursiveItemIterator(
                new \ArrayIterator(array($menu))
            ),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        $iterator = new \Knp\Menu\Iterator\CurrentItemFilterIterator($treeIterator, $this->matcher);

        $currentItem = null;
        foreach ($iterator as $item) {
            $currentItem = $item;
        }
        return $currentItem;
    }

    protected function renderBreadcrumbs(array $breadcrumb, array $options)
    {
        $html = '';
        $skipped = false;
        foreach($breadcrumb as $bc)
        {
            // do not render first element because it is the menu name
            if(!$skipped) {
                $skipped = true;
                continue;
            }
            //$isCurrent = $bc['item']->isCurrent();
            $isCurrent = $this->matcher->isCurrent($bc['item']);
            $liClass = '';
            if($isCurrent)
                $liClass = ' class="active"';
            

            // construct html
            $html .= '<li'.$liClass.'>';

            if($isCurrent)
                $html .= '<strong>';
            else
                $html .= '<a href="'.$bc['uri'].'">';

            $html .= $bc['label'];

            if($isCurrent)
                $html .= '</strong>';
            else
                $html .= '</a>';

            $html .= '</li>';
        }

        return $html;
    }
}
