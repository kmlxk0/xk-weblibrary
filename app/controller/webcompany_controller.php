<?php
// $Id$

/**
 * Controller_WebCompany 控制器
 */
class Controller_WebCompany extends Controller_Abstract
{

	function actionView()
	{
            $id = $this->_context['id'];
            $page = WebPage::find('webpage_id = ?', $id)->getOne();
            $this->_view['item'] = $page;
            $this->_view['tags'] = Helper_Array::toHashmap($page->tags, 'tag_id', 'text');
	}
        
        function actionTag()
        {
            $id = $this->_context['id'];
            $tag = Tag::find((int)$id)->getOne();
            $pages = WebPageService::findByTag($tag);
            $this->_view['tag'] = $tag;
            $this->_view['items'] = $pages;
        }
}


