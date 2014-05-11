
<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?> - <?php echo $item['title'];?><?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>

	<div id="header">
	  <h1>我的文摘WebLibaray</h1>
	</div>

	<div id="getting-started">
	  <h1>标签 : <em><?php echo $tag->text;?></em></h1>

<?php
$tpl = <<<EOT
<div class="entry-title">
<h2><a href="%s">%s</a></h2>
</div>
<p>%s</p>
EOT;
    foreach ($items as $item) {
        printf($tpl, 
                h(url('webpage/view', array('id'=>$item->id()))),
                $item->title,
                html_abstract($item->content, 0, 100));
    }
?>
          

        </div>

<?php $this->_endblock('contents'); ?>
