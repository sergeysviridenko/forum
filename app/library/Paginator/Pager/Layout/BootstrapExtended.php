<?php

/*
  +------------------------------------------------------------------------+
  | Phosphorum                                                             |
  +------------------------------------------------------------------------+
  | Copyright (c) 2013-present Phalcon Team and contributors               |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
*/

namespace Phosphorum\Paginator\Pager\Layout;

use Phalcon\Paginator\Pager\Layout\Bootstrap;

/**
 * Phosphorum\Paginator\Pager\Layout\BootstrapExtended
 *
 * @package Phosphorum\Paginator\Pager\Layout
 */
class BootstrapExtended extends Bootstrap
{
    public function getRendered(array $options = [])
    {
        $result = '<ul class="' . $this->getUlClass($options) . '">';

        $bootstrapSelected = '<li class="disabled"><span>{%page}</span></li>';
        $originTemplate = $this->selectedTemplate;
        $this->selectedTemplate = $bootstrapSelected;

        $this->addMaskReplacement('page', '&laquo;', true);
        $options['page_number'] = $this->pager->getPreviousPage();
        $result .= $this->processPage($options);

        $this->selectedTemplate = $originTemplate;
        $this->removeMaskReplacement('page');
        $result .= get_parent_class(get_parent_class($this))::getRendered($options);

        $this->selectedTemplate = $bootstrapSelected;

        $this->addMaskReplacement('page', '&raquo;', true);
        $options['page_number'] = $this->pager->getNextPage();
        $result .= $this->processPage($options);

        $this->selectedTemplate = $originTemplate;

        return $result . '</ul>';
    }

    protected function getUlClass(array $options = [])
    {
        if (!isset($options['ul_class'])) {
            return 'pagination';
        }

        return $options['ul_class'];
    }
}
