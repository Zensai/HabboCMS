<?php
			ob_start();
				include $html->file;
			echo $html->filterString($lang->translate(ob_get_clean()));