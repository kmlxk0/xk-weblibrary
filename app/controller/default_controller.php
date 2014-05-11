<?php

/**
 * 默认控制器
 */
class Controller_Default extends Controller_Abstract
{
    function actionIndex()
    {
        $items = WebPage::find()->order('created desc')->limit(5)->all()->query();
        $this->_view['items'] = $items;
    }
}

