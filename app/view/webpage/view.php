
<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?> - <?php echo $item['title'];?><?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>

	<div id="header">
	  <h1>我的文摘WebLibaray</h1>
	</div>

	<div id="getting-started">
	  <h1><?php echo $item['title'];?></h1>
      <p>
        	  <?php echo $item['content'];?>
      </p>
      <span class="tags">
      <?php
      foreach ($tags as $id=>$text) {
           printf('<a href="%s">%s<a> ', h(url('tag/view', array('id' => $id))), $text);
      }
      ?>
      </span>
	</div>

<?php $this->_endblock('contents'); ?>
