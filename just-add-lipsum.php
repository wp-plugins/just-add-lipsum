<?php
/*
Plugin Name: Just Add Lipsum
Plugin URI: http://teknogenik.com/just-add-lipsum
Description: Adds a shortcode which you can use to insert an arbitrary amount of Lorem Ipsum anywhere in your content. Inspired by the Dummy Lipsum plugin for Firefox: https://addons.mozilla.org/en-US/firefox/addon/2064/
Version: 0.1
Author: Eugene Brodsky
Author URI: http://teknogenik.com

This program is free software; you can redistribute it and/or
modify it under the terms of version 2 of the GNU General Public
License as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details, available at
http://www.gnu.org/copyleft/gpl.html
or by writing to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$lipsum = explode(' ', "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.");




// Isage: [lorem-ipsum p=2 wmin=60 punc=true]
function lipsum_handler($atts) {
  
  global $lipsum;
  
  $randomize_paragraph_length = true; //implement these later on admin page
  $randomize_start = true;

  //set defaults
  $loops = 2;         //How many paragraphs
  $wmin = 60;     //Min words per paragraph
  $punc = true;   //Allow punctuation? (Not yet implemented)

	extract(shortcode_atts(array(
		'p' => $loops,
		'wmin' => $wmin,
		'punc' => $punc,
	), $atts));
  
  //Start constructing content
  $c = "";
  
  for ($j=0; $j<=$loops; $j++){
      
    //Start constructing paragraph text
    if ($randomize_paragraph_length) {
      $loop_wmin = $wmin + rand(0, $wmin/3);
    } elseif (!$loop_wmin) {
      $loop_wmin = $wmin;
    }
    
    if($randomize_start) {
      $start = rand(0, $wmin);
    }

    $p = "";
  
    for ($i=$start; $i <= $loop_wmin+$start && $i < sizeof($lipsum); $i++) {
      $p .= $lipsum[$i] . " ";
    }
    
    $p = ucfirst(rtrim($p)); //Capitalize first char and remove space from end
    
    if (substr($p, -1) != ".") $p .= "."; // Put a period at the end
    
    $c .= "<p>" . $p . "</p>"; // enclose in a paragraph
  }
	return $c;
}
add_shortcode('lorem-ipsum', 'lipsum_handler');


?>