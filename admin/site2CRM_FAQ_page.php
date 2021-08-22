<?php
/* Copyright (C) 2019  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
echo '<h1>Site2CRM FAQ</h1>';
echo '<hr>';
echo '<h3>What is Site2CRM?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM is a user friendly lead/deal creation tool '
. 'that connects the web form on your website directly to your CRM. This way when '
. 'your visitors to your site fill out a web form you will not have to worry about '
. 'manually entering their data into your CRM.  Site2CRM is also useful for your '
. 'own team to enter contact information directly into the form instead of manually '
. 'entering information through your CRM interface.';
echo '<hr>';
echo '<h3>Will Site2CRM work for me?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM is compatible with all Wordpress websites.  '
. 'Even if you are not currently using a CRM Site2CRM will save input data from '
. 'your web form to your Site2CRM Analytics, and email the data to you in a user '
. 'friendly easy to read format.';
echo '<hr>';
echo '<h3>Which CRMs are compatible with Site2CRM?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM is currently fully operational with Nutshell '
. 'CRM, Hubspot CRM, and Pipedrive CRM.  However, further integrations will be '
. 'available soon. Please sign up for our NewsLetter for information on future releases.';
echo '<hr>';
echo '<h3>How do I choose which CRM I am currently using?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Simply click on the <i>Choose your CRM</i> tab under the '
. '<i>Site2CRM Admin</i> tab. On that page just click the checkbox next to your '
. 'current CRM, and click <i>Update your CRM</i>.';
echo '<hr>';
echo '<h3>How do I set up a connection to my CRM?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Whichever CRM you use allows you to create an API '
. 'token under settings (<i>please visit the help section in your CRM for '
. 'additional details</i>). Once you have your API token click on the '
. '<i>API Settings</i> tab under the <i>Site2CRM Admin</i> tab.  On that page'
. 'input your Username, and click on <i>Update Username</i>, then enter your API '
. 'token, and click <i>Update API Key</i>.  your current username and API token '
. 'should be displayed at the top of the page beneath the API data section';
echo '<hr>';
echo '<h3>How do I add a web form to my site?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM comes with a user friendly form that connects '
. 'directly to your CRM.  To add your form, either: 
	<ol>
		<li>
			Paste the shortcode [Site2CRM_web_form] into any page on your site, and a 
			Site2CRM form will be added to that page.
		</li>
		<li>
		  go the <i>Pages</i> tab on your WP '
		. 'dashboard.  Hover over the page you wish to add your form to, and click '
		. '<i>Quick Edit</i>. In the template section select Site2CRM_form, then click '
		. '<i>Update</i>.  Your form will now be visible on the page you chose. 
		</li>
	</ol>';
echo '<hr>';
echo '<h3>How do I add fields to my web form?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Just click on <i>Form Fields</i> under the <i>Site2CRM '
. 'Admin</i> tab. Then click on the checkbox on the left of the fields that you want '
. 'included, click the checkbox on the right for the fields you want to be '
. 'required, click <i>Update Form Fields</i>, and your fields will be instantly '
. 'added to the Site2CRM_form in your page templates, and the chosen fields '
. 'should be displayed at the top of the current page as well as whether or not '
. 'they are required.';
echo '<hr>';
echo '<h3>What will happen when a Site2CRM form is submitted on my site?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM will first email the submitted form information'
. 'to the email address entered as the CRM username.  Then the data will be saved to your '
. 'Site2CRm Analytics page.  At that point an API connection will be made with your CRM, '
. 'and the information will added to your CRM directly.  Lastly Site2CRM will '
. 'redirect the user to a page of your choosing to further engage with your WP site.';
echo '<hr>';
echo '<h3>How do I choose where a user will be sent when submitting a Site2CRM form?</h3>';
echo '&nbsp;&nbsp;&nbsp; - All that is needed to add a redirect on form submission '
. 'is to click on the <i>Redirect Settings</i> tab under the <i>Site2CRM Admin</i> '
. 'tab, choose the desired page from the dropdown titled, Redirect Path on Form '
. 'Submission, click <i>Update Redirect Path, </i>and all form submissions will '
. 'redirect the user to your desired page,';
echo '<hr>';
echo '<h3>Where will form submissions be stored, besides in my CRM?</h3>';
echo '&nbsp;&nbsp;&nbsp; - Site2CRM will store all your form submissions in your'
. 'local WP database.  They can be accessed by clicking on the <i>Site2CRM analytics</i> '
. 'in your WP dashboard.';
echo '</div>';
