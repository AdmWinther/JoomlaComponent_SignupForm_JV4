<?php

namespace Thusia\Component\AwinSignupForm\Site\View\Awin;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Factory;

/**
 * @package     Joomla.Site
 * @subpackage  com_awinsignupform
 *
 * @copyright   Copyright (C) 2020 Adam Winther. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

/**
 * View for the user identity validation form
 */
class HtmlView extends BaseHtmlView {
    

    /**
     * Display the view
     *
     * @param   string  $template  The name of the layout file to parse.
     * @return  void
     */
    public function display($template = null) {


        $session = Factory::getApplication()->getSession();
        $this->formData = $session->get('awinsignupform.data', []);

        // Call the parent display to display the layout file
        parent::display($template);
    }

}