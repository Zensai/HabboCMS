<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>{sitename}: {pagetitle}</title>
  <script type="text/javascript">
    var andSoItBegins = (new Date()).getTime();
  </script>
{pageset}
  <script type="text/javascript">
    document.habboLoggedIn = {loggedin};
    var habboName = {username};
	var habboId = {habboid};
	var habboReqPath = "";
	var habboStaticFilePath = "{webgallery}";
	var habboImagerUrl = "{www}/habbo-imaging/";
	var habboPartner = "";
	var habboDefaultClientPopupUrl = "{www}/client";
	window.name = "{windowdname}";
	if(typeof HabboClient != "undefined") {
	  HabboClient.windowName = "client";
	  HabboClient.maximizeWindow = true;
	}
  </script>
  <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />{extra}
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="build" content="HabboCMS {build}" />
</head>
<body{body_extra}>