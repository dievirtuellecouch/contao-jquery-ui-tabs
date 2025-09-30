<?php
	
/**
 * jQuery UI Tabs Widget for Contao Open Source CMS
 *
 * @copyright wangaz. GbR 2015 - 2016
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */
 

namespace JUiTab;

	
/**
 * Class ContentTab
 *
 * @copyright wangaz. GbR 2015 - 2016
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */
use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\StringUtil;

abstract class ContentTab extends ContentElement
{	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{			
		$arrHeadline = StringUtil::deserialize($this->juiTabHeadline);
		
		if (defined('TL_MODE') && TL_MODE === 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new BackendTemplate($this->strTemplate);
			$this->Template->title = is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
		}
		
		$this->Template->headline	= is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
		$this->Template->hl			= is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
		$this->Template->alias 		= $this->juiTabAlias;
	}
}
