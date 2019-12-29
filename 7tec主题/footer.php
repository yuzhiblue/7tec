<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end .row -->
</div>
<div class="GoTop" title="返回顶部"></div>
</div><!-- end #body -->

<footer id="footer" class="footer" role="contentinfo">
<div class="mqr"><p><img src="http://www.7tec.cn/usr/themes/7TEC/img/qr.jpg" /></p><p class="gray" ><br/>微信扫码，关注我们哟～</p></div>
  <em><a class="gray" href="http://www.beian.miit.gov.cn"  target="_blank"><?php echo $this->options->beian;?></a>
    &copy; <?php echo date('Y'); ?> <a class="gray" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a class="gray" href="//www.typecho.org">Typecho</a> 强力驱动.Theme by <a class="gray" href="//www.7tec.cn">7TEC.CN</a>.'); ?>.
  </em>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl('js/jquery-3.3.1.min.js'); ?>"></script>
<script src="https://cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="<?php $this->options->themeUrl('js/lately.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('bootstrap/bootstrap.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>

<script type="text/javascript">
    //获取评论参数
    <?php
    if ($this->options->commentsThreaded && $this->is('single')) {
      echo 'var respondId = "' .$this->respondId.'";';
    }
    /** 反垃圾设置 */
    if ($this->options->commentsAntiSpam && $this->is('single')) {
      echo 'var shuffleScriptVar = ' .Typecho_Common::shuffleScriptVar($this->security->getToken($this->request->getRequestUrl()));
    }
    echo 'var themeUrl = "' .$this->options->themeUrl .'";';
    ?>
    readyrun();
  </script>
	<?php if($this->options->Analytics):$this->options->Analytics(); endif; ?>
</body>
</html>