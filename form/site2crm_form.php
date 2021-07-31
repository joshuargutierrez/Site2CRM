<?php
/* 
 * Template Name: Site2CRM_form 
 * Copyright (C) 2019  Site2CRM
 */
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
get_header();
?>

<div id="content" class='wrap'>
    <form action="<?php echo esc_url( admin_url('admin-post.php')); ?>" method="post" class="wpforms-field-large" name="site2crm_form" id="searchform" 
          style='min-height: 80vh; width:60vw; display:block; margin:0.4vh auto 1vh 3vw; padding:3em; border:0.01em outset #efedec; box-shadow: 6px 7px 9px #efedec;'>
        <?php
        if(get_option('site2crm_contact_name')){
            if(get_option('site2crm_contact_name_required', 'true')){
                echo '<label for="site2crm_contact_name_live" style="display:block;">*First Name: </label> <input class="Site2CRM-Input wpforms-field-large" id="site2crm_contact_name_live" type="text" name="site2crm_contact_name_live" placeholder="Your Name" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo '<label for="site2crm_contact_name_live" style="display:block;">First Name: </label> <input class="Site2CRM-Input" id="site2crm_contact_name_live" type="text" name="site2crm_contact_name_live" placeholder="Your Name" style="margin-bottom:2vh;width:80%;"/></br>';
            }
        }
        if(get_option('site2crm_contact_last_name')){
            if(get_option('site2crm_contact_last_name_required', 'true')){
                echo '<label for="site2crm_contact_last_name_live" style="display:block;">*Last Name: </label> <input class="Site2CRM-Input" id="site2crm_contact_last_name_live" type="text" name="site2crm_contact_last_name_live" placeholder="Your Last Name" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo '<label for="site2crm_contact_last_name_live" style="display:block;">Last Name: </label> <input class="Site2CRM-Input" id="site2crm_contact_last_name_live" type="text" name="site2crm_contact_last_name_live" placeholder="Your Last Name" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_company_name')){
            if(get_option('site2crm_company_name_required', 'true')){
                echo '<label for="site2crm_company_name_live" style="display:block;">*Company: </label><input class="Site2CRM-Input" id="site2crm_company_name_live" type="text" name="site2crm_company_name_live"  placeholder="Company Name" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo '<label for="site2crm_company_name_live" style="display:block;">Company: </label><input class="Site2CRM-Input" id="site2crm_company_name_live" type="text" name="site2crm_company_name_live" placeholder="Company Name" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_phone')){
            if(get_option('site2crm_contact_phone_required', 'true')){
                echo '<label for="site2crm_contact_phone_live" style="display:block;">*Phone:</label><input class="Site2CRM-Input" id="site2crm_contact_phone_live" type="tel" name="site2crm_contact_phone_live" placeholder="555-555-5555" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_phone_live" style="display:block;">Phone:</label><input class="Site2CRM-Input" id="site2crm_contact_phone_live" type="tel" name="site2crm_contact_phone_live" placeholder="555-555-5555" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_email')){
            if(get_option('site2crm_contact_email_required', 'true')){
                echo '<label for="site2crm_contact_email_live" style="display:block;">*Email: </label><input class="Site2CRM-Input" id="site2crm_contact_email_live" type="email" name="site2crm_contact_email_live" placeholder="you@yourdomain.com" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_email_live" style="display:block;">Email: </label><input class="Site2CRM-Input" id="site2crm_contact_email_live" type="email" name="site2crm_contact_email_live" placeholder="you@yourdomain.com" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_address')){
            if(get_option('site2crm_contact_address_required', 'true')){
                echo '<label for="site2crm_contact_address_live" style="display:block;">*Address: </label><input class="Site2CRM-Input" id="site2crm_contact_address_live" type="text" name="site2crm_contact_address_live" placeholder="Address" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_address_live" style="display:block;">Address: </label><input class="Site2CRM-Input" id="site2crm_contact_address_live" type="text" name="site2crm_contact_address_live" placeholder="Address" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_city')){
            if(get_option('site2crm_contact_city_required', 'true')){
                echo '<label for="site2crm_contact_city_live" style="display:block;">*City: </label><input class="Site2CRM-Input" id="site2crm_contact_city_live" type="text" name="site2crm_contact_city_live" placeholder="City" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_city_live" style="display:block;">City: </label><input class="Site2CRM-Input" id="site2crm_contact_city_live" type="text" name="site2crm_contact_city_live" placeholder="City" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_state_region')){
            if(get_option('site2crm_contact_state_region_required', 'true')){
                echo '<label for="site2crm_contact_state_region_live" style="display:block;">*State: </label><input class="Site2CRM-Input" id="site2crm_contact_state_region_live" type="text" name="site2crm_contact_state_region_live" style="margin-bottom:2vh;width:80%;" placeholder="State" required/></br>';
            }else{
                echo'<label for="site2crm_contact_state_region_live" style="display:block;">State: </label><input class="Site2CRM-Input" id="site2crm_contact_state_region_live" type="text" name="site2crm_contact_state_region_live" style="margin-bottom:2vh;width:80%;" placeholder="State" /></br>';
            }
        }
        if(get_option('site2crm_contact_postal_code')){
            if(get_option('site2crm_contact_postal_code_required', 'true')){
                echo '<label for="site2crm_contact_postal_code_live" style="display:block;">*Postal Code: </label><input class="Site2CRM-Input" id="site2crm_contact_postal_code_live" type="text" name="site2crm_contact_postal_code_live" placeholder="Postal Code" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_postal_code_live" style="display:block;">Postal Code: </label><input class="Site2CRM-Input" id="site2crm_contact_postal_code_live" type="text" name="site2crm_contact_postal_code_live" placeholder="Postal Code" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_contact_country')){
            if(get_option('site2crm_contact_country_required', 'true')){
                echo '<label for="site2crm_contact_country_live" style="display:block;">*Country: </label><input class="Site2CRM-Input" id="site2crm_contact_country_live" type="text" name="site2crm_contact_country_live" placeholder="Country" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_contact_country_live" style="display:block;">Country: </label><input class="Site2CRM-Input" id="site2crm_contact_country_live" type="text" name="site2crm_contact_country_live" placeholder="Country" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }echo '</br>';
        if(get_option('site2crm_web_address')){
            if(get_option('site2crm_web_address_required', 'true')){
                echo '<label for="site2crm_web_address_live_live" style="display:block;">*Website URL: </label><input class="Site2CRM-Input" id="site2crm_web_address_live" type="text" name="site2crm_web_address_live" placeholder="www.yourcompany.com" style="margin-bottom:2vh;width:80%;" required/></br>';
            }else{
                echo'<label for="site2crm_web_address_live_live" style="display:block;">Website URL: </label><input class="Site2CRM-Input" id="site2crm_web_address_live" type="text" name="site2crm_web_address_live" placeholder="www.yourcompany.com" style="margin-bottom:2vh;width:80%;" /></br>';
            }
        }
        if(get_option('site2crm_form_message')){
            if(get_option('site2crm_form_message_required', 'true')){
                echo '<label for="site2crm_contact_message_live" style="display:block;">*Comments: </label><textarea class="Site2CRM-Input" id="site2crm_contact_message_live" name="site2crm_contact_message_live" style="resize:none; height:8em; width:80%; margin-bottom:2vh;" placeholder="Please include any additional questions or comments here." required></textarea></br>';
            }else{
                echo'<label for="site2crm_contact_message_live" style="display:block;">Comments: </label><textarea class="Site2CRM-Input" id="site2crm_contact_message_live" name="site2crm_contact_message_live" style="resize:none; height:8em; width:80%; margin-bottom:2vh;" placeholder="Please include any additional questions or comments here." ></textarea></br>';
            }
        }
        ?>
        <input type="hidden" name="action" value="site2crm_redirect">
        <input type="submit" class="Site2CRM-Submit"  value="Submit" />
    </form>
</div>
<?php get_footer();