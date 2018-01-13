Group Project 
=============

The project aims to respond to assigned articles through the medium of blog responses. These blog responses are stored in mardown files and autoloaded into an html template using a php bootstrap file.

### The following is the code for the Blog Post bootstrap:
The bootstrap searches the md directory (the directory containing the mardown files) and stores the files it finds in the array $posts. Next a foreach loop iterates through the array. Each file name in $posts is checked against preg_match to ensure that the file is a .md file. If the file name passes the contents are loaded into the variable $md which is then parsed using in anstance of the ParseDown() class.

```
<?php 
	$parser = new Parsedown();
	$posts = scandir("md/");
	foreach ($posts as $p) {
		if (preg_match('/^.+\.(md)$/',$p)) {
			$md = file_get_contents('md/' . $p);
			$md = $parser->text($md);
			echo "\n";
			echo "<!--BLOG-POST-->\n";
			echo "<div id='blog-post'>\n";
			echo $md . "\n";
			echo "</div>\n";
		}
	}
	echo "\n";
 ?>
```
