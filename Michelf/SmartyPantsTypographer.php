<?php
#
# SmartyPants Typographer  -  Smart typography for web sites
#
# PHP SmartyPants & Typographer  
# Copyright (c) 2004-2013 Michel Fortin
# <http://michelf.ca/>
#
# Original SmartyPants
# Copyright (c) 2003-2004 John Gruber
# <http://daringfireball.net/>
#
namespace Michelf;


# Just force Michelf/SmartyPants.php to load. This is needed to load
# the temporary implementation class. See below for details.
\Michelf\SmartyPants::SMARTYPANTSLIB_VERSION;


#
# SmartyPants Typographer Parser Class
#
# Note: Currently the implementation resides in the temporary class
# \Michelf\_SmartyPantsTypographer_TmpImpl (in the same file as
# \Michelf\SmartyPants). This makes it easier to propagate the changes between
# the three different packaging styles of PHP SmartyPants. Once this issue is
# resolved, the _SmartyPantsTypographer_TmpImpl class will disappear and this
# one will contain the code.
#
use \Michelf\SmartyPants;

class SmartyPantsTypographer extends \Michelf\_SmartyPantsTypographer_TmpImpl {

	### Parser Implementation ###

	# Temporarily, the implemenation is in the _SmartyPantsTypographer_TmpImpl
	# class. See note above.

}
