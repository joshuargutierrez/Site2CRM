#  Site2CRM-PRO
Contributors: Joshua R. Gutierrez
Plugin Name: Site2CRM
Donate link: https://www.joshuarg.net/site2crm
Requires at least: 2.3
Requires PHP: 5.2.4
Tested up to: 5.3
Stable tag: 0.1
License: GNU GENERAL PUBLIC LICENSE Version 3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

#  Description
CRM Lead Creation, and web form. Site2CRM-PRO includes a built in form template that can be added to any page. When the form is submitted a lead, contact, and company is created inside the users CRM, an email is sent to the administrator, and the data is stored to their local database as a custom 'lead' post type.

# Installation
1. Download Site2CRM-PRO.zip from https://www.joshuarg.net/site2crm
2. Extract the .zip file to any location
3. Upload the extracted plugin files to the `/wp-content/plugins/site2CRM-PRO ` directory. (Do Not include the Site2CRM folder in the directory; just its contents: admin, assets, form, handler, index.php, License.txt, readme.txt, and Site2CRM-PRO.php) - Location should be wordpress/wp-content/plugins/Site2CRM-PRO/{All Plugin Files}
4. Activate the plugin through the 'Plugins' screen in WordPress
5. Use the Settings->Site2CRM Admin screen to configure the plugin

#  Upgrade Notice
##  1.0

#  Screenshots 
1. Site2CRM Admin choose your current CRM (running with WordPress 7.0 here) - Choose-your-CRM-Screenshot.png
2. Site2CRM Admin add username (running with WordPress 7.0 here) - Add-your-API-token-Screenshot.png
3. Site2CRM Admin add APi Token (running with WordPress 7.0 here) - Add-your-Username-Screenshot.png
4. Site2CRM Pages add Site2CRM_form template (running with WordPress 7.0 here) - Add-Site2CRM-form-Screenshot.png
5. Site2CRM Admin choose which form fields will be included on web form (running with WordPress 7.0 here) - Choose-Form-Fields-Screenshot.png
6. Site2CRM Admin choose redirect path on form submission (running with WordPress 7.0 here) - Choose-Redirect-Path-Screenshot.png

#  Changelog
	...

#  Frequently Asked Questions 
## How many leads can be created with Site2CRM?
    Site2CRM allows unlimited leads to be created per month in your CRM.
## What is Site2CRM?
    Site2CRM is a user friendly lead/deal creation tool that connects the web 
	form on your website directly to your CRM. This way when your visitors to 
	your site fill out a web form you will not have to worry about manually 
	entering their data into your CRM. Site2CRM is also useful for your own 
	team to enter contact information directly into the form instead of manually 
	entering information through your CRM interface.
## Will Site2CRM work for me?
    Site2CRM is compatible with all WordPress websites. Even if you are not 
	currently using a CRM Site2CRM will save input data from your web form to 
	your Site2CRM Analytics, and email the data to you in a user friendly easy 
	to read format.
## Which CRMs are compatible with Site2CRM?
    Site2CRM is currently fully operational with Nutshell CRM, Hubspot CRM, and 
	Pipedrive CRM. However, further integrations will be available soon. Please 
	sign up for our Newsletter for information on future releases.
## How do I choose which CRM I am currently using?
    Simply click on the Choose your CRM tab under the Site2CRM Admin tab. On that 
	page just click the checkbox next to your current CRM, and click Update your CRM.
## How do I set up a connection to my CRM?
    Whichever CRM you use allows you to create an API token under settings (please 
	visit the help section in your CRM for additional details). Once you have your 
	API token click on the API Settings tab under the Site2CRM Admin tab. On that 
	page input your Username, and click on Update Username, then enter your API token, 
	and click Update API Key. your current username and API token should be displayed 
	at the top of the page beneath the API data section
## How do I add a web form to my site?
    Site2CRM comes with a user friendly form that connects directly to your CRM. To 
	add your form go to the Pages tab on your WP dashboard. Hover over the page you 
	wish to add your form to, and click Quick Edit. In the template section select 
	Site2CRM_form, then click Update. Your form will now be visible on the page you chose.
## How do I add fields to my web form?
    Just click on Form Fields under the Site2CRM Admin tab. Then click on the checkbox 
	on the left of the fields that you want included, click the checkbox on the right 
	for the fields you want to be required, click Update Form Fields, and your fields 
	will be instantly added to the Site2CRM_form in your page templates, and the chosen 
	fields should be displayed at the top of the current page as well as whether or not 
	they are required.
## What will happen when a Site2CRM form is submitted on my site?
    Site2CRM will first email the submitted form information to the email address entered 
	as the CRM username. Then the data will be saved to your Site2CRm Analytics page. At 
	that point an API connection will be made with your CRM, and the information will added 
	to your CRM directly. Lastly Site2CRM will redirect the user to a page of your choosing 
	to further engage with your WP site.
## How do I choose where a user will be sent when submitting a Site2CRM form?
    All that is needed to add a redirect on form submission is to click on the Redirect 
	Settings tab under the Site2CRM Admin tab, choose the desired page from the drop-down 
	titled, Redirect Path on Form Submission, click Update Redirect Path, and all form 
	submissions will redirect the user to your desired page,
## Where will form submissions be stored, besides in my CRM?
    Site2CRM will store all your form submissions in your local WP database. They can be 
	accessed by clicking on the Site2CRM analytics in your WP dashboard.

#  Download
https://www.joshuarg.net/site2crm
