<?php
 define('PARENT', '3');
 define('CHILD', '10');
 $html->setKey('body_extra', ' id="cbs2credits"');
 $skin->install('Diamonds', 'credits', true);
 $lang->addTranslation('shop');
?>

<div id="container">
    <div id="content" style="position: relative" class="clearfix">
    <div id="column1" class="column">
                        
                <div class="habblet-container ">        
                        <div class="cbb clearfix orange ">
    
                            <h2 class="title">{$lang->shop.buydiamonds}</h2>
<style type="text/css">
        div.credit-amount-coin {
         width: 26px !important;
        }

        .method-group.online.bestvalue {
         background-image: url({webgallery}v2/images/newcredits/best_value.png);
        background-repeat: no-repeat;
        }

        div.campaign-banner {
            background: url("{webgallery}v2/images/newcredits/header_offer.png") no-repeat scroll left center transparent!important;
        }

        .method-group.online {
            margin-top:0;
        }
</style>

    <div class="campaign-banner">
        <div style="float:right; width:545px; padding-top: 12px">
            <div style="height:28px">
                <div style="float: left; font-size:13px; height: 28px; padding-top: 5px; padding-right: 7px; margin-bottom: -5px;"><b>F&aring; dig en gratis VIP i dag!</b></div>
                <img style="float: left;" src="">
            </div>
            <p style="font-size: 10px">K&oslash;ber du diamanter f&aring;r ved hj&aelig;lp af PayPal du gratis VIP p&aring; dit k&oslash;b! Tilbuddet g&aelig;lder til 1. Juni.</p>
        </div>
    </div>

            <div class="method-group online clearfix  bestvalue  cbs2">
                        <div id="group-content-4854">
                        <div id="price-container">
                            <div id="pricepoints">
                                <form class="selectPricePointFormForConfirmationPage" action="{www}/shop/checkout/submit" method="post" >
                                        <ul>
                                            <li>
                                                <label>
                                                    <span class="radio"><input type="radio" name="product" value="1" checked="checked" /></span>
                                                    <div class="pricepoint-amount-container">
                                                        <div class="credit-amount">75</div>
                                                        <div class="credit-amount-x right"></div>
                                                        <div class="credit-amount-coin right"></div>
                                                    </div>
                                                    
                                                    <span class="price-in-cents">
                                                        <div class="pricepoint-price-container"><span class="pricepoint-currency">DKK</span> 100<span class="pricepoint-price-decimals">.00</span></div>
                                                    </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <span class="radio"><input type="radio" name="product" value="2"/></span>
                                                    <div class="pricepoint-amount-container">
                                                        <div class="credit-amount">195</div>
                                                        <div class="credit-amount-x right"></div>
                                                        <div class="credit-amount-coin right"></div>
                                                    </div>

                                                    <span class="price-in-cents">
                                                        <div class="pricepoint-price-container"><span class="pricepoint-currency">DKK</span> 250<span class="pricepoint-price-decimals">.00</span></div>
                                                    </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <span class="radio"><input type="radio" name="product" value="3"/></span>
                                                    <div class="pricepoint-amount-container">
                                                        <div class="credit-amount">320</div>
                                                        <div class="credit-amount-x right"></div>
                                                        <div class="credit-amount-coin right"></div>
                                                    </div>
                                                    
                                                    <span class="price-in-cents">
                                                        <div class="pricepoint-price-container"><span class="pricepoint-currency">DKK</span> 400<span class="pricepoint-price-decimals">.00</span></div>
                                                    </span>
                                                </label>
                                            </li>

                                            <li class="last">
                                                <label>
                                                    <span class="radio"><input type="radio" name="product" value="4"/></span>
                                                    <div class="pricepoint-amount-container">
                                                        <div class="credit-amount">450</div>
                                                        <div class="credit-amount-x right"></div>
                                                        <div class="credit-amount-coin right"></div>
                                                    </div>

                                                    <span class="price-in-cents">
                                                        <div class="pricepoint-price-container"><span class="pricepoint-currency">DKK</span> 500<span class="pricepoint-price-decimals">.00</span></div>
                                                    </span>
                                                </label>
                                            </li>
                                        </ul>
                                        <?php
                                         if(LOGGEDIN) {
                                            echo '<a href="#" onclick="$(this).up(\'form\').submit()" class="large-button large-green-button"><span><b>' . $lang->s["shop.continue"] . '</b></span><i></i></a>';
                                         } else {
                                            echo '

                                    <div style="float: right;">
                                        <a href="{www}/index">' . $lang->s["shop.signin"] . '</a>
                                    </div>

                                        ';

                                         }
                                        ?>
                                </form>
                        </div>
                            <div id="methods">
                                <ul>
                                            <li><img alt="Kreditkort" src="//images-sulake.cotssl.net/c_images/cbs2_partner_logos/partner_logo_credit_card_dk.png"/></li>
                                            <li><img alt="Paypal" src="//habbo.hs.llnwd.net/c_images/cbs2_partner_logos/partner_logo_paypal_001.png"/></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        
                        
                                        
            </div>
            
            <div class="method-group phone clearfix   cbs2">

    

<div class="method idx1 nosmallprint">
    
    <div class="method-content">
        <h2>SMS</h2>

        <div class="summary clearfix">

        
            
            
            


            <p style="padding: 10px 10px 33px 10px">
            Desv&aelig;rre har vi ikke l&aelig;ngere underst&oslash;tter SMS l&oslash;sning Habmi l&aelig;ngere. P&aring; grund af de mange gebyrer og uventede afgifter, kan vi desv&aelig;rre ikke acceptere SMS betaling. Habmi management bekymring og finde en anden m&aring;de end SMS og finde l&oslash;sninger.
            <br><br>
            -Habmi Ledelsen
            <p/>

                                


        </div>
    </div>


        
</div>

    

<div class="method idx1 m-smsfr">
    <div class="method-content">
        <h2>{$lang->shop.spendon}</h2>

        <div class="summary clearfix">
            <ol>
                <li><div>{$lang->shop.spendon_1}</div></li>
                <li><div>{$lang->shop.spendon_2} <a href="#vip">{$lang->shop.spendon_2_vip}</a> {$lang->shop.spendon_2_end}</div></li>
                <li><div>{$lang->shop.spendon_3}</div></li>
                <li><div>{$lang->shop.spendon_4}</div></li>
                <li><div>{$lang->shop.spendon_5}</div></li>
            </ol>
        </div>
    </div>  

            <div class="smallprint">
                {$lang->shop.problems} <a href="{www}/help/index?topic=6" target="habbohelp">{$lang->shop.problems_helptool}</a> {$lang->shop.problems_end}
            </div>
        
</div>
            </div>

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
</script></div>
<div id="column2" class="column">
                        
                <div class="habblet-container ">        
                        <div class="ad-container"><?php require $skin->widget('ads2'); ?></div>
                </div>
                <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
             

</div>
<!--[if lt IE 7]>
<script type="text/javascript">
Pngfix.doPngImageFix();
</script>
<![endif]-->

<?php require $skin->widget('footer'); ?>