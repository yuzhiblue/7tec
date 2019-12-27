<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-sm-12 col-lg-8" id="main" role="main">
    <article class="post Card typo paddingall" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="post-box">
            <div class="post-title-box">
            <h1 class="post-title" itemprop="name headline"><?php $this->title(); ?></h1>
            </div>
            <div class="tags-box"><p>本文共有<?php echo art_count($this->cid); ?>个字。 <span itemprop="keywords" class="tags green"> # <?php $this->tags(' , ', true, ' '); ?></span><span class="smaller textdx">/ a </span><span class="bigger textdx"> A&nbsp; </span></p>
</div>
            <div class="post-content" itemprop="articleBody">
                <?php /// $this->content(); ?>
                <?php echo WechatFans_Plugin::parseContent($this); ?>
            </div>
            <?php $this->need('zanshang.php'); //赞赏功能 ?>
        </div>
        <div class="tags-box">
            版权声明：本文为作者原创，如需转载须联系作者本人同意，未经作者本人同意不得擅自转载。本站微信公众号：7TEC，敬请关注！
        </div>
        <div class="info">
            <ul class="post-meta">
                <li><i class="fa fa-bookmark-o" aria-hidden="true">&nbsp; </i><?php $this->category(','); ?></li>
                <li><i class="fa fa-calendar-o" aria-hidden="true">&nbsp; </i><time class="lately-a" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                <li itemprop="interactionCount"><i class="fa fa-comments-o" aria-hidden="true">&nbsp; </i><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                <li><i class="fa fa-thumbs-o-up" aria-hidden="true">&nbsp; </i><span><?php get_post_view($this);_e(' 次浏览'); ?></span></li>
            </ul>
        </div>
        <div class="SubtitleBox hidden-md"></div>
    </article>
    <div class="Card turned paddingall">
        <span style="float: left;padding:2px;"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;<?php $this->thePrev('%s','没有了'); ?></span>
        <span class="num" style="visibility:hidden">1/1</span>
        <span style="float: right;padding:2px;"><?php $this->theNext('%s','没有了'); ?>&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></span>
    </div>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
