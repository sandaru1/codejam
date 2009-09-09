<?php
  if ($_SERVER['HTTP_HOST']=='localhost') {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
</head>

<body>
<?php echo $sf_content ?>
</body>
</html>
<?php
  } else {
?>
<fb:header>Codejam</fb:header>
<fb:tabs>  
  <fb:tab-item href='http://apps.facebook.com/thecodejam/' title='Dashboard'/>
  <fb:tab-item href='http://apps.facebook.com/thecodejam/round/invite?first=true' title='Invite' />
</fb:tabs>
<p/>
<?php echo $sf_content ?>
<p/>
<i>this application is continuously improving. at least we hope so :) Developed by <a href="http://www.facebook.com/jayasiri">vpj</a> & <a href="http://www.facebook.com/sandaruwan">sandaru1</a></i>
<?php
  }
?>


