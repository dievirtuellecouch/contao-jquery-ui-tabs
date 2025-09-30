<?php

namespace Dvc\ContaoJqueryUiTabs\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;

abstract class ContentTab extends ContentElement
{
    protected function compile(): void
    {
        $arrHeadline = StringUtil::deserialize($this->juiTabHeadline);

        $isBackend = \defined('TL_MODE') && TL_MODE === 'BE';

        if ($isBackend) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->title = \is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        }

        $this->Template->headline = \is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        $this->Template->hl = \is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
        $this->Template->alias = $this->juiTabAlias;
    }
}

