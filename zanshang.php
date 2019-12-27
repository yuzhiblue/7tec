<div class="entry-shang text-center">
		<p>「一键投喂 软糖/蛋糕/布丁/牛奶/冰阔乐！」</p>
		<button class="zs show-zs btn btn-bred">赞赏</button>
	</div>
	<div class="zs-modal-bg"></div>
	<div class="zs-modal-box">
		<div class="zs-modal-head">
			<button type="button" class="close">×</button>
			<p class="author">
          <img src="https://q2.qlogo.cn/headimg_dl?%20bs=630110598@qq.com&dst_uin=630110598@qq.com&dst_uin=630110598@qq.com&;dst_uin=630110598@qq.com&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="32px" height="32px" style="border-radius: 50%;"><?php $this->author(); ?>
			</p>
			<p class="tip"><i></i><span> (๑＞ڡ＜)☆谢谢老板~</span></p>
		</div>
		<div class="zs-modal-body">
			<div class="zs-modal-btns">
				<button class="btn btn-blink" data-num="2">2元</button>
				<button class="btn btn-blink" data-num="5">5元</button>
				<button class="btn btn-blink" data-num="10">10元</button>
				<button class="btn btn-blink" data-num="50">50元</button>
				<button class="btn btn-blink" data-num="100">100元</button>
				<button class="btn btn-blink" data-num="any">任意金额</button>
			</div>
			<div class="zs-modal-pay">
				<button class="btn btn-bred" id="pay-text">2元</button>
				<p>使用<span id="pay-type">微信</span>扫描二维码打赏</p>
				<img width="150" height="150" src="<?php $this->options->themeUrl('img/alipay-2.jpg'); ?>" id="pay-image"/>
			</div>
		</div>
		<div class="zs-modal-footer">
			<label style="float: left;width: 130px;">
				<input type="radio" name="zs-type" value="alipay" class="zs-type" checked="checked" style="float: left;">
				<span class="zs-alipay">
					<img src="<?php $this->options->themeUrl('img/alipay-btn.png'); ?>" />
				</span>
			</label>
			<label style="float: left;width: 130px;">
				<input type="radio" name="zs-type" value="wechat" class="zs-type" style="float: left;">
				<span class="zs-wechat">
					<img class="darkmode-ignore" src="<?php $this->options->themeUrl('img/wechat-btn.png'); ?>" />
				</span>
			</label>
		</div>
	</div>
