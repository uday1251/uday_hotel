require get_template_directory() . '/custom-modules/filename

filename.php
add_action('init', 'custom_rewrite_rule_surgical_prodecure_thankyou', 10, 0);
function custom_rewrite_rule_surgical_prodecure_thankyou() {
    add_rewrite_rule('^book-surgical-consult/([^/]*)/([^/]*)/([^/]*)/([^/]*)/?$','index.php?surgical_city=$matches[1]&surgical_speciality=$matches[2]&surgical_procedure=$matches[3]&surgical_thankyou=$matches[4]','top');

}


add_action('init', 'custom_rewrite_rule_surgical_prodecure_info', 10, 0);
function custom_rewrite_rule_surgical_prodecure_info() {
    add_rewrite_rule('^book-surgical-consult/([^/]*)/([^/]*)/?$','index.php?surgical_speciality=$matches[1]&surgical_procedure=$matches[2]','top');

}


add_filter( 'query_vars', function( $query_vars ) { 
	$query_vars[] = 'surgical_city';
    $query_vars[] = 'surgical_procedure';
    $query_vars[] = 'surgical_speciality';
    $query_vars[] = 'surgical_thankyou';
   
    return $query_vars;
} );

add_action( 'template_include', function( $template ) {


    if ( get_query_var( 'surgical_thankyou' ) == false || get_query_var( 'surgical_thankyou' ) == '' ) {
    	//$val = get_query_var( 'profile_speciality' );
    	//var_dump($val);
      return $template;
   }
 
    return get_template_directory() . '/page-surgical-procedure-thankyou.php';
} );

add_action( 'template_include', function( $template ) {


    if ( get_query_var( 'surgical_procedure' ) == false || get_query_var( 'surgical_procedure' ) == '' ) {
    	//$val = get_query_var( 'profile_speciality' );
    	//var_dump($val);
      return $template;
   }
 
    return get_template_directory() . '/page-surgical-procedure-info.php';
} );
