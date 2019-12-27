<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="Card paddingall">
	<?php $this->comments()->to($comments); ?>
<div class="comment-ad"><?php $this->options->Commentads(); ?></div>
	<?php if($this->allow('comment')): ?>
		<div id="<?php $this->respondId(); ?>" class="respond">
                        <h4><?php _e('添加新评论'); ?></h4>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
					<div class="comment-box">
						<div class="comment-tools">
							<div class="row row-cm">
								<div class="col col-cm order-first" style="overflow: hidden;">
									<div class="emoji-box text-right">
										
									</div>
								</div>
								<div class="bg-white">
									<a href="javascript:;" class="emoji-btn" title="Emoji 表情"><i class="fa fa-smile-o" name="emoji"></i></a>
								</div>
							</div>
						</div>
						<div class="comment-textarea-box">
							<textarea rows="8" cols="50" name="text" id="respond-textarea" class="textarea comment-textarea" required ><?php $this->remember('text'); ?></textarea>
						</div>
						<div class="comment-form">
							<div class="row comment-form-fields">
								<?php if($this->user->hasLogin()): ?>
									<div class="col order-first">
										<div style="line-height:30px;">
											<?php _e('当前用户: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
											<a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?></a>
										</div>                                    
									</div>
								<?php else: ?>
									<div class="col order-first">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-white" id="ico-name"><i class="fa fa-user-o"aria-hidden="true"></i></span>
											</div>
											<input type="text" name="author" id="author" class="form-control" placeholder="<?php _e('昵称'); ?>" value="<?php $this->remember('author'); ?>" aria-label="Username" aria-describedby="ico-name" required />
										</div>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-white" id="ico-email"><i class="fa fa-envelope-o"aria-hidden="true"></i></span>
											</div>
											<input type="email" name="mail" id="mail" class="form-control" placeholder="<?php _e('邮箱'); ?>" value="<?php $this->remember('mail'); ?>" aria-label="Email" aria-describedby="ico-email" <?php if ($this->options->commentsRequireMail): ?> required <?php endif; ?> />
										</div>
									</div>
									<div class="col order-last">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-white" id="ico-url"><i class="fa fa-link" aria-hidden="true"></i></span>
											</div>
											<input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('网站'); ?>" value="<?php $this->remember('url'); ?>" aria-label="Email" aria-describedby="ico-url" <?php if ($this->options->commentsRequireURL): ?> required <?php endif; ?> />
										</div>
									</div>
								<?php endif; ?>
							</div>

							<button type="submit" class="btn comment-btn">提交</button>

							<?php $comments->cancelReply('<i class="fa fa-times fa-lg" aria-hidden="true" title="取消回复"></i>'); ?>
<div class="clearfix"></div>
						</div>
					</div>		
			</form>
		</div>
	<?php else: ?>
		<h3><?php _e('暂时无法评论哦~'); ?></h3>
	<?php endif; ?>

	<?php if ($comments->have()): ?>
		<h6><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h6>
		<?php function threadedComments($comments, $singleCommentOptions) {
        	//开始自定义评论区域
			$commentClass = '';
			$singleCommentOptions->dateFormat = 'Y-m-d H:i:s';
			$singleCommentOptions->replyWord = '回复';
			if ($comments->authorId) {
				if ($comments->authorId == $comments->ownerId) {
					$commentClass .= ' comment-by-author';
				} else {
					$commentClass .= ' comment-by-user';
				}
			}
			$commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
			?>
			<li id="<?php $comments->theId(); ?>" class="comment-body<?php
				if ($comments->_levels > 0) {
					echo ' comment-child';
					$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
				} else {
					echo ' comment-parent';
				}
				$comments->alt(' comment-odd', ' comment-even');
				echo $commentClass;
            	//下面正式自定义
				?>">
				<div class="comment-author">
					<div>
						<div class="row comment-row comment-mg">
							<div class="comment-show-con-img">
<span itemprop="image"><?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="45px" height="45px" style="border-radius: 50%;" >'; ?></span>
							</div>
<div class="col order-last comment-col">
<div class="row comment-row">
<div class="comment-show-con-list clearfix">
<div class="pl-text clearfix">
<span class="comment-author">
<?php $singleCommentOptions->beforeAuthor();
$comments->author();
$singleCommentOptions->afterAuthor(); //输出评论者 ?></span>

<?php if ($comments->authorId == $comments->ownerId) {echo "<span style='color:#f33;padding:0 3px;border:1px solid #f33;border-radius:2px;font-size:9px;vertical-align:middle;display:inline-block;margin-right:3px;font-weight:500;'>作者</span>";}else{echo "<span style='color:#3199f4;padding:0 3px;border:1px solid #3199f4;border-radius:2px;font-size:9px;vertical-align:middle;display:inline-block;margin-right:3px;font-weight:500;'>访客</span>";}
                    ?>
<br/>
<span class="zface-box">
<?php get_comment_at($comments->coid); ?>
<?php $comments->content(); //输出评论内容，包含 <p></p> 标签 ?>
</span>
</div>
</div>
</div>
<div class="row comment-row date-dz">
<div class="col order-last comment-col comment-reply">
<time class="lately-a" datetime="<?php $comments->date($singleCommentOptions->dateFormat);//输出评论日期 ?>" ><?php $comments->date($singleCommentOptions->dateFormat);//输出评论日期 ?>&nbsp;</time>|<?php $comments->reply($singleCommentOptions->replyWord); //输出 回复 链接 ?>
	                                </div>
	                            </div>
	                        </div>
                        </div>             
                    </div>
                    <?php if ($comments->levels > 0) { //子回复 ?>
                    <?php if ($comments->children) { ?>
                    <div class="comment-childrens">
                    	<?php $comments->threadedComments($singleCommentOptions); //评论嵌套?>
                    </div>
                    <?php } ?>
                    <?php }else{ //父回复 ?>
                    <?php if ($comments->children) { ?>
                    <div class="comment-children">
                    	<?php $comments->threadedComments($singleCommentOptions); //评论嵌套?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
			</li>
                <?php } //结束自定义评论区域?>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            
	<?php else: ?>
		<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
	<?php endif; ?>
</div>
