<?php
namespace Pixelplant\WidgetView\Controller;

    /**
     * This file is part of the TYPO3 CMS project.
     *
     * It is free software; you can redistribute it and/or modify it under
     * the terms of the GNU General Public License, either version 2
     * of the License, or any later version.
     *
     * For the full copyright and license information, please read the
     * LICENSE.txt file that was distributed with this source code.
     *
     * The TYPO3 project - inspiring people to share!
     */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Main backend controller
 */
class WidgetController extends ActionController {

    public function indexAction() {
        $pid = GeneralUtility::_GP('id');
        $rows = array();
        foreach ($GLOBALS['TCA'] as $table => $tca) {
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', $table, "pid = $pid");
            while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
                $rows[] = $row;
            }
        }

        $this->view->assign('rows', $rows);
    }
}