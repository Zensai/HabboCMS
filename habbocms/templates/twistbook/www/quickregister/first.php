<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	if($server->countClones() > $core->settings->max_accounts) {
		header("Location: " . WWW . "/index?maxclones");
		exit;
	}

	if(isset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'])) {
		header("Location: " . WWW . "/quickregister/second");
		exit;
	}
	$html->setKey('extra', '

	<script>
		$(document).ready(function() {
			$(\'#genderChooserBoy\').click(function() {
				$(\'#genderChooser\').val("M");
				$(this).addClass(\'selected\');
				$(\'#genderChooserGirl\').removeClass(\'selected\');
			});

			$(\'#genderChooserGirl\').click(function() {
				$(\'#genderChooser\').val("F");
				$(this).addClass(\'selected\');
				$(\'#genderChooserBoy\').removeClass(\'selected\');
			});
			
			$(\'.submitFirstStep\').click(function() { 
				submitFirstStep(\'{www}/quickregister/check/first\');
			});
			
			function submitFirstStep(pageName) {
				$(\'.errorContainer\').html(\'<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="{webgallery}icons/ajax-loader-second.gif"></div>\');
				$.ajax({
					type: "POST",
					url: pageName,
					data: "bean.dob_day=" + $(\'.birthday-day\').val() + "&bean.dob_month=" + $(\'.birthday-month\').val() + "&bean.dob_year=" + $(\'.birthday-year\').val() + "&bean.gender=" + $(\'#genderChooser\').val(),
					success: function(php){
						$(\'.errorContainer\').html(php);
					}
				});
			}
			
		});
	</script>

	');

	$lang->addTranslation('register1');
	$skin->install($lang->loc['register1.pagetitle'], 'register', false, false);
?>
		<div class="overlowLoadingContainer"></div>
		<div class="container">
			<div class="dotsContainer">
				<div class="dots checked"></div>
				<div class="dots default"></div>
				<div class="dots default"></div>
			</div>
			
			<div class="errorContainer"></div>
			<div class="inside">
				<div class="headerTitle">{$lang->register1.dob}</div>
				<div id="container">
					<div class="title">{$lang->register1.dob_insert}</div>
					
					<select name="birthday-day" class="birthday-day" style="margin-left: 0;">
						<option value="">{$lang->register1.day}</option>
						<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>
					</select>
					<select name="birthday-month" class="birthday-month">
						<option value="">{$lang->register1.month}</option>
						<option value='1'>{$lang->register1.month_jan}</option><option value='2'>{$lang->register1.month_feb}</option><option value='3'>{$lang->register1.month_mar}</option><option value='4'>{$lang->register1.month_apr}</option><option value='5'>{$lang->register1.month_may}</option><option value='6'>{$lang->register1.month_jun}</option><option value='7'>{$lang->register1.month_jul}</option><option value='8'>{$lang->register1.month_aug}</option><option value='9'>{$lang->register1.month_sep}</option><option value='10'>{$lang->register1.month_oct}</option><option value='11'>{$lang->register1.month_nov}</option><option value='12'>{$lang->register1.month_dec}</option>
					</select>
					<select name="birthday-year" class="birthday-year">
						<option value=''>{$lang->register1.year}</option>
		                <option value='2013'>2013</option><option value='2012'>2012</option><option value='2011'>2011</option><option value='2010'>2010</option><option value='2009'>2009</option><option value='2008'>2008</option><option value='2007'>2007</option><option value='2006'>2006</option><option value='2005'>2005</option><option value='2004'>2004</option><option value='2003'>2003</option><option value='2002'>2002</option><option value='2001'>2001</option><option value='2000'>2000</option><option value='1999'>1999</option><option value='1998'>1998</option><option value='1997'>1997</option><option value='1996'>1996</option><option value='1995'>1995</option><option value='1994'>1994</option><option value='1993'>1993</option><option value='1992'>1992</option><option value='1991'>1991</option><option value='1990'>1990</option><option value='1989'>1989</option><option value='1988'>1988</option><option value='1987'>1987</option><option value='1986'>1986</option><option value='1985'>1985</option><option value='1984'>1984</option><option value='1983'>1983</option><option value='1982'>1982</option><option value='1981'>1981</option><option value='1980'>1980</option><option value='1979'>1979</option><option value='1978'>1978</option><option value='1977'>1977</option><option value='1976'>1976</option><option value='1975'>1975</option><option value='1974'>1974</option><option value='1973'>1973</option><option value='1972'>1972</option><option value='1971'>1971</option><option value='1970'>1970</option><option value='1969'>1969</option><option value='1968'>1968</option><option value='1967'>1967</option><option value='1966'>1966</option><option value='1965'>1965</option><option value='1964'>1964</option><option value='1963'>1963</option><option value='1962'>1962</option><option value='1961'>1961</option><option value='1960'>1960</option><option value='1959'>1959</option><option value='1958'>1958</option><option value='1957'>1957</option><option value='1956'>1956</option><option value='1955'>1955</option><option value='1954'>1954</option><option value='1953'>1953</option><option value='1952'>1952</option><option value='1951'>1951</option><option value='1950'>1950</option><option value='1949'>1949</option><option value='1948'>1948</option><option value='1947'>1947</option><option value='1946'>1946</option><option value='1945'>1945</option><option value='1944'>1944</option><option value='1943'>1943</option><option value='1942'>1942</option><option value='1941'>1941</option><option value='1940'>1940</option><option value='1939'>1939</option><option value='1938'>1938</option><option value='1937'>1937</option><option value='1936'>1936</option><option value='1935'>1935</option><option value='1934'>1934</option><option value='1933'>1933</option><option value='1932'>1932</option><option value='1931'>1931</option><option value='1930'>1930</option><option value='1929'>1929</option><option value='1928'>1928</option><option value='1927'>1927</option><option value='1926'>1926</option><option value='1925'>1925</option><option value='1924'>1924</option><option value='1923'>1923</option><option value='1922'>1922</option><option value='1921'>1921</option><option value='1920'>1920</option><option value='1919'>1919</option><option value='1918'>1918</option><option value='1917'>1917</option><option value='1916'>1916</option><option value='1915'>1915</option><option value='1914'>1914</option><option value='1913'>1913</option><option value='1912'>1912</option><option value='1911'>1911</option><option value='1910'>1910</option><option value='1909'>1909</option><option value='1908'>1908</option><option value='1907'>1907</option><option value='1906'>1906</option><option value='1905'>1905</option><option value='1904'>1904</option><option value='1903'>1903</option><option value='1902'>1902</option><option value='1901'>1901</option><option value='1900'>1900</option>
					</select>
				</div>
				
				<div id="line"></div>
				<div id="container">				
					<div class="genderChooserContainer">				
						<div class="genderChooser" id="genderChooserBoy" style="margin-right: 20px;">					
							<div class="inside">					
								<div class="bgTop"></div>
								<div class="bgBottom"></div>
							
								<div class="gender-choice">		                            
									{$lang->register1.male} <br> <img src="{www}/web-gallery/general/register/male_sign.png" width="36" height="47">		                   
								</div>							
							</div>					
						</div>
					
						<div class="genderChooser" id="genderChooserGirl">								
							<div class="inside">					
								<div class="bgTop"></div>
								<div class="bgBottom"></div>
							
								<div class="gender-choice">		                            
									{$lang->register1.female} <br> <img src="{www}/web-gallery/general/register/female_sign.png" width="36" height="47">		                   
								</div>
							</div>
						</div>
						<input type="hidden" id="genderChooser" name="gender" value="" />
					</div>
				</div>
				<div id="buttonContainer">
					<div onclick="window.location.href='{www}'" id="submitBlack" class="submitLeft">{$lang->register1.cancel}</div>
					<div id="submitDarkBlue" class="submitRight submitFirstStep">{$lang->register1.next}</div>
				</div>
			</div>
		</div>
	</body>
</html>