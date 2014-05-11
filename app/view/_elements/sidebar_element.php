
<div id="sidebar">
  <ul id="sidebar-items">
    <li>
      <form id="search" action="http://www.google.com/search" method="get" target="_blank">
        <input type="hidden" name="hl" value="en" />
        <input type="text" id="search-text" name="q" value="site:qeephp.org " />
        <input type="submit" value="搜索" />
        QeePHP 网站
      </form>
    </li>
    <li>
      <h3>常用功能</h3>
      <ul class="links">
        <li><a href="<?php echo h(url('webpage/add'));?>">新建</a></li>
      </ul>
    </li>
    <li>
      <h3>浏览文档</h3>
      <ul class="links">
        <li><a href="http://qeephp.org/docs/qeephp/api/" target="_blank">QeePHP API 文档</a></li>
        <li><a href="http://www.php.net/docs.php" target="_blank">PHP 文档</a></li>
      </ul>
    </li>
  </ul>
</div>
