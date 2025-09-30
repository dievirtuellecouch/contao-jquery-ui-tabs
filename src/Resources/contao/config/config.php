<?php

use Contao\ArrayUtil;

// Register content elements (avoid removed global helpers)
ArrayUtil::arrayInsert($GLOBALS['TL_CTE'], 1, [
    'juiTab' => [
        'juiTabStart'     => Dvc\ContaoJqueryUiTabs\Element\ContentTabStart::class,
        'juiTabSeparator' => Dvc\ContaoJqueryUiTabs\Element\ContentTabSeparator::class,
        'juiTabStop'      => Dvc\ContaoJqueryUiTabs\Element\ContentTabStop::class,
    ],
]);

// Wrapper elements
$GLOBALS['TL_WRAPPERS']['start'][]     = 'juiTabStart';
$GLOBALS['TL_WRAPPERS']['separator'][] = 'juiTabSeparator';
$GLOBALS['TL_WRAPPERS']['stop'][]      = 'juiTabStop';
