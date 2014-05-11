<?php

class WebPageService {
    
    /*
     * @param $title
     * @param $content
     * @param $saTags 标签的字符串数组，或者逗号分隔的多个标签
     */
    static function create($title, $content, $saTags) {
        if (!is_array($saTags)) {
            $str = str_replace('，', ',', $saTags);
            $ar = explode(',', $str);
            foreach ($ar as &$item) {
                $item = trim($item);
            }
            $saTags = $ar;
        }
        $tags = TagService::findOrCreateTags($saTags);
        $page = new WebPage(array(
                    'title' => $title,
                    'content' => $content,
                ));
        $page->tags = $tags;
        $page->save();
        return $page;
    }

    static function findByTitle($title) {
        return WebPage::find("title = ?", $title)->getAll();
    }

    static function findByTag($tag) {
        $rels = WebpageTag::find('tag_id = ?', $tag->id())->getAll();
        $ids = Helper_Array::getCols($rels, 'webpage_id');
        return WebPage::find("webpage_id in (?)", $ids)->getAll();
    }

    static function remove($page) {
        return WebPage::meta()->destroyWhere((int) $page->id());
    }

}

