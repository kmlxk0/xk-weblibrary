<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?> - 新建<?php $this->_endblock(); ?>

<?php $this->_block('header'); ?>
<script type="text/javascript" src="<?php echo $_BASE_DIR; ?>lib/xheditor-1.1.14/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $_BASE_DIR; ?>lib/xheditor-1.1.14/xheditor-1.1.14-zh-cn.js"></script>
<script type="text/javascript">
    $(function(){
        // 初始化文本框
        $('textarea[name=content]').xheditor({
                tools:'mfull',
                skin:'o2007blue',
                upMultiple:3,
                upLinkUrl:'lib/xheditor-1.1.14/demos/upload.php?immediate=1',
                upImgUrl:'lib/xheditor-1.1.14/demos/upload.php?immediate=1',
                upFlashUrl:'lib/xheditor-1.1.14/demos/upload.php?immediate=1',
                upMediaUrl:'lib/xheditor-1.1.14/demos/upload.php?immediate=1'
                //localUrlTest:/^https?:\/\/[^\/]*?(xheditor\.com)\//i,
                //remoteImgSaveUrl:'lib/xheditor-1.1.14/demos/saveremoteimg.php'
        });
    });
</script>                        
<?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>
<form method="post" action="<?php echo h(url('webpage/save'));?>">
    <table style="width:100%;">
    <tr>
            <td>标题</td>
            <td><input type="text" name="title" style="width: 100%;" /></td>
    </tr>
    <tr>
            <td colspan="2"><textarea name="content" style="width: 100%; height: 500px;"></textarea>
    </td>
    <tr>
            <td>标签</td>
            <td><input type="text" name="tags" style="width: 100%;" /><span class="tips">（使用逗号分隔多个标签 支持全角和半角，,）<span></td>
    </tr>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="save" /></td>
    </tr>
    </table>  
    
</form>


<?php $this->_endblock('contents'); ?>
