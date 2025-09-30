<?php

namespace Dvc\ContaoJqueryUiTabs\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;
use Contao\System;

abstract class ContentTab extends ContentElement
{
    protected function compile(): void
    {
        $arrHeadline = StringUtil::deserialize($this->juiTabHeadline);

        // Detect backend request (Contao 5.3+)
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();
        $isBackend = $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request);

        if ($isBackend) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->title = \is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        } else {
            // Automatically include required JS assets on pages that contain tabs
            $GLOBALS['TL_JAVASCRIPT']['dvc_jquery_ui_tabs'] = 'assets/jquery-ui-tabs/jquery-ui-tabs.js|static';
            $GLOBALS['TL_JAVASCRIPT']['dvc_jquery_ui_tabs_core'] = 'assets/jquery-ui-tabs/core.js|static';
        }

        $this->Template->headline = \is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        $this->Template->hl = \is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';

        // Build a safe alias/id. Fallback to headline if alias is empty.
        $alias = (string) $this->juiTabAlias;
        $alias = \Contao\StringUtil::standardize(\Contao\StringUtil::restoreBasicEntities($alias));
        if ($alias === '') {
            $headlineSource = \is_array($arrHeadline) ? ($arrHeadline['value'] ?? '') : $arrHeadline;
            $alias = \Contao\StringUtil::standardize(\Contao\StringUtil::restoreBasicEntities((string) $headlineSource));
        }
        $alias = preg_replace('/^id-/', '', $alias);
        $this->Template->alias = $alias;
    }
}
