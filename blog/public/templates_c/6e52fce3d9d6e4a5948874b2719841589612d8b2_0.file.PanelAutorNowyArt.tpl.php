<?php
/* Smarty version 3.1.33, created on 2025-01-31 17:50:15
  from 'C:\xampp\htdocs\blog\app\views\PanelAutorNowyArt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_679cff4793ad11_26027449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e52fce3d9d6e4a5948874b2719841589612d8b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PanelAutorNowyArt.tpl',
      1 => 1738332909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679cff4793ad11_26027449 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2115818328679cff475e15b9_97747407', 'content');
?>



 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1676897399679cff47939422_70954868', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_2115818328679cff475e15b9_97747407 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2115818328679cff475e15b9_97747407',
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

                
<div id="main">
    <section class="post">
 
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
   <div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
      <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

   </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>       
        
<h3>Tryb dodawania/edycji artykułów</h3>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zapiszArtykul">
      
        <div class="row gtr-uniform">
            
                <div class="col-12">
                        <input type="text" name="tytul" id="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->tytul;?>
" placeholder="Tytuł" />
                </div>
                <!-- Break -->
                <div class="col-6 col-12-small">
                        <select name="wybranaKategoria" id="wybranaKategoria">
                                <option value="">- Kategoria (wymagane) -</option>
                                <option value="1">Matematyka</option>
                                <option value="2">Fizyka</option>
                                <option value="3">Informatyka</option>
                        </select>
                </div>
                <div class="col-6 col-12-small">
                        <ul class="actions">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
nowaKategoria" class="button primary">+ Nowa</a></li>
                        </ul>
                </div>                               
                <!-- Break -->
				<div class="col-6 col-12-small">
					<input type="checkbox" id="komentarze" name="komentarze" checked>
					<label for="komentarze">Komentarze dozwolone</label>
				</div>
				<div class="col-6 col-12-small">
					<input type="checkbox" id="artykulWidoczny" name="artykulWidoczny">
					<label for="artykulWidoczny">Widoczny</label>
				</div>
                <!-- Break -->
                
                <div class="col-12">
                        <textarea name="tresc" id="tresc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->tresc;?>
" placeholder="Treść artykułu [wymagany krótki wstęp widoczny na stronie głównej: napisz go, po nim znak dolara <w związku z tym znak dolara w tekście jest niedozwolony> i zacznij pisać artykuł] :)" rows="6"></textarea>
                </div>
                
                <!-- Break -->
                <div class="col-12">
                        <ul class="actions">
                                <li><input type="submit" value="Zapisz" class="primary" /></li>
                        </ul>
                </div>
        </div>
               

</form>


</section>
</div>
    
<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_1676897399679cff47939422_70954868 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_1676897399679cff47939422_70954868',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

 <?php
}
}
/* {/block 'intro'} */
}
