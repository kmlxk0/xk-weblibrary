<?php

class TagService
{
    
    static function find($text)
    {
        return Tag::find('text = ?', $text)->getOne();
    }
    
    static function destory($text)
    {
        return Tag::meta()->destoryWhere('text = ?', $text);
    }
    
    static function delete($text)
    {
        return Tag::meta()->deleteWhere('text = ?', $text);
    }
    
    static function findOrCreate($text)
    {
        $tag = self::find($text);
        if ($tag->id()) {
            return $tag;
        }
        $tag = self::create($text);
        return $tag;
    }
    static function create($text)
    {
        $tag = new Tag(array(
            "text"=>$text
        ));
        $tag->save();
        return $tag;
    }
  
    static function findTags($saTags)
    {
        return Tag::find('text in (?)', $saTags)->getAll();
    }
    
    static function findOrCreateTags($saTags)
    {
        $tags = Tag::find('text in (?)', $saTags)->getAll();
        $existed = Helper_Array::getCols($tags->toArray(), 'text');
        $toCreate = array_diff($saTags, $existed);
        foreach ($toCreate as $text) {
            $tag = self::create($text);
        }
        return self::findTags($saTags);
    }  
    
}

