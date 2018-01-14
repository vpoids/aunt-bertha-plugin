<?php
/*
Plugin Name: Aunt Bertha
Description: Search auntbertha.com
*/

// Register and load the widget
function auntbertha_load_widget() {
  register_widget('auntbertha_widget');
}
add_action( 'widgets_init', 'auntbertha_load_widget' );
 
function aunt_bertha_settings_init() {
  // register a new setting for the settings page
  register_setting( 'aunt_bertha', 'aunt_bertha_settings' );
 
  // register a new section in the "settings" page
  add_settings_section(
    'aunt_bertha_section',
    __('Set the customization options for the community widget.','aunt_bertha'),
    'aunt_bertha_section_cb',
    'aunt_bertha'
  );
 
  // register fields in the "aunt_bertha_section" section, inside the "aunt_bertha" page
  add_settings_field(
    'partner_id',
    __( 'Partner ID', 'aunt_bertha' ),
    'partner_id_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'partner_id',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'ref_domain',
    __( 'Referral domain', 'aunt_bertha' ),
    'ref_domain_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'ref_domain',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'search_desc',
    __( 'Search description', 'aunt_bertha' ),
    'search_desc_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'search_desc',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'placeholder_text',
    __( 'Placeholder text', 'aunt_bertha' ),
    'placeholder_text_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'placeholder_text',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'btn_color',
    __( 'Button color', 'aunt_bertha' ),
    'btn_color_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'btn_color',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'btn_text',
    __( 'Button text', 'aunt_bertha' ),
    'btn_text_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'btn_text',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'btn_text_color',
    __( 'Button text color', 'aunt_bertha' ),
    'btn_text_color_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'btn_text_color',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'top_level',
    __( 'Top level category', 'aunt_bertha' ),
    'top_level_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'top_level',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'service_tag',
    __( 'Service tag', 'aunt_bertha' ),
    'service_tag_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'service_tag',
      'class' => 'data_field'
    ]
  );
  add_settings_field(
    'container_css',
    __( 'CSS for container', 'aunt_bertha' ),
    'container_css_cb',
    'aunt_bertha',
    'aunt_bertha_section',
    [
      'label_for' => 'container_css',
      'class' => 'data_field'
    ]
  );
}
 
/**
 * register our wporg_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'aunt_bertha_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function aunt_bertha_section_cb( $args ) {
  ?>
  <style>
  .error-list {color:red;}	
  </style>
  <?php
}
 
// instructions field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function partner_id_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" style="width:200px;" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description" id="partner_id_description">
 <?php esc_html_e('Your partner ID with Aunt Bertha (required). Provided to you by the Aunt Bertha Community Engagement Team to ensure that it is unique.', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function ref_domain_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" style="width:200px;" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description" id="ref_domain_description">
 <?php esc_html_e('Referral domain (required) to identify the source of the search', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function search_desc_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" style="width:500px;" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('Text of the instructions/description line above the search box', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function placeholder_text_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('Set the placeholder text in the zip code entry field', 'aunt_bertha' ); ?>
 </p>
 <?php
} 
function btn_text_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('Text of the search button (default Search)', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function btn_color_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('Color of the search button background (HEX format, e.g. #000000)', 'aunt_bertha' ); ?>
 </p>
 <?php
} 
function btn_text_color_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('Color of the search button text (HEX format, e.g. #000000)', 'aunt_bertha' ); ?>
 </p>
 <?php
} 
function top_level_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['aunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  >
  <option value="none" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'None', 'aunt_bertha' ); ?>
  </option>
  <option value="emergency" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'emergency', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Emergency', 'aunt_bertha' ); ?>
  </option>
  <option value="food" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'food', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Food', 'aunt_bertha' ); ?>
  </option>
  <option value="housing" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'housing', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Housing', 'aunt_bertha' ); ?>
  </option>
  <option value="goods" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'goods', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Goods', 'aunt_bertha' ); ?>
  </option>
  <option value="transit" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'transit', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Transit', 'aunt_bertha' ); ?>
  </option>
  <option value="health" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'health', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Health', 'aunt_bertha' ); ?>
  </option>
  <option value="money" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'money', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Money', 'aunt_bertha' ); ?>
  </option>
  <option value="care" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'care', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Care', 'aunt_bertha' ); ?>
  </option>
  <option value="education" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'education', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Education', 'aunt_bertha' ); ?>
  </option>
  <option value="work" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'work', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Work', 'aunt_bertha' ); ?>
  </option>
  <option value="legal" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'legal', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Legal', 'aunt_bertha' ); ?>
  </option>
 </select>
 <p class="description" id="top_level_description">
 <?php esc_html_e('Optional. Specify a top level category for the initial search results. This parameter must be used in conjunction with the Service tag parameter below, otherwise it will be ignored.', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function service_tag_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="hidden" id="current_service_tag" value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"/>
  <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['aunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  >
  <option value="none" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '', false ) ) : ( '' ); ?>>
  <?php esc_html_e( 'Please select', 'aunt_bertha' ); ?>
  </option>
  </select>
 <p class="description" id="service_tag_description">
 <?php esc_html_e('Optional. Specify a top level category for the initial search results. This parameter must be used in conjunction with the Top level category parameter above, otherwise it will be ignored.', 'aunt_bertha' ); ?>
 </p>
 <?php
}
function container_css_cb( $args ) {
  $options = get_option('aunt_bertha_settings');
  ?>
  <input type="text" style="width:500px;" id="<?php echo esc_attr( $args['label_for'] ); ?>"
  data-custom="<?php echo esc_attr( $args['auunt_bertha_custom_data'] ); ?>"
  name="aunt_bertha_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
  value="<?php if (isset($options[$args['label_for']])) echo $options[$args['label_for']]; ?>"
  />
 <p class="description">
 <?php esc_html_e('CSS for customizing the widget container to the widget container', 'aunt_bertha' ); ?>
 </p>
 <?php
} 
/**
 * top level menu
 */
