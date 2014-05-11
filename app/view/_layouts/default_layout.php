<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>我的文摘WebLibaray - 您的信息收藏专家<?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/style.css">
    <?php $this->_block('header'); ?><?php $this->_endblock(); ?>
</head>
<body>

<div id="page">

  <?php $this->_element('sidebar'); ?>

  <div id="content">

<?php $this->_block('contents'); ?><?php $this->_endblock(); ?>

  </div>
  <div id="footer">
    <p>
      Powered by kmlxk0@gmail.com , <a href="http://qeephp.com/" target="_blank">QeePHP <?php echo Q::version(); ?></a>
    </p>
  </div>
</div>

</body>
</html>
