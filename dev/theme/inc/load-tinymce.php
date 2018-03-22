<?php


// autoriser certaines balises sans que TinyMCE les enlève automatiquement,
function myextensionTinyMCE($init) {
  // Command separated string of extended elements
  $ext = 'a[accesskey|charset|class|contenteditable|contextmenu|coords|dir|download|draggable|dropzone|hidden|href|hreflang|id|lang|media|name|rel|rev|shape|spellcheck|style|tabindex|target|title|translate|type|onclick|onfocus|onblur]';
  // Add to extended_valid_elements if it alreay exists
  if ( isset( $init['extended_valid_elements'] ) ) {
  $init['extended_valid_elements'] .= ',' . $ext;
  } else {
  $init['extended_valid_elements'] = $ext;
  }
  // Super important: return $init!
  return $init;
}
add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );

function override_mce_options($initArray) {
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');




function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


global $global_variable_1, $global_variable_2, $global_variable_3;
$global_variable_1 = 'formatselect, bold, italic, underline, alignleft, aligncenter, alignright, alignjustify, link, unlink, wp_adv';
$global_variable_2 = 'styleselect, bullist, numlist, blockquote,forecolor, backcolor, outdent, indent, insert, wp_help';
$global_variable_3 = 'bold, italic, underline, alignleft, aligncenter, alignright, alignjustify, forecolor';


function custom_mce( $in ) {
    global $global_variable_1, $global_variable_2;

    $in['content_css'] = get_template_directory_uri() . "/editor-style.css";

    $in['formats'] = "{
            alignleft: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'text-left'},
            aligncenter: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'text-center'},
            alignright: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'text-right'},
            alignjustify: {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'text-justify'},
            bold: {inline : 'strong' },
            italic: {inline : 'em'},
            underline: {inline : 'u'},
            strikethrough : {inline : 'del'}
            }";

    $style_formats = array(
        array( 'title' => 'Test', 'classes' => 'test' ),
        array(
            'title' => 'Button',
            'items' => array(
                array(
                    'title' => 'Rose',
                    'selector' => 'a',
                    'classes' => 'button button-rose'
                ),
                array(
                    'title' => 'Orange',
                    'selector' => 'a',
                    'classes' => 'button button-orange'
                ),
                array(
                    'title' => 'Peach',
                    'selector' => 'a',
                    'classes' => 'button button-peach'
                ),
                array(
                    'title' => 'Grey',
                    'selector' => 'a',
                    'classes' => 'button button-grey'
                ),
            ),
        )
    );

    // Insert the array, JSON ENCODED, into 'style_formats'
    $in['style_formats'] = json_encode( $style_formats );

    $in['block_formats'] = 'Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Paragraph=p;';

//	$in['plugins'] = 'charmap, colorpicker, compat3x, directionality, fullscreen, hr, image, lists, media, paste, tabfocus, table, textcolor, wordpress, wpautoresize, wpdialogs, wpeditimage, wpemoji, wpgallery, wplink, wptextpattern, wpview';
	$in['plugins'] = 'charmap, colorpicker, compat3x, directionality, fullscreen, hr, image, lists, media, paste, tabfocus, textcolor, wordpress, wpautoresize, wpdialogs, wpeditimage, wpemoji, wpgallery, wplink, wptextpattern, wpview';

	$in['toolbar1'] = $global_variable_1;
	$in['toolbar2'] = $global_variable_2;

	$in['content_css'] = get_template_directory_uri() . "/assets/css/editor-style.css";
    return $in;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'custom_mce' );


function my_toolbars( $toolbars ) {
    global $global_variable_1, $global_variable_2, $global_variable_3;

	$toolbars['Full'] = array();
	$toolbars['Full'][1] = explode(',', $global_variable_1);
	$toolbars['Full'][2] = explode(',', $global_variable_2);

	$toolbars['Basic'] = array();
	$toolbars['Basic'][1] = explode(',', $global_variable_3);
//	$toolbars['Basic'][2] = explode(',', $global_variable_2);

	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars' , 'my_toolbars');
