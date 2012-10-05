<?php
#
# SmartyPants Typographer  -  Smart typography for web sites
#
# PHP SmartyPants & Typographer  
# Copyright (c) 2004-2006 Michel Fortin
# <http://www.michelf.com/>
#
# Original SmartyPants
# Copyright (c) 2003-2004 John Gruber
# <http://daringfireball.net/>
#
namespace michelf;


#
# SmartyPants Typographer Parser Class
#
# Note: Currently the implementation resides in the temporary class
# \michelf\_SmartyPantsTypographer_TmpImpl (in the same file as
# \michelf\SmartyPants). This makes it easier to propagate the changes between
# the three different packaging styles of PHP Markdown. Once this issue is
# resolved, the _SmartyPantsTypographer_TmpImpl class will disappear and this
# one will contain the code.
#
use \michelf\SmartyPants;

class SmartyPantsTypographer extends \michelf\_SmartyPantsTypographer_TmpImpl {

	### Version ###

	const  SMARTYPANTSTYPOGRAPHER_VERSION  = \michelf\SMARTYPANTSTYPOGRAPHER_VERSION;

	### Parser Implementation ###

	# Temporarily, the implemenation is in the _SmartyPantsTypographer_TmpImpl
	# class. See note above.

}

?>