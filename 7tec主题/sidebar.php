<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-12 col-lg-4 hidden-md sidebar" id="secondary" role="complementary">

    <section class="widget paddingall">
        <h5 class="widget-title"><i class="fa fa-user-o" aria-hidden="true"></i> <?php _e('ABOUT'); ?></h5>
       <!-- <div class="qr">
        <img src="http://www.7tec.cn/usr/themes/7TEC/img/qr.jpg" />
        </div>-->
        <div class="side-info-img">
          <a href="" data-action="imageZoomIn"><img src="https://q2.qlogo.cn/headimg_dl?%20bs=630110598@qq.com&dst_uin=630110598@qq.com&dst_uin=630110598@qq.com&;dst_uin=630110598@qq.com&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="50px" height="50px" style="border-radius: 50%;"> </a>
        </div>
        <div class="side-info-author">
        	<a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a><?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?> <span><?php $stat->publishedPostsNum() ?>篇文章，<?php $stat->publishedCommentsNum() ?>条评论。</span>
                <p><?php $this->options->description() ?><a class="cute" href="<?php $this->options->siteUrl('/about.html'); ?>">了解更多>> </a></p>
    	</div>
        <?php if($this->options->Sidebarads): ?>
        <div class="side-ad">
        <?php $this->options->Sidebarads(); ?>
        </div>
	</section>
	<?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget paddingall">
		<h5 class="widget-title"><i class="fa fa-bars" aria-hidden="true"></i> <?php _e('CATEGORY'); ?></h5>
        <?php //$this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list');
        _e('<ul class="widget-list">');
        $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}<span>{count}</span></a></li>');
        _e('</ul>');
        ?>
	</section>
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
    <section class="widget paddingall">
		<h5 class="widget-title"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <?php _e('POPULAR POSTS'); ?></h5>
        <ul class="widget-list">
             <?php theMostViewed(); ?>
        </ul>
    </section>
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget paddingall">
		<h5 class="widget-title"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php _e('RECENT COMMENTS'); ?></h5>
        <ul class="widget-list RecentReply zface-box">
        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><span itemprop="image"><?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="24px" height="24px" style="border-radius: 50%;margin-right: 5px;" >'; ?></span><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(100, '...'); ?> <time class="lately-c" datetime="<?php $comments->date('Y-m-d H:i:s'); ?>"><?php $comments->date('Y-m-d H:i:s'); ?></time></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget paddingall">
		<h5 class="widget-title"><i class="fa fa-feed" aria-hidden="true"></i> <?php _e('OTHERS'); ?></h5>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
