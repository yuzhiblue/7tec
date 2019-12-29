<?php
/**
 *  7TEC清新风格主题
 * 
 * @package 7TEC
 * @author yuzhiblue
 * @version 2.0
 * @link http://7tec.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="col-12 col-lg-8" id="main" role="main">
	<?php while($this->next()): ?>
        <article class="Card typo indexCard paddingall" itemscope itemtype="http://schema.org/BlogPosting">
        	<div class="post-box">
        		<div class="post-title-box">
				<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a><span><?php if(timeZone($this->date->timeStamp)) echo ' new'; ?></span></h2>
				</div>
                   <a itemprop="url" href="<?php $this->permalink() ?>">
                    <?php showThumbnail($this); ?>
	            <div class="post-content" itemprop="articleBody">
		       <p><?php $this->excerpt(110); ?></p>
                    </div>
                   </a>
			</div>
            <div class="info">
            	<ul class="post-meta">
                  <li><i class="fa fa-bookmark-o" aria-hidden="true">&nbsp; </i><?php $this->category(','); ?></li>
		  <li><i class="fa fa-calendar-o" aria-hidden="true">&nbsp; </i><time class="lately-a" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
		  <li itemprop="interactionCount"><i class="fa fa-comments-o" aria-hidden="true">&nbsp; </i><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('讨论', '1', '%d'); ?></a></li>
					<li><i class="fa fa-thumbs-o-up" aria-hidden="true">&nbsp; </i><span><?php get_post_view($this);_e(''); ?></span></li>
				</ul>
            </div>
        </article>
	<?php endwhile; ?>

	<?php 
		$currentPage =  $this->_currentPage;
		$index = $this->options->index;
		pagex($this,$index,$currentPage,'&laquo; 前一页', '后一页 &raquo;');
	?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>