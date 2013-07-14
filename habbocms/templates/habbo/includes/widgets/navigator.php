<?php
	$lang->addTranslation('navigator');
	$navigator = readJSON($cache->openCache('habbocms_navi.json'), true);
	if(!$navigator) {
		$navigator = $cache->cacheNavigator();
	}
?>
<div id="overlay"></div>
<div id="header-container">
	<div id="header" class="clearfix">
		<h1><a href="{www}/"></a></h1>
<div id="subnavi" class=wide>
		<div id="subnavi-search">
				<div id="subnavi-search-upper">
				<ul id="subnavi-search-links">
								<li>{$lang->navigator.welcomemessage}</li>
						<li>
								<form action="{www}/account/logout?token={session_token}" method="POST">
										<button type="submit" id="signout" class="link"><span>{$lang->navigator.signout}</span></button>
								</form>
						</li>
				</ul>
				</div>
		</div>
		<div id="to-hotel">
			<a href="{www}/client" class="new-button green-button" target="{session_token}" onclick="HabboClient.openOrFocus(this); return false;"><b>{$lang->navigator.enter}</b><i></i></a>
		</div>
</div>

<script type="text/javascript">
L10N.put("purchase.group.title", "Create a Group");
document.observe("dom:loaded", function() {
		$("signout").observe("click", function() {
				HabboClient.close();
		});
});
</script>

<ul id="navi">
<?php
	$parents = array_filter($navigator, function($a) {
		return $a['parent_id'] == -1 && ($a['active'] == 1 || $a['active'] == 2) && (empty($a['permission']) || $GLOBALS['core']->permission($a['permission']));
	});

	foreach($parents as $array) {
		$value = '';
		$class_id = '';
		$class = '';
		$selected = (PARENT == $array['id'])?true:false;
		if(!empty($array['class_id'])) {
			$class_id = ' id="' . $array['class_id'] . '"';
		}

		if(!empty($array['class'])) {
			$class = ' class="' . (($selected)?'selected ':'') . $array['class'] . '"';
		} elseif($selected) {
			$class = ' class="selected"';
		}

		if($selected) {
			$value = '<strong>' . $array['value'] . '</strong>';
		} else {
			$value = '<a href="' . $array['link'] . '"' . ((!empty($array["target"])?' target="' . $array["target"] . '"':'')) . '>' . $array['value'] . '</a>';
		}

		echo '
        <li' . $class_id . $class . '>
            ' . $value . '
            <span></span>
        </li>
';
	}

?>
</ul>

<div id="habbos-online"><div class="rounded"><span>{$lang->navigator.users_online}</span></div></div>
</div>
</div>

<div id="content-container">
<div id="navi2-container" class="pngbg">
		<div id="navi2" class="pngbg clearfix">
	<ul>
<?php
	$children = array_filter($navigator, function($a) {
		return $a['parent_id'] == PARENT && ($a['active'] == 1 || $a['active'] == 2);
	});

	$i = 0;
	$x = count($children) - 2;
	foreach($children as $array) {
		$last = ($i > $x)?' last':'';
		$selected = ($array['id'] == CHILD)?true:false;
		if($selected) {
			$value = $array['value'];
		} else {
			$value = '<a href="' . $array['link'] . '"' . ((!empty($array["target"])?' target="' . $array["target"] . '"':'')) . '>' . $array['value'] . '</a>';
		}
		echo '
        <li class="' . (($selected)?'selected':'') . $last . '">
            ' . $value . '
        </li>
';
		$i++;
	}
?>
	</ul>
		</div>

</div>