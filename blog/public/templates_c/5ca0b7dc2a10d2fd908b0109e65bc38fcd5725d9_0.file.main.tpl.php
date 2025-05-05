<?php
/* Smarty version 3.1.33, created on 2025-03-29 20:48:00
  from 'C:\xampp\htdocs\blog\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e84e702b4aa2_26713128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ca0b7dc2a10d2fd908b0109e65bc38fcd5725d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\templates\\main.tpl',
      1 => 1743277649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e84e702b4aa2_26713128 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
            <title>O naukach ścisłych</title>
            <meta name="description" content="Dociekliwe umysły - blog" />
            <link rel="shortcut icon" href="http://localhost/blog/public/images/44.png" /> 
            
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="http://localhost/blog/public/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="http://localhost/blog/public/assets/css/noscript.css" /></noscript>
	</head>

        
	<body class="is-preload">
            
            

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
                                                 
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_149982896067e84e702a8e90_64971408', 'intro');
?>


    <!-- Header -->
        <header id="header">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
blog" class="logo"><img src="http://localhost/blog/public/images/44.png">O naukach ścisłych</a>

        </header>
               
               
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163305734067e84e702b3356_78496135', 'content');
?>


				<!-- Footer -->
					<footer id="footer">
						<section>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Imię</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Wiadomość </label>
										<textarea name="message" id="message" placeholder="Jesteśmy ciekawi jak oceniasz nasz blog :)" rows="3"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Wyślij wiadomość" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section>
								<h3>Email</h3>
								<p><a href="#">Onaukachscisłych@gmail.com</a></p>
							</section>
                                                        <section>
								<h3>Polecamy</h3>
								<p><a href="#">www.xxx.pl</a></p>
							</section>
			
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>Dorota Bober</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="http://localhost/blog/public/assets/js/main.js"><?php echo '</script'; ?>
>
                        <?php echo '<script'; ?>
 type="text/javascript" src="http://localhost/blog/public/assets/js/functions.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'intro'} */
class Block_149982896067e84e702a8e90_64971408 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_149982896067e84e702a8e90_64971408',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'intro'} */
/* {block 'content'} */
class Block_163305734067e84e702b3356_78496135 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_163305734067e84e702b3356_78496135',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'content'} */
}