function aunt_bertha_settings_page() {
 // add top level menu page
 add_menu_page(
 'Aunt Bertha Settings',
 'Aunt Bertha',
 'manage_options',
 'aunt_bertha',
 'aunt_bertha_options_page_html'
 );
}
 
/**
 * register our settings page to the admin_menu action hook
 */
add_action( 'admin_menu', 'aunt_bertha_settings_page' );
 
/**
 * top level menu:
 * callback functions
 */
function aunt_bertha_options_page_html() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }
 
  // add error/update messages
 
  // check if the user have submitted the settings
  // wordpress will add the "settings-updated" $_GET parameter to the url
  if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'aunt_bertha_messages', 'aunt_bertha_message', __( 'Settings Saved', 'aunt_bertha' ), 'updated' );
  }
 
 // show error/update messages
 settings_errors( 'aunt_bertha_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post" id="ab_settings_form">
 <?php
 // output security fields for the registered setting "wporg"
 settings_fields('aunt_bertha');
 // output setting sections and their fields
 // (sections are registered for "wporg", each field is registered to a specific section)
 do_settings_sections('aunt_bertha');
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
 // load the javascript for the settings page
 wp_enqueue_script('ab_settings', plugins_url('/js/settings_page.js', __FILE__) );
}

// Creating the widget 
class auntbertha_widget extends WP_Widget {
  function __construct() {
    parent::__construct(
      // Base ID of your widget
      'auntbertha_widget', 
 
      // Widget name will appear in UI
      __('Aunt Bertha Widget', 'auntbertha_widget_domain'), 
 
      // Widget description
      array( 'description' => __( 'Search for resources on AuntBertha.Com', 'auntbertha_widget_domain' ), ) 
    );
  }

  // Creating widget front-end
 
  public function widget( $args, $instance ) {
    $settings = get_option('aunt_bertha_settings');
    if ($settings['search_desc']) $search_desc = $settings['search_desc']; else $search_desc = "Need help? Search free and reduced cost services like medical care, food, housing, and more in your area.";
    if ($settings['placeholder_text']) $placeholder = $settings['placeholder_text']; else $placeholder = "Enter your zip code";
    $ref_domain = $settings['ref_domain'];
    $partner_id = $settings['partner_id'];
    if ($settings['top_level']) $top_level = $settings['top_level']; else $top_level = "";
    if ($settings['service_tag']) $service_tag = $settings['service_tag']; else $service_tag = "";
    $lang = "es";
    if ($settings['btn_color']) $btn_color = $settings['btn_color']; else $btn_color = null;
    if ($settings['btn_text_color']) $btn_text_color = $settings['btn_text_color']; else $btn_text_color = null;
    $btn_style = "";
    if ($btn_color) $btn_style.= "background-color:".$btn_color.";";
    if ($btn_color) $btn_style.= "color:".$btn_text_color.";"; 
    if ($settings['btn_text']) $btn_text = $settings['btn_text']; else $btn_text = "Search";
    if ($settings['container_css']) $container_css = $settings['container_css']; else $container_css = "";
 
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if (!empty($title)) echo $args['before_title'].$title.$args['after_title'];
 
    // This script contains the html and javascript of the widget
    require_once "ab_widget.php";
    echo $ab_widget_html;

    echo $args['after_widget'];
  }
} // Class auntbertha_widget ends here  