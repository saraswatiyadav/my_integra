<?php
class wpbc_order_form{
    static function display_form_handler($atts)
    {
        echo '<link type="text/css" rel="stylesheet" href="'.WP_BITCOIN_PLUGIN_URL.'/style.php" />'."\n";
        $output .= wpbc_order_form::show_order_form($atts);
        return $output;
    }

    static function show_order_form($atts)
    {
        ob_start();
        wpbc_order_form::order_form_body_content($atts);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    static function order_form_body_content($atts)
    {
        echo '<script type="text/javascript" src="'.WP_BITCOIN_PLUGIN_URL.'/jquery.validate.js"></script>';
        $validate_output = <<<EOT
             <script type="text/javascript">
             /* <![CDATA[ */
            jQuery.noConflict();
            jQuery(document).ready(function($){
                    $("#wp_bitcoin_order_form").validate();
                            $("input#copyaddress").click(function()
                            {
                                    if ($("input#copyaddress").is(':checked'))
                                    {
                                            // Checked, copy values
                                            $("input#shipping_fname").val($("input#fname").val());
                                            $("input#shipping_lname").val($("input#lname").val());
                                            $("input#shipping_address").val($("input#address").val());
                                            $("input#shipping_city").val($("input#city").val());
                                            $("input#shipping_state").val($("input#state").val());
                                            $("input#shipping_zip").val($("input#zip").val());
                                            var bcountry = $("select#country").val();
                            $('select#shipping_country option[value=' + bcountry + ']').attr('selected', 'selected');
                                            $("input#shipping_email").val($("input#email").val());
                                            $("input#shipping_phone").val($("input#phone").val());
                                    }
                                    else
                                    {
                                            // Clear on uncheck
                                            $("input#shipping_fname").val("");
                                            $("input#shipping_lname").val("");
                                            $("input#shipping_address").val("");
                                            $("input#shipping_city").val("");
                                            $("input#shipping_state").val("");
                                            $("input#shipping_zip").val("");
                                            $('select#shipping_country option[value=""]').attr('selected', 'selected');
                                            $("input#shipping_email").val("");
                                            $("input#shipping_phone").val("");
                                    }
                            });
            });
      /* ]]> */
      </script>
EOT;
        echo $validate_output;

        $show_cart = true;
        $show_billing_details = 1;
        $show_shipping_details = 0;
        $show_credit_card_details = 0;

        //Common stripping
        $_REQUEST["fname"] = sanitize_text_field($_REQUEST["fname"]);
        $_REQUEST["lname"] = sanitize_text_field($_REQUEST["lname"]);
        $_REQUEST["address"] = sanitize_text_field($_REQUEST["address"]);
        $_REQUEST["city"] = sanitize_text_field($_REQUEST["city"]);
        $_REQUEST["state"] = sanitize_text_field($_REQUEST["state"]);
        $_REQUEST["zip"] = sanitize_text_field($_REQUEST["zip"]);
        $_REQUEST["country"] = sanitize_text_field($_REQUEST["country"]);
        $_REQUEST["email"] = sanitize_text_field($_REQUEST["email"]);
        $_REQUEST["phone"] = sanitize_text_field($_REQUEST["phone"]);
        ?>
    <div align="center" class="wrapper">

    <div class="wp_bitcoin_order_form_container">
    <form id="wp_bitcoin_order_form" name="wp_bitcoin_order_form" method="post" action="" enctype="multipart/form-data" onsubmit="" class="wp_bitcoin_order_form">

    <div id="wp_bitcoin_order_form_content">

        <?php
        if(!empty($_SESSION['estore_bitpay_form_submission_error'])){
            echo '<div class="estore_bitpay_form_submission_error">'.$_SESSION['estore_bitpay_form_submission_error'].'</div>';
        }
        $item_name = sanitize_text_field($_REQUEST["item_name"]);
        $item_price = sanitize_text_field($_REQUEST["price"]);
        $currency = sanitize_text_field($_REQUEST["currency"]);
        if($show_cart)
        {
            echo "Item Name: ".$item_name."<br />";
            echo "Price: ".$item_price." ".$currency."<br />";
        }
        ?>
        <input type="hidden" name="item_name" value="<?php echo $item_name; ?>" />
        <input type="hidden" name="price" value="<?php echo $item_price; ?>" />
        <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
        <?php
        $text = WP_Bitcoin::get_text_message();
        $countries = wpbc_order_form::get_country_list();
        if($show_billing_details){
            wpbc_order_form::billing_block($countries, $text);
        }
        if($show_shipping_details){
            wpbc_order_form::shipping_block($countries, $text);
        }
        if($show_credit_card_details){
            wpbc_order_form::credit_card_block($text);
        }
        ?>
    <div class="estore_bitpay_clr"></div>
    <div class="submit-btn"><input src="<?php echo WP_BITCOIN_PLUGIN_URL; ?>/images/submit_button.png" type="image" name="submit" /></div>
    <input type="hidden" name="wpbc_user_info_submit" value="yes" />

    </div>
    </form>
    </div>
    </div>
    <?php
    }
    
    static function billing_block($countries, $text)
    {
    ?>
    <h2><?php echo $text['BILLING_INFORMATION'];?></h2>
    <div class="pane">
        <label><?php echo $text['BILLING_FIRST_NAME'];?></label>
        <input name="fname" id="fname" type="text" class="long-field required"  value="<?php echo $_REQUEST["fname"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_LAST_NAME'];?></label>
        <input name="lname" id="lname" type="text" class="long-field required"  value="<?php echo $_REQUEST["lname"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_ADDRESS'];?></label>
        <input name="address" id="address" type="text" class="long-field required"  value="<?php echo $_REQUEST["address"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_CITY'];?></label>
        <input name="city" id="city" type="text" class="long-field required"  value="<?php echo $_REQUEST["city"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_STATE_PROVINCE'];?></label>
        <input name="state" id="state" type="text" class="long-field required"  value="<?php echo $_REQUEST["state"];?>" />

        <div class="wp_bitcoin_clr"></div>
        <label><?php echo $text['BILLING_ZIP_POSTAL_CODE'];?></label>
        <input name="zip" id="zip" type="text" class="small-field required"  value="<?php echo $_REQUEST["zip"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_COUNTRY'];?></label>
        <select name="country" id="country" class="long-field required" >
            <option value=""><?php echo $text['SELECT_BILLING_COUNTRY'];?></option>
            <?php foreach($countries as $code => $name){ ?>
            <option value="<?php echo $code;?>" <?php echo $_REQUEST["country"]=="$code"?"selected":""?>><?php echo $name;?></option>
            <?php } ?>
        </select>
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_EMAIL'];?></label>
        <input name="email" id="email" type="text" class="long-field required"  value="<?php echo $_REQUEST["email"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['BILLING_PHONE'];?></label>
        <input name="phone" id="phone" type="text" class="long-field"  value="<?php echo $_REQUEST["phone"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <input type="hidden" name="estore_bitpay_billing_details_submitted" value="" />

    </div>
    <?php
    }

    static function shipping_block($countries, $text)
    {
    ?>
    <h2><?php echo $text['SHIPPING_INFORMATION'];?></h2>
    <div class="pane">
        <label><?php echo $text['SAME_AS_BILLING_INFORMATION'];?></label>
        <input type="checkbox" id="copyaddress" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_FIRST_NAME'];?></label>
        <input name="shipping_fname" id="shipping_fname" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_fname"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_LAST_NAME'];?></label>
        <input name="shipping_lname" id="shipping_lname" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_lname"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_ADDRESS'];?></label>
        <input name="shipping_address" id="shipping_address" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_address"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_CITY'];?></label>
        <input name="shipping_city" id="shipping_city" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_city"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_STATE_PROVINCE'];?></label>
        <input name="shipping_state" id="shipping_state" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_state"];?>" />

        <div class="wp_bitcoin_clr"></div>
        <label><?php echo $text['SHIPPING_ZIP_POSTAL_CODE'];?></label>
        <input name="shipping_zip" id="shipping_zip" type="text" class="small-field required"  value="<?php echo $_REQUEST["shipping_zip"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_COUNTRY'];?></label>
        <select name="shipping_country" id="shipping_country" class="long-field required" >
            <option value=""><?php echo $text['SELECT_SHIPPING_COUNTRY'];?></option>
            <?php foreach($countries as $code => $name){ ?>
            <option value="<?php echo $code;?>" <?php echo $_REQUEST["shipping_country"]=="$code"?"selected":""?>><?php echo $name;?></option>
            <?php } ?>
        </select>
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_EMAIL'];?></label>
        <input name="shipping_email" id="shipping_email" type="text" class="long-field required"  value="<?php echo $_REQUEST["shipping_email"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <label><?php echo $text['SHIPPING_PHONE'];?></label>
        <input name="shipping_phone" id="shipping_phone" type="text" class="long-field"  value="<?php echo $_REQUEST["shipping_phone"];?>" />
        <div class="wp_bitcoin_clr"></div>

        <input type="hidden" name="estore_bitpay_shipping_details_submitted" value="" />

    </div>
    <?php
    }

    static function credit_card_block($text)
    {
    $year = date("y");
    ?>
    <h2><?php echo $text['CREDIT_CARD_INFORMATION'];?></h2>
    <div class="pane">
    <label><?php echo $text['CREDIT_CARD_NUMBER'];?></label>
    <input name="cardnumber" id="ccn" type="text" class="long-field required" value="" maxlength="16" />
    <div class="wp_bitcoin_clr"></div>

    <label><?php echo $text['NAME_ON_CREDIT_CARD'];?></label>
    <input name="cardname" id="ccname" type="text" class="long-field required"   />
    <div class="wp_bitcoin_clr"></div>
    
    <label><?php echo $text['CREDIT_CARD_EXPIRATION_DATE'];?></label>
    <select name="cardexpirymonth" id="exp1" class="small-field required" >
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <select name="cardexpiryyear" id="exp2" class="small-field required" >
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
        <option value="<?php echo $year+1; ?>"><?php echo $year+1; ?></option>
        <option value="<?php echo $year+2; ?>"><?php echo $year+2; ?></option>
        <option value="<?php echo $year+3; ?>"><?php echo $year+3; ?></option>
        <option value="<?php echo $year+4; ?>"><?php echo $year+4; ?></option>
        <option value="<?php echo $year+5; ?>"><?php echo $year+5; ?></option>
        <option value="<?php echo $year+6; ?>"><?php echo $year+6; ?></option>
        <option value="<?php echo $year+7; ?>"><?php echo $year+7; ?></option>
        <option value="<?php echo $year+8; ?>"><?php echo $year+8; ?></option>
        <option value="<?php echo $year+9; ?>"><?php echo $year+9; ?></option>
        <option value="<?php echo $year+10; ?>"><?php echo $year+10; ?></option>
    </select>
    <div class="wp_bitcoin_clr"></div>
    
    <label><?php echo $text['CREDIT_CARD_CVV'];?></label>
    <input name="cardcvv" id="cvv" type="text" maxlength="5" class="small-field required" />
    <span class="tooltip_green" data-text="<?php echo $text['CREDIT_CARD_CVV_HELP_TEXT']; ?>"></span>
    <input type="hidden" name="estore_bitpay_credit_card_details_submitted" value="" />
    
    </div>
    <?php
    }
    
    static function get_country_list()
    {
        $countries = array(
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia, Plurinational State of',
            'BQ' => 'Bonaire, Sint Eustatius and Saba',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, the Democratic Republic of the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Côte d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CW' => 'Curaçao',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea, Democratic People\'s Republic of',
            'KR' => 'Korea, Republic of',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia, The Former Yugoslav Republic of',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States of',
            'MD' => 'Moldova, Republic of',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestine, State of',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Réunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthélemy',
            'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin (French part)',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SX' => 'Sint Maarten (Dutch part)',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'SS' => 'South Sudan',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard and Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan, Province of China',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania, United Republic of',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Minor Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela, Bolivarian Republic of',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        );

        return $countries;
    }
}

