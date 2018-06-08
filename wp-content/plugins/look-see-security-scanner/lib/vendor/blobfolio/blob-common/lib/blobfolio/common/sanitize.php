<?php
 namespace blobfolio\wp\looksee\vendor\common; class sanitize { public static function accents($str='') { ref\sanitize::accents($str); return $str; } public static function attribute_value($str='') { ref\sanitize::attribute_value($str); return $str; } public static function ca_postal_code($str='') { ref\sanitize::ca_postal_code($str); return $str; } public static function cc($ccnum='') { ref\sanitize::cc($ccnum); return $ccnum; } public static function control_characters($str='') { ref\sanitize::control_characters($str); return $str; } public static function country($str='') { ref\sanitize::country($str); return $str; } public static function csv($str='') { ref\sanitize::csv($str); return $str; } public static function datetime($str='') { ref\sanitize::datetime($str); return $str; } public static function date($str='') { ref\sanitize::date($str); return $str; } public static function domain($str='', $unicode=false) { ref\sanitize::domain($str, $unicode); return $str; } public static function ean($str, $formatted=false) { ref\sanitize::ean($str, $formatted); return $str; } public static function email($str=null) { ref\sanitize::email($str); return $str; } public static function file_extension($str='') { ref\sanitize::file_extension($str); return $str; } public static function html($str=null) { ref\sanitize::html($str); return $str; } public static function hostname($domain, $www=false, $unicode=false) { ref\sanitize::hostname($domain, $www, $unicode); return $domain; } public static function ip($str='', $restricted=false, $condense=true) { ref\sanitize::ip($str, $restricted, $condense); return $str; } public static function iri_value($str='', $protocols=null, $domains=null) { ref\sanitize::iri_value($str, $protocols, $domains); return $str; } public static function isbn($str) { ref\sanitize::isbn($str); return $str; } public static function js($str='', $quote="'") { ref\sanitize::js($str, $quote); return $str; } public static function mime($str='') { ref\sanitize::mime($str); return $str; } public static function name($str='') { ref\sanitize::name($str); return $str; } public static function password($str='') { ref\sanitize::password($str); return $str; } public static function printable($str='') { ref\sanitize::printable($str); return $str; } public static function province($str='') { ref\sanitize::province($str); return $str; } public static function quotes($str='') { ref\sanitize::quotes($str); return $str; } public static function state($str='') { ref\sanitize::state($str); return $str; } public static function au_state($str='') { ref\sanitize::au_state($str); return $str; } public static function svg($str='', $tags=null, $attr=null, $protocols=null, $domains=null) { ref\sanitize::svg($str, $tags, $attr, $protocols, $domains); return $str; } public static function timezone($str='') { ref\sanitize::timezone($str); return $str; } public static function to_range($value, $min=null, $max=null) { ref\sanitize::to_range($value, $min, $max); return $value; } public static function upc($str, $formatted=false) { ref\sanitize::upc($str, $formatted); return $str; } public static function url($str='') { ref\sanitize::url($str); return $str; } public static function utf8($str='') { ref\sanitize::utf8($str); return $str; } public static function whitespace($str='', $newlines=0) { ref\sanitize::whitespace($str, $newlines); return $str; } public static function whitespace_multiline($str='', $newlines=1) { ref\sanitize::whitespace_multiline($str, $newlines); return $str; } public static function zip5($str='') { ref\sanitize::zip5($str); return $str; } } 