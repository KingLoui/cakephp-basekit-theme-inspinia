<?php

namespace KingLoui\BaseKitThemeInspinia\View;

use KingLoui\BaseKitThemes\View\ThemeView;

class AdminView extends ThemeView
{
    public function initialize()
    {
        parent::initialize();

        $this->initializeUI();
    }

    public function initializeUI(array $options = [])
    {
        $this->loadHelper('Html', ['className' => 'BootstrapUI.Html']);
        $this->loadHelper('Form', ['className' => 'BootstrapUI.Form']);
        $this->loadHelper('Flash', ['className' => 'BootstrapUI.Flash']);
        $this->loadHelper('Paginator', [
            'className' => 'BootstrapUI.Paginator',
            'labels' => [
                'prev' => '<i class="fa fa-chevron-left"></i>',
                'next' => '<i class="fa fa-chevron-right"></i>',
            ]
        ]);
    }
}
