<?php

namespace Dvc\ContaoJqueryUiTabs\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;

class ContentTabStop extends ContentElement
{
    protected $strTemplate = 'ce_jui_tab_stop';

    protected function compile(): void
    {
        $isBackend = \defined('TL_MODE') && TL_MODE === 'BE';
        if ($isBackend) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
        }
    }
}

