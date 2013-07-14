<?php
    die();
    $core->requireLogin(WWW . 'shop/buy');
    if(empty($_SESSION['shop_product'])) {
        header("Location: " . WWW . "/shop/buy");
        exit;
    }
    $product = $sql->fetch("SELECT * FROM habbocms_products WHERE id = '" . $_SESSION['shop_product'] . "' LIMIT 1", true);

    function valid_code($str) {
        if($str == '') return true;
        $array = explode('-', $str);
        if(count($array) != 5) return false;
        foreach($array as $value) {
            if(strlen($value) != 5 || !is_numeric($value)) return false;
        }

        return true;

    }
    $code = '';
    $code2 = '';
    $error = '<span class="username">{username}</span>, please enter your PaySafeCard code(s)';
    if(isset($_POST['paysafecode'], $_POST['paysafecode2']) && $_POST['paysafecode'] != '') {
        $code = $_POST['paysafecode'];
        $code2 = $_POST['paysafecode2'];
        if(valid_code($code) && valid_code($code2)) {
            $result = $sql->query("INSERT INTO habbocms_purchases (product,paid,identity,given_reward,time,code,code2,information) VALUES ('" . $_SESSION['shop_product'] . "', 'n/a', '" . IDENTITY . "', '0', '" . time() . "', '" . $code . "', '" . $code2 . "', 'This was paid by PaySafeCard')");
            if($result) {
                unset($_SESSION['shop_product']);
                header("Location: " . WWW . "/shop/buy?success");
                exit;
            }

            $error = '<font color="red">Error inserting your order into the mysql database, please try agian!</font>';
        } else $error = '<font color="red">One of the codes was invalid, make sure to add the - and 5 digits in between.<br>If you dont have a secound code leave it blank.</font>';
    }

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
    $skin->install('PaySafeCard', 'checkout');
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

            <form action="" method="POST">
                <div id="email-address-container">
                    <h3>
                        <label for="confirmField"><?php echo $error; ?></label>
                    </h3>
                    <div class="email-address-field">
                        <input type="text" id="emailAddress" class="text-field" size="34" name="paysafecode" value="<?php echo $code; ?>" maxlength="50"/>
                    </div>

                    <div class="email-address-field">
                        <input type="text" id="emailAddress" class="text-field" size="34" name="paysafecode2" value="<?php echo $code2; ?>" maxlength="48"/>
                    </div>

                    <input type="submit" value="Complete payment">
                </div>
            </form>

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