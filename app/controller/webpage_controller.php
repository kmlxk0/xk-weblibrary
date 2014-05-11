<?php

// $Id$

/**
 * Controller_WebPage 控制器
 */
class Controller_WebPage extends Controller_Abstract {

    function actionIndex() {
        // 为 $this->_view 指定的值将会传递数据到视图中
        # $this->_view['text'] = 'Hello!';
    }

    function actionAdd() {
        
    }

    function actionView() {
        $id = $this->_context['id'];
        $page = WebPage::find('webpage_id = ?', $id)->getOne();
        $this->_view['item'] = $page;
        $this->_view['tags'] = Helper_Array::toHashmap($page->tags, 'tag_id', 'text');
    }

    function actionSave() {
        try {
            if (!$this->_context->isPost()) {
                return;
            }
            $title = $this->_context['title'];
            $content = $this->_context['content'];
            $tags = $this->_context['tags'];
            $str = str_replace('，', ',', $tags);
            $saTags = explode(',', $str);
            
            $page = WebPageService::create($title, $content, $saTags);
        } catch (Exception $ex) {
            return $this->_redirectMessage("新页面保存失败", $ex->getMessage(), url('webpage/add'), 5);
        }
        return $this->_redirectMessage("新页面保存成功", "新页面保存成功", url('webpage/view', array('id' => $page->id())));
    }

}

