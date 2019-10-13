<?php 

$str = "The PHP Manual is available online in a selection of languages. Please pick a language from the list below. More information about php.net URL shortcuts by visiting our URL howto page. Note, that many languages are just under translation, and the untranslated parts are still in English. Also some translated parts might be outdated. The translation teams are open to contributions. PHP, which stands for 'PHP: Hypertext Preprocessor' is a widely-used Open Source general-purpose scripting language that is especially suited for web development and can be embedded into HTML. Its syntax draws upon C, Java, and Perl, and is easy to learn. The main goal of the language is to allow web developers to write dynamically generated web pages quickly, but you can do much more with PHP.";


$pos = 0;
while ($pos < (strlen($str) - 80)) {
	$pos +=80;
	while ($str[$pos] != ' ') {
		$pos -= 1;
	}
	$str = substr_replace($str, '<br>', $pos, 0);
}
echo $str;



?>