PHP SmartyPants
===============

PHP SmartyPants Lib 1.6.0-beta1 - Sun 23 Jan 2013

by Michel Fortin  
<https://michelf.ca/>

Original SmartyPants by John Gruber  
<https://daringfireball.net/>


Introduction
------------

This is a library package that includes the PHP SmartyPants and its
sibling PHP SmartyPants Typographer with additional features.

SmartyPants is a free web typography prettifyier tool for web writers. It
easily translates plain ASCII punctuation characters into "smart" typographic 
punctuation HTML entities.

PHP SmartyPants is a port to PHP of the original SmartyPants written 
in Perl by John Gruber.

SmartyPants can perform the following transformations:

*   Straight quotes (`"` and `'`) into “curly” quote HTML entities
*   Backtick-style quotes (` ``like this'' `) into “curly” quote HTML
    entities
*   Dashes (`--` and `---`) into en- and em-dash entities
*   Three consecutive dots (`...`) into an ellipsis entity

SmartyPants Typographer can perform additional transformations:

*	French guillements done using (`<<` and `>>`) into true « guillemets »
	HTML entities.
*	Comma-style quotes (` ,,like this`` ` or ` ''like this,, `) into their 
	curly equivalent.
*	Replace existing spaces with non-break spaces around punctuation marks 
	where appropriate, can also add or remove them if configured to.
*	Replace existing spaces with non-break spaces for spaces used as 
	a thousand separator and between a number and the unit symbol that 
	follows it (for most common units).

This means you can write, edit, and save using plain old ASCII straight 
quotes, plain dashes, and plain dots, but your published posts (and 
final HTML output) will appear with smart quotes, em-dashes, proper
ellipses, and proper no-break spaces (with Typographer).

SmartyPants does not modify characters within `<pre>`, `<code>`,
`<kbd>`, or `<script>` tag blocks. Typically, these tags are used to
display text where smart quotes and other "smart punctuation" would not
be appropriate, such as source code or example markup.


### Backslash Escapes ###

If you need to use literal straight quotes (or plain hyphens and
periods), SmartyPants accepts the following backslash escape sequences
to force non-smart punctuation. It does so by transforming the escape
sequence into a decimal-encoded HTML entity:


    Escape  Value  Character
    ------  -----  ---------
      \\    &#92;    \
      \"    &#34;    "
      \'    &#39;    '
      \.    &#46;    .
      \-    &#45;    -
      \`    &#96;    `


This is useful, for example, when you want to use straight quotes as
foot and inch marks:

    6\'2\" tall

translates into:

    6&#39;2&#34; tall

in SmartyPants's HTML output. Which, when rendered by a web browser,
looks like:

    6'2" tall


Requirements
------------

This library package requires PHP 5.3 or later.

Note: The older plugin/library hybrid package for PHP SmartyPants and
PHP SmartyPants Typographer is still will work with PHP 4.0.5 and later.


Usage
-----

This library package is meant to be used with class autoloading. For autoloading 
to work, your project needs have setup a PSR-0-compatible autoloader. See the 
included Readme.php file for a minimal autoloader setup. (If you don't want to 
use autoloading you can do a classic `require_once` to manually include the 
files prior use instead.)

With class autoloading in place, putting the 'Michelf' folder in your 
include path should be enough for this to work:

	use \Michelf\SmartyPants;
	$html_output = SmartyPants::defaultTransform($html_input);

SmartyPants Typographer is also available the same way:

	use \Michelf\SmartyPantsTypographer;
	$html_output = SmartyPantsTypographer::defaultTransform($html_input);

If you are using PHP SmartyPants with another text filter function that 
generates HTML such as Markdown, you should filter the text *after* the 
the HTML-generating filter. This is an example with [PHP Markdown][pmd]:

	use \Michelf\Markdown, \Michelf\SmartyPants;
	$my_html = Markdown::defaultTransform($my_text);
	$my_html = SmartyPants::defaultTransform($my_html);

To learn more about configuration options, see the full list of
[configuration variables].

 [configuration variables]: https://michelf.ca/projects/php-smartypants/configuration/
 [pmd]: https://michelf.ca/projects/php-markdown/


### Usage Without an Autoloader ###

If you cannot use class autoloading, you can still use include or require to 
access the parser. To load the \Michelf\SmartyPants parser, do it this way:

	require_once 'Michelf/SmartyPants.inc.php';
	
Or, if you need the \Michelf\SmartyPantsTypographer parser:

	require_once 'Michelf/SmartyPantsTypographer.inc.php';

While the plain `.php` files depend on autoloading to work correctly, using the 
`.inc.php` files instead will eagerly load the dependencies that would be loaded 
on demand if you were using autoloading.


Algorithmic Shortcomings
------------------------

One situation in which quotes will get curled the wrong way is when
apostrophes are used at the start of leading contractions. For example:

    'Twas the night before Christmas.

In the case above, SmartyPants will turn the apostrophe into an opening
single-quote, when in fact it should be a closing one. I don't think
this problem can be solved in the general case -- every word processor
I've tried gets this wrong as well. In such cases, it's best to use the
proper HTML entity for closing single-quotes (`&#8217;` or `&rsquo;`) by
hand.


Bugs
----

To file bug reports or feature requests (other than topics listed in the
Caveats section above) please send email to:

<michel.fortin@michelf.ca>

If the bug involves quotes being curled the wrong way, please send
example text to illustrate.


Version History
---------------

PHP SmartyPants Lib 1.6.0-beta1 (23 Jan 2013)

Typographer 1.0.1 (23 Jan 2013)

1.5.1f (23 Jan 2013):

*	Fixed handling of HTML comments to match latest HTML specs instead of
	doing it the old SGML way.

*	Lowered WordPress filtering priority to avoid clashing with the 
	[caption] tag filter. Thanks to Mehdi Kabab for the fix.


Typographer 1.0 (28 Jun 2006)

*   First public release of PHP SmartyPants Typographer.


1.5.1oo (19 May 2006, unreleased)

*   Converted SmartyPants to a object-oriented design.


1.5.1e (9 Dec 2005)

*	Corrected a bug that prevented special characters from being 
    escaped.


1.5.1d (6 Jun 2005)

*	Correct a small bug in `_TokenizeHTML` where a Doctype declaration
	was not seen as HTML, making curly quotes inside it.


1.5.1c (13 Dec 2004)

*	Changed a regular expression in `_TokenizeHTML` that could lead
	to a segmentation fault with PHP 4.3.8 on Linux.


1.5.1b (6 Sep 2004)

*	Corrected a problem with quotes immediately following a dash
	with no space between: `Text--"quoted text"--text.`
	
*	PHP SmartyPants can now be used as a modifier by the Smarty 
	template engine. Rename the file to "modifier.smartypants.php"
	and put it in your smarty plugins folder.

*	Replaced a lot of spaces characters by tabs, saving about 4 KB.


1.5.1a (30 Jun 2004)

*	PHP Markdown and PHP Smartypants now share the same `_TokenizeHTML` 
	function when loaded simultanously.

*	Changed the internals of `_TokenizeHTML` to lower the PHP version
	requirement to PHP 4.0.5.


1.5.1 (6 Jun 2004)

*	Initial release of PHP SmartyPants, based on version 1.5.1 of the 
	original SmartyPants written in Perl.


Copyright and License
---------------------

Copyright (c) 2005-2016 Michel Fortin  
<https://michelf.ca/>
All rights reserved.

Copyright (c) 2003-2004 John Gruber
<https://daringfireball.net/>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

*   Redistributions of source code must retain the above copyright notice,
    this list of conditions and the following disclaimer.

*   Redistributions in binary form must reproduce the above copyright
    notice, this list of conditions and the following disclaimer in the
    documentation and/or other materials provided with the distribution.

*   Neither the name "SmartyPants" nor the names of its contributors may
    be used to endorse or promote products derived from this software
    without specific prior written permission.
