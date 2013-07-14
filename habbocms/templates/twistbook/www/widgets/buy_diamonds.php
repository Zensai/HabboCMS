
				<div id="containerSpace"></div>

				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['buy_belcr']; ?></ubuntu></div>
				    <script type="text/javascript">
                        function paypal(id) {
                            document.getElementById("product" + id).submit();
                        }
                    </script>

                    <?php
                        $result = mysql_query("SELECT * FROM cms_products WHERE featured = '1' AND enabled = '1'");
                        while($row = mysql_fetch_assoc($result)) {
                    ?>

                    <form id="product<?php echo $row['id']; ?>" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                        <input name="currency_code" type="hidden" value="<?php echo $row['price_currency']; ?>">
                        <input name="return" type="hidden" value="http://habmi.com">
                        <input name="cancel_return" type="hidden" value="http://habmi.com">
                        <input name="cmd" type="hidden" value="_donations">
                        <input name="business" type="hidden" value="oleannanas@gmail.com">
                        <input name="item_name" type="hidden" value="<?php echo $row['reward']; ?> <?php echo $language["points"]; ?> (<?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?>)">
                        <input name="lc" type="hidden" value="da_DK">
                        <input name="custom" type="hidden" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>">
                        <input type="hidden" name="cp" value="false"/>
                        <input type="hidden" name="amount" value="<?php echo $row['price']; ?>"/>
                    </form>

                       <div class="overlideside" style="width: 274px; margin-right: -2px;" onclick="paypal(<?php echo $row['id']; ?>)">
                        
                           <div class="vipBuyBox">
                        
                               <div class="insideVipBuy">
                               
                                   <div class="textVipBuy">
                                   
                                       <div class="textCount"><ubuntu><?php echo $row['reward']; ?></ubuntu></div>
                                   
                                       <div class="diamond" style="margin-right: 10px;"></div>
                                       
                                       <div class="howLongVipBuy" style="padding-top: 3px;"><ubuntu><?php echo $row['price']; ?> <?php echo $row['price_currency']; ?></ubuntu></div>
                                       
                                   </div>
                           
                               </div>
                       
                           </div>
                       
                       </div>
                   
                    <?php
                        }
                    ?>
                    				
				</div>