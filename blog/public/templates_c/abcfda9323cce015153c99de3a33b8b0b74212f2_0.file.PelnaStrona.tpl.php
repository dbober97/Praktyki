<?php
/* Smarty version 3.1.33, created on 2025-01-31 17:05:59
  from 'C:\xampp\htdocs\blog\app\views\PelnaStrona.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_679cf4e7f311a9_23724105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abcfda9323cce015153c99de3a33b8b0b74212f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PelnaStrona.tpl',
      1 => 1738339558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679cf4e7f311a9_23724105 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1372713121679cf4e7e8b1e1_45925296', 'content');
?>


 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_300639569679cf4e7f2f559_70494717', 'intro');
?>


   
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1372713121679cf4e7e8b1e1_45925296 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1372713121679cf4e7e8b1e1_45925296',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\blog\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    
<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li class="active"><a href=<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glowna>Strona główna</a></li>
                    <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >kategorie</a>
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
<!-- Post -->
        <section class="post">
                <header class="major">
                        <span class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['wpis']->value[0]["data_publikacji"]);?>
</span>

                        <p>Autor: <?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["widoczna_nazwa"];?>
</p>
                        <h1><?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["tytul"];?>
</h1>
                       
                        <p>
                            <?php $_smarty_tpl->_assignInScope('teststring', $_smarty_tpl->tpl_vars['wpis']->value[0]["tresc_artykulu"]);?>
                            <?php $_smarty_tpl->_assignInScope('testsplit', explode("$",$_smarty_tpl->tpl_vars['teststring']->value));?>
                            <?php echo $_smarty_tpl->tpl_vars['testsplit']->value[0];?>
</p>
                </header>
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 1) {?>
                            <div class="image main"><img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 2) {?>
                            <div class="image main"><img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['kat']->value[0]["kategorie_artykuly_id"] == 3) {?>
                            <div class="image main"><img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></div>
                            <?php }?>                 
                <p>
                    <?php $_smarty_tpl->_assignInScope('teststring', $_smarty_tpl->tpl_vars['wpis']->value[0]["tresc_artykulu"]);?>
                    <?php $_smarty_tpl->_assignInScope('testsplit', explode("$",$_smarty_tpl->tpl_vars['teststring']->value));?>
                    <?php echo $_smarty_tpl->tpl_vars['testsplit']->value[1];?>
   
                </p>
                <br>
                <br>
                <p>Autor: <?php echo $_smarty_tpl->tpl_vars['wpis']->value[0]["widoczna_nazwa"];?>
</p>
        </section>
        
        <section>
        <h3>Komentarze:</h3>
        <?php if ($_smarty_tpl->tpl_vars['wpis']->value[0]["czy_komentarze_dozwolone"] == 0) {?>
            <p>Komentarze wyłączone przez autora.</p>
        <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['komentarze']->value, 'kom');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kom']->value) {
?>
                        <p>Dnia <?php echo $_smarty_tpl->tpl_vars['kom']->value["data_dodania"];?>
 czytelnik <b><?php echo $_smarty_tpl->tpl_vars['kom']->value["widoczna_nazwa"];?>
</b> napisał: </p>
                        <p><i>"<?php echo $_smarty_tpl->tpl_vars['kom']->value["tresc_komentarza"];?>
"</i></p>
                        <br>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
        <?php }?>
        </section>

</div>

<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_300639569679cf4e7f2f559_70494717 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_300639569679cf4e7f2f559_70494717',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

<?php
}
}
/* {/block 'intro'} */
}
