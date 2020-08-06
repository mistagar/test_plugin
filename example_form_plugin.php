<?php
/**
*Plugin Name: Example Form Plugin
*/

function example_form_plugin(){
	$content = '';
	$content .= '<h2> Contact Us </h2>';
	$content .= '<form method="post" action="http://localhost/wordpress/2020/08/06/thank-you/" >';
	$content .='<label for ="your_name"> Name </label>';
	$content .='<input type="text" name="your_name" class="form-contorl" placeholder = "Enter your name">';

	$content .= '<label for = "your_email"> Email </label>';
	$content .= '<input type="email" name="your_email" class="form-contorl" placeholder = "Enter your mail">';

	$content .='<label for="your_comments">Questions and Comments</label>';
	$content .='<textarea name="your_comments" class ="form-control" placeholder="Enter your questions or comments"></textarea>';

	$content .= '<br /><input type="submit" name="example_form_submit" class="form-control"  value = "SEND YOUR INFORMATION">';
	$content .= '</form>';



	return $content;
}

add_shortcode('example_form', 'example_form_plugin');

function example_form_capture(){
	if(isset($_POST['example_form_submit'])){
		$name = sanitize_text_field($_POST['your_name']);
		$name = sanitize_text_field($_POST['your_email']);
		$comments = sanitize_textarea_field($_POST['your_comments']);

		$to = 'gar.shalom1@gmail.com';
		$subject = 'Test form submission';
		$message = ''.$name.' - '.$email. ' - '. $comments;

		wp_mail($to, $subject, $message);
	}
}
add_action('wp_head', 'example_form_capture');

?>