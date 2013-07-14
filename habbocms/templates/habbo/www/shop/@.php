<?php
 define('PARENT', '3');
 define('CHILD', '13');
 $html->setKey('body_extra', ' id="cbs2credits"');
 $skin->install('Shop', 'credits', true);
 $lang->addTranslation('shop');
?>

<div id="container">
	<div id="content" style="position: relative" class="clearfix">
		<div id="column1" class="column">		   
			<div class="habblet-container ">		
				<div class="cbb clearfix orange ">
					<h2 class="title">Habmi Shop</h2>
					<?php
						$order = 'position';
						$order_type = 'ASC';
						$products = array();
						$result = $sql->query("SELECT * FROM habbocms_shop WHERE enabled = '1' ORDER BY $order $order_type");
						$pergroup = 2;
						$split = function ($partial, $elem) use ($pergroup) {
							$groupCount = count($partial);
							if ($groupCount == 0 || count(end($partial)) == $pergroup)
								$partial[] = array($elem);
							else
								$partial[$groupCount-1][] = $elem;

							return $partial;
						};

						while ($row = $sql->fetch($result)) {
							$products[] = $row;
						}

						$products = array_reduce($products, $split, array());

						foreach ($products as $product) { 
						$price_type = 'Diamonds';
						echo '
					<div class="method-group phone clearfix cbs2">
						<div class="method idx0">
							<div class="method-content">
								<h2>' . $product[0]['title'] . '</h2>
								<div class="summary clearfix">
									<div style="background-image: url(http://images.habmi.com/habmiweb/63_7ho20plgd84vqz7a6fsm9ry1ktc5xnu3/2293/v2/images/newcredits/vip1.png);background-repeat:no-repeat;background-position:5px 60px;height:210px;border-bottom: 1px solid #CCCCCC;margin-bottom:15px;">
										' . (($product[0]["image_headline"])?'<img style="margin-left: 2px;margin-top: 2px;" src="' . $product[0]["image_headline"] . '">':'') . '
										<div style="width:120px;text-align:right;float:right;padding-top: 20px; padding-right: 8px;">
											' . $product[0]['desc'] . '
										</div>
									</div>


									<form class="selectPricePointFormForConfirmationPage" action="http://habmi.com/shop/submit" method="post" target="_blank">
										<input type="hidden" name="vip_type" value="vip"/>
										<div id="pricepoints">
											<ul>
												<li class="last">
													<label>
														<span class="radio"><input type="radio" name="duration" checked="checked" value="0"/></span>

														<span class="product-description">' . $product[0]['title'] . '</span>

														<span class="credit-amount-equals"></span>
														<span class="price-in-cents">
															<div class="pricepoint-price-container">' . $product[0]['price'] . '<span class="pricepoint-currency"> ' . $price_type . '</span></div>
														</span>
													</label>
												</li>
											</ul>
										</div>
										
										' . ((LOGGEDIN)?'<div class="small-button-container"><a href="#" onclick="$(this).up(\'form\').submit()" class="new-button green-button methodurl"><span><b class="exclude">Buy</b></span><i></i></a> </div>':'<div style="float: right; padding: 0 15px 15px 0; "><a href="http://habmi.com/index">Please sign in first</a></div>') . '
									</form>
								</div>
							</div>   
						</div>
						';
						if(isset($product[1])) {
						$price_type = 'Diamonds';
						echo '
						<div class="method idx0">
							<div class="method-content">
								<h2>' . $product[1]['title'] . '</h2>
								<div class="summary clearfix">
									<div style="background-image: url(http://images.habmi.com/habmiweb/63_7ho20plgd84vqz7a6fsm9ry1ktc5xnu3/2293/v2/images/newcredits/vip1.png);background-repeat:no-repeat;background-position:5px 60px;height:210px;border-bottom: 1px solid #CCCCCC;margin-bottom:15px;">
										' . (($product[0]["image_headline"])?'<img style="margin-left: 2px;margin-top: 2px;" src="' . $product[0]["image_headline"] . '">':'') . '
										<div style="width:120px;text-align:right;float:right;padding-top: 20px; padding-right: 8px;">
											' . $product[1]['desc'] . '
										</div>
									</div>


									<form class="selectPricePointFormForConfirmationPage" action="http://habmi.com/shop/submit" method="post" target="_blank">
										<div id="pricepoints">
											<ul>
												<li class="last">
													<label>
														<span class="radio"><input type="radio" name="duration" checked="checked" value="0"/></span>

														<span class="product-description">' . $product[1]['title'] . '</span>

														<span class="credit-amount-equals"></span>
														<span class="price-in-cents">
															<div class="pricepoint-price-container">' . $product[1]['price'] . '<span class="pricepoint-currency"> ' . $price_type . '</span></div>
														</span>
													</label>
												</li>
											</ul>
										</div>
												
										' . ((LOGGEDIN)?'<div class="small-button-container"><a href="#" onclick="$(this).up(\'form\').submit()" class="new-button green-button methodurl"><span><b class="exclude">Buy</b></span><i></i></a> </div>':'<div style="float: right; padding: 0 15px 15px 0; "><a href="http://habmi.com/index">Please sign in first</a></div>') . '
									</form>
								</div>
							</div>   
						</div>
					</div>
						'; } else echo '</div>';}
					?>




					<script type="text/javascript">
						document.observe("dom:loaded", function() {
							new CreditsList('false');

						});
					</script>

					<div class="moreinfo-section">
						<a href="{www}/help/index?topic=10" class="moreinfo">{$lang->shop.moreinfo}</a>
					</div>

					<div class="disclaimer">
						<h3><span>{$lang->shop.permission_title}</span></h3>
						{$lang->shop.permission_desc} <a href="{www}/help/index?topic=6" target="_blank">{$lang->shop.permission_helptool}</a>.
					</div>
				</div>
				<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
			</div>
			<script type="text/javascript">
			HabboView.run();
			</script>
		</div>
		
		<div id="column2" class="column">		
				<div class="habblet-container "><div class="ad-container"><?php require $skin->widget('ads2'); ?></div></div>
				<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
		</div>
		<!--[if lt IE 7]>
		<script type="text/javascript">
		Pngfix.doPngImageFix();
		</script>
		<![endif]-->

<?php require $skin->widget('footer'); ?>