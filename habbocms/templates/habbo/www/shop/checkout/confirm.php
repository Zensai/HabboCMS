<?php
    $core->requireLogin(WWW . 'shop/buy');
    if(empty($_SESSION['shop_product'])) {
        header("Location: " . WWW . "/shop/buy");
        exit;
    }

    $lang->addTranslation('shop_confirm');

    $html->setKey(array(
        'body_extra' => ' id="home" class=" "',
        'extra' => '
<style type="text/css">
    div#payment-details {
 background-image: url(https://www.habbo.com/deliver/images.habbo.com/c_images/credits_us/en_strike_best_value_no_coins.png?h=f0baf12065059a5cf950a9c082eaea35);
background-repeat: no-repeat;
}

</style>
<script type="text/javascript">
function submitMethodForm(form, paymentMethodId, txSystem) {
    var tmp = form.action;
    form.action = \'https://www.habbo.com/purchase/proceedWithPayment/\'+ txSystem +\'/9434/22766/\'+ paymentMethodId;
    form.submit();
    form.action = tmp;
    return false;
}
</script>
        ',
    ));
    $skin->install('Confirm payment', 'checkout');

    $product = $sql->fetch("SELECT * FROM habbocms_products WHERE id = '" . $_SESSION['shop_product'] . "' LIMIT 1", true);
?>

    <div id="container">
        <div id="payment-details-container">
    
    <div id="payment-details-header">
        <div class="rounded"><h1>Confirm payment details</h1></div>
    </div>   
        <div id="payment-details">
            <h2>Payment details</h2>
                        
            <table>
                <colgroup>
                    <col class="product"/>
                    <col class="price"/>
                    <col class="user"/>
                </colgroup>
                <thead>
                    <tr>
                        <th class="credit-amount">Product</th>
                        <th class="price">Price</th>
                        <th class="username">{sitename} Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="credit-amount">
                            <span class="credit-amount"><?php echo $product['title}</span>
                        </td>
                        <td class="price">
                                <?php echo $product['currency'] . " " . $product['price}
                        </td>
                        <td class="username">{username}</td>
                    </tr>
                </tbody>
            </table>
	
            <div id="payment-methods" >
                <h2>Pay with</h2>
                <ul class="clearfix payment-methods-2">
                    <form class="selectPricePointFormForConfirmationPage" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                        <input name="currency_code" type="hidden" value="<?php echo $product['currency}">
                        <input name="return" type="hidden" value="{www}/shop/buy?success">
                        <input name="cancel_return" type="hidden" value="{www}/shop/buy?cancel">
                        <input name="cmd" type="hidden" value="_donations">
                        <input name="business" type="hidden" value="oleannanas@gmail.com">
                        <input name="item_name" type="hidden" value="<?php echo $product['title'] . " for " . $users->data('username'); ?>">
                        <input name="lc" type="hidden" value="da_DK">
                        <input name="custom" type="hidden" value="<?php echo IDENTITY; ?>">
                        <input type="hidden" name="cp" value="false"/>
                        <input type="hidden" name="amount" value="<?php echo $product['price}"/>
                        <li><a href="#" onclick="$(this).up('form').submit()" class="large-button logo-button"><span><img alt="Credit/Debit Card" src="//habboo-a.akamaihd.net/c_images/cbs2_partner_logos/partner_logo_credit_card_dk.png?h=3d1e579cb0ac16fa9f91bef0d7377304"/></span><i></i></a></li>
                        <li><a href="#" onclick="$(this).up('form').submit()" class="large-button logo-button"><span><img alt="Paypal" src="//habboo-a.akamaihd.net/c_images/cbs2_partner_logos/partner_logo_paypal_001.png?h=3d1e579cb0ac16fa9f91bef0d7377304"/></span><i></i></a></li>
                    </form>
                </ul>
            </div>

            <div style="color: red; font-size: 8pt; margin: 10px;" class="method idx1">
                <div class="method-content">
                    <div>By proceeding you accept our <a href="{www}/help/index?topic=2" target="_blank" class="terms">Terms and Conditions</a></div>
                </div>
            </div>
            <div style="color:black; font-size: 8pt;">
                <a href="{www}/shop/buy"> <span>Back to Habbo</span></a>
            </div>
        </div>
    <div class="disclaimer">
        <h3><span>Important Message</span></h3>
        Always ask the bill-payer's permission first. If you don't and the payment is later canceled or declined, you'll be banned.<br /> All legitimate ways to buy Credits are shown here. Buying them elsewhere may get you ripped off and banned.
    </div>

</div>


<p style="font-size: 8pt; margin-top: 30px;">
    <a style="color:#eff" href="{www}/shop/buy">Back to credits page</a>
</p>

<script type="text/javascript">Rounder.init();</script>
    </div>

</body>
</html>