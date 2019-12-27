<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-sm-12 col-lg-8" id="main" role="main">
        <div class="Card turned paddingall">
            <h3><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 "%s" 下的文章'),
            'search'    =>  _t('包含关键字 "%s" 的文章'),
            'tag'       =>  _t('标签 "%s" 下的文章'),
            'author'    =>  _t('"%s" 发布的文章')
            ), '', ''); ?></h3>
        </div>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post Card typo paddingall" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="post-box">
                <div class="post-title-box">
                <h4 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h4>
                </div>
                <?php showThumbnail($this); ?>
                <div class="post-content" itemprop="articleBody">
                    <?php /// $this->content('阅读全文'); ?>
                    <p><?php $this->excerpt(120); ?></p>
                </div>
                <div class="info">
                <ul class="post-meta">
                    <li><i class="fa fa-bookmark-o" aria-hidden="true">&nbsp; </i><?php $this->category(','); ?></li>
                    <li><i class="fa fa-calendar-o" aria-hidden="true">&nbsp; </i><time class="lately-a" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                    <li itemprop="interactionCount"><i class="fa fa-comments-o" aria-hidden="true">&nbsp; </i><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                    <li><i class="fa fa-thumbs-o-up" aria-hidden="true">&nbsp; </i><span><?php get_post_view($this);_e(' 次浏览'); ?></span></li>
                </ul>
            </div>
            </div>
        </article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post Card typo">
                <h5 class="post-title"><?php _e('没有找到内容'); ?></h5>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>