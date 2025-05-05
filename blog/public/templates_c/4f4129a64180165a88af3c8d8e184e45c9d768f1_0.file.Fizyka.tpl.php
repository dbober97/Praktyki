<?php
/* Smarty version 3.1.33, created on 2025-01-17 22:44:30
  from 'C:\xampp\htdocs\blog\app\views\Fizyka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_678acf3eb305c0_12884406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f4129a64180165a88af3c8d8e184e45c9d768f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\Fizyka.tpl',
      1 => 1737150160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678acf3eb305c0_12884406 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_540293779678acf3eaf8835_11717263', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_540293779678acf3eaf8835_11717263 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_540293779678acf3eaf8835_11717263',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li><a href=<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glowna>Strona główna</a></li>
                    <ol>
                           <li class="active"><a class="dropdown-toggle" data-toggle="dropdown" >kategorie</a>
                                <ul>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
matematyka">Matematyka</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
informatyka">Informatyka</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
fizyka">Fizyka</a></li>
                                </ul>
                           </li>
                    </ol> 
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
autorzy">Autorzy</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
kontakt">Kontakt</a></li>
                    <?php if (\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("moderator") || \core\RoleUtils::inRole("czytelnik") || \core\RoleUtils::inRole("autor")) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj się</a></li>
                        <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego: <?php echo \core\SessionUtils::load("login",true);?>
</a>
                                <ul>
                                  <?php if (\core\RoleUtils::inRole("admin")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAdmin">administrator</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("moderator")) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModerator">moderator</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("autor")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAutor">autor</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("czytelnik")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelCzytelnik">czytelnik</a></li> <?php }?>
                                </ul>
                           </li>
                       </ol> 
                        <?php } else { ?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logowanie">Logowanie</a></li>
                    <?php }?>
                </ul>

        </nav>    
<!-- Main -->
<div id="main">

        <!-- Featured Post -->
                <article class="post featured">
                        <header class="major">
                                <span class="date">April 25, 2017</span>
                                <h2><a href="#">And this is a<br />
                                massive headline</a></h2>
                                <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
                                facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
                                amet nullam sed etiam veroeros.</p>
                        </header>
                        <a href="#" class="image main"><img src="http://localhost/blog/public/images/pic01.jpg" alt="" /></a>
                        <ul class="actions special">
                                <li><a href="#" class="button large">Full Story</a></li>
                        </ul>
                </article>

        <!-- Posts -->
                <section class="posts">
                        <article>
                                <header>
                                        <span class="date">April 24, 2017</span>
                                        <h2><a href="#">Sed magna<br />
                                        ipsum faucibus</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic02.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                        <article>
                                <header>
                                        <span class="date">April 22, 2017</span>
                                        <h2><a href="#">Primis eget<br />
                                        imperdiet lorem</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic03.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                        <article>
                                <header>
                                        <span class="date">April 18, 2017</span>
                                        <h2><a href="#">Ante mattis<br />
                                        interdum dolor</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic04.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                        <article>
                                <header>
                                        <span class="date">April 14, 2017</span>
                                        <h2><a href="#">Tempus sed<br />
                                        nulla imperdiet</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic05.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                        <article>
                                <header>
                                        <span class="date">April 11, 2017</span>
                                        <h2><a href="#">Odio magna<br />
                                        sed consectetur</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic06.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                        <article>
                                <header>
                                        <span class="date">April 7, 2017</span>
                                        <h2><a href="#">Augue lorem<br />
                                        primis vestibulum</a></h2>
                                </header>
                                <a href="#" class="image fit"><img src="http://localhost/blog/public/images/pic07.jpg" alt="" /></a>
                                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
                                <ul class="actions special">
                                        <li><a href="#" class="button">Full Story</a></li>
                                </ul>
                        </article>
                </section>

        <!-- Footer -->
                <footer>
                        <div class="pagination">
                                <!--<a href="#" class="previous">Prev</a>-->
                                <a href="#" class="page active">1</a>
                                <a href="#" class="page">2</a>
                                <a href="#" class="page">3</a>
                                <span class="extra">&hellip;</span>
                                <a href="#" class="page">8</a>
                                <a href="#" class="page">9</a>
                                <a href="#" class="page">10</a>
                                <a href="#" class="next">Next</a>
                        </div>
                </footer>

</div>

<?php
}
}
/* {/block 'content'} */
}
