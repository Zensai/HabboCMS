<?php
 define('PARENT', '3');
 define('CHILD', '19');
 $this->styleset('credits');
 $this->setKey('body_extra', ' id="cbs2credits"');
 $this->setKey('pagetitle', 'Information');
 $this->install_widget('header');
 $this->install_widget((IDENTITY == 'null')?'off_navigator':'navigator');
?>
<div id="container">
    <div id="content" style="position: relative" class="clearfix">
    <div id="column1" class="column">
                        
                <div class="habblet-container ">        
                        <div class="cbb clearfix orange ">
    
                            <h2 class="title">Comming soon</h2>           
<div class="method-group phone clearfix   cbs2">
More information comming soon.
</div>


<div class="disclaimer">
    <h3><span>Always ask for permission before purchasing Points.</span></h3>
    There is no refunds on Habmi purchases, If you need help or got a question contact us via <a onclick="openOrFocusHelp(this); return false" target="habbohelp" href="#">Help tool</a>
</div>

                        
                            
                    </div>
                </div>
                <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
</div>
<script type="text/javascript">
HabboView.run();
</script>
<div id="column2" class="column">
                        
                <div class="habblet-container ">        
    
                        <div class="ad-container"><?php $this->install_widget('ads2'); ?></div>

                        
                    
                </div>
                <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
             

</div>
<!--[if lt IE 7]>
<script type="text/javascript">
Pngfix.doPngImageFix();
</script>
<![endif]-->
</div>

<?php $this->install_widget('footer'); ?>