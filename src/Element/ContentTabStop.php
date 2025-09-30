<?php

namespace Dvc\ContaoJqueryUiTabs\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\System;

class ContentTabStop extends ContentElement
{
    protected $strTemplate = 'ce_jui_tab_stop';

    protected function compile(): void
    {
        // Detect backend request (Contao 5.3+)
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();
        $isBackend = $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request);
        if ($isBackend) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
        }
    }
}
