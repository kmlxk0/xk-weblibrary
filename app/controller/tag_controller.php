<?php
// $Id$

/**
 * Controller_Tag 控制器
 */
class Controller_Tag extends Controller_Abstract
{

	function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}
        
        function actionView()
        {
            $id = $this->_context['id'];
            $tag = Tag::find((int)$id)->getOne();
            $pages = WebPageService::findByTag($tag);
            $this->_view['tag'] = $tag;
            $this->_view['items'] = $pages;
        }
        
}


