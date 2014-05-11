
<?php $this->_extends('_layouts/webcompany_layout'); ?>

<?php $this->_block('company_news'); ?>

<?php
foreach ($items as $item) {
    $title = $item['title'];
    $title = u8_title_substr($title, 38);
    printf('<li><a href="%s">%s</a></li>', 
            url('webcompany/view',array('id'=>$item->id())),
            h($title)
    );
}
?>

<?php $this->_endblock(); ?>
