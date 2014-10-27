<h2>AdSavvy Plugin for WordPress</h2>

<div>
<p>Please enter your unique AdSavvy IDs below.</p>

<p>NOTE: Your unique AdSavvy IDs will be found in your AdSavvy account, under <a href="https://console.savvyads.com/#/settings">Settings</a> in the AdSavvy Console</p>
</div>

<form action="options.php" method="POST">
	
	<?php settings_fields('adsavvy_setting') ?>
	<?php do_settings_sections( 'wp_adsavvy' ) ?>
	
	<input type="submit" value="Update AdSavvy Settings" />
</form>