<?php
/* Smarty version 3.1.33, created on 2025-03-29 19:26:24
  from 'C:\xampp\htdocs\blog\app\views\GlownaBlog_zawartosc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e83b503b74a2_68478415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8439bbaefd01434f7d67284e50bc19b2a7ef705' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\GlownaBlog_zawartosc.tpl',
      1 => 1743272740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e83b503b74a2_68478415 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\blog\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
        <!-- Featured Post -->
                <article class="post featured">
                        <header class="major">
                                <span class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['wpis']->value[0]["data_publikacji"]);?>
</span>
                                <h2><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["id"];?>
"><?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["tytul"];?>
</a></h2>
                                <p><?php $_smarty_tpl->_assignInScope('teststring', $_smarty_tpl->tpl_vars['wpis']->value[0]["tresc_artykulu"]);?>
                                    <?php $_smarty_tpl->_assignInScope('testsplit', explode("$",$_smarty_tpl->tpl_vars['teststring']->value));?>
                                    <?php echo $_smarty_tpl->tpl_vars['testsplit']->value[0];?>

                                </p>
                        </header>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["id"];?>
" class="image main">
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 1) {?>
                            <img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 2) {?>
                            <img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 3) {?>
                            <img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></a>
                            <?php }?> 
                        <ul class="actions special">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["id"];?>
" class="button large">Rozwiń</a></li>
                        </ul>
                </article>

        <!-- Posts -->
                <section class="posts">
                    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wpis']->value, 'art');
$_smarty_tpl->tpl_vars['art']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->index++;
$__foreach_art_0_saved = $_smarty_tpl->tpl_vars['art'];
?>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['ileArt']->value;
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['art']->index < $_prefixVariable1 && $_smarty_tpl->tpl_vars['art']->index > 0) {?>
                        <article>
                                <header>
                                        <span class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['art']->value["data_publikacji"]);?>
</span>
                                        <h2><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['art']->value["id"];?>
"><?php echo $_smarty_tpl->tpl_vars['art']->value["tytul"];?>
</a></h2>
                                </header>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['art']->value["id"];?>
" class="image fit">
                                <?php if ($_smarty_tpl->tpl_vars['kat']->value[$_smarty_tpl->tpl_vars['art']->index]["kategorie_artykuly_id"] == 1) {?>
                                <img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['kat']->value[$_smarty_tpl->tpl_vars['art']->index]["kategorie_artykuly_id"] == 2) {?>
                                <img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['kat']->value[$_smarty_tpl->tpl_vars['art']->index]["kategorie_artykuly_id"] == 3) {?>
                                <img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></a>
                                <?php }?> 
                                <p><?php $_smarty_tpl->_assignInScope('teststring', $_smarty_tpl->tpl_vars['art']->value["tresc_artykulu"]);?>
                                    <?php $_smarty_tpl->_assignInScope('testsplit', explode("$",$_smarty_tpl->tpl_vars['teststring']->value));?>
                                    <?php echo $_smarty_tpl->tpl_vars['testsplit']->value[0];?>

                                </p>
                                <ul class="actions special">
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pelnaStrona/<?php echo $_smarty_tpl->tpl_vars['art']->value["id"];?>
" class="button">Rozwiń</a></li>
                                </ul>
                        </article>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['art'] = $__foreach_art_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>            
                       
                </section>

        <!-- Footer -->
                <footer>
                        <div class="pagination">
                                <!--<a href="#" class="previous">Prev</a>-->
                                <a <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?> href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glowna?tytul=<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" <?php }?> class="previous" >poprzednia</a>
                                <a class="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['ileStron']->value;?>
</a>
                                <a <?php if ($_smarty_tpl->tpl_vars['ileStron']->value > $_smarty_tpl->tpl_vars['page']->value) {?> href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glowna?tytul=<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" <?php }?> class="next">następna</a>
                        </div>
                </footer>
<?php }
}
