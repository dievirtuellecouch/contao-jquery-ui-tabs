<?php

namespace Dvc\ContaoJqueryUiTabs\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Dvc\ContaoJqueryUiTabs\DvcContaoJqueryUiTabsBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(DvcContaoJqueryUiTabsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}

