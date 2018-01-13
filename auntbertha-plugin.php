<?php
/*
Plugin Name: Aunt Bertha
Description: Search auntbertha.com
*/
// Register and load the widget
function auntbertha_load_widget() {
    register_widget( 'auntbertha_widget' );
}
add_action( 'widgets_init', 'auntbertha_load_widget' );
 
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
$title = apply_filters( 'widget_title', $instance['title'] );
$instructions = apply_filters( 'widget_instructions', $instance['instructions'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
require_once "ab_widget.php";
echo $ab_widget_html;

echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'auntbertha_widget_domain' );
}
if ( isset( $instance[ 'instructions' ] ) ) {
$instructions = $instance[ 'instructions' ];
}
else {
$instructions = __( 'Find food, health, housing and employment programs in seconds.', 'auntbertha_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'instructions' ); ?>"><?php _e( 'Instructions:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'instructions' ); ?>" name="<?php echo $this->get_field_name( 'instructions' ); ?>" type="text" value="<?php echo esc_attr( $instructions ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['instructions'] = ( ! empty( $new_instance['instructions'] ) ) ? strip_tags( $new_instance['instructions'] ) : '';
return $instance;
}
} // Class auntbertha_widget ends here
?>