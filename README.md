Mockdown
========

By Sam Minnée

Mockdown is an ASCII-art HTML UI mockup language, inspired by Markdown.

It's licensed under the BSD license.

Syntax
------

Mockdown supports the following field types.  Each of the fields can be placed anywhere
in your document.  Mockdown assumes that you have aligned fields in your document with
a fixed-width font, a la ASCII-art.

### Checkboxes

    [ ] A
    [x] B
    [ ] C

### Radio buttons

    ( ) A
    (o) B
    ( ) C

### Text boxes

	Enter your date of birth in three annoying boxes [__]/[__]/[____]

	This is a longer text box with a default [Value_________]
	
### Textareas

	Do not write in this space:

	[______________]
	[______________]
	[______________]
	[______________]
	
### Buttons

	[ Save changes ]
	
Development / Testing
---------------------

To run Mockdown's test suite, just use the phpunit command-line tool:

	> phpunit
	
You will need to install phpunit from Phing.

[Travis-CI](http://travis-ci.org) is used for continuous integration; current status is:

[![Build Status](https://secure.travis-ci.org/sminnee/mockdown.png)](http://travis-ci.org/sminnee/mockdown)

Travis-CI is also being used to test all pull requests, so please, feel free to submit pull requests.
