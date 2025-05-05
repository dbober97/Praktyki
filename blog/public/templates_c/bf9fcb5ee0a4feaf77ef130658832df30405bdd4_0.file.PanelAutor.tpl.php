<?php
/* Smarty version 3.1.33, created on 2025-01-28 16:16:51
  from 'C:\xampp\htdocs\blog\app\views\PanelAutor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6798f4e33c10c9_62535041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf9fcb5ee0a4feaf77ef130658832df30405bdd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PanelAutor.tpl',
      1 => 1738077394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6798f4e33c10c9_62535041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15026509386798f4e3366415_72064327', 'content');
?>



 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6147802806798f4e33c0110_84273346', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_15026509386798f4e3366415_72064327 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15026509386798f4e3366415_72064327',
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
            
<h3>Lista Twoich artykułów</h3>
<div class="table-wrapper">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
nowyArtykul" class="button">+ Nowy artykuł</a>
            <form  action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAutor">
                <fieldset>
                    <ul class="actions">
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
" /><br />
                    </ul>
                </fieldset>
            </form>
        <table class="alt">
                <thead>
                        <tr>
                                <th>Utworzono dnia</th>
                                <th>Zmieniono dnia</th>
                                <th>Tytuł</th>                                
                                <th>Komentarze</th> <!-- czy dozwolone-->
                                <th>Widoczny</th> <!-- w bazie przechowywany]e to jest w kolumnie 'aktywny' w tabeli 'artykuły'-->
                                                    <!-- gdy widoczność ustawiona jakko falso - artykuł jest roboczy tj nie opublikowany-->
                                <th>Edycja</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaArt']->value, 'art');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['art']->value["data_publikacji"];?>
</td><!-- utworzono --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['art']->value["data_ostatniej_zmiany"];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == NULL) {?> - <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['art']->value["data_ostatniej_zmiany"];?>
} <?php }?></td><!-- zmodyfikowano --><td><?php echo $_smarty_tpl->tpl_vars['art']->value["tytul"];?>
</td><!-- tytuł --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['art']->value["czy_komentarze_dozwolone"];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?> dozwolone <?php } else { ?> nie dozwolone <?php }?> </td><!-- komentarze --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['art']->value["aktywny"];
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3) {?> tak <?php } else { ?> nie <?php }?></td><!-- widoczność --><td><a class="button primary fit disabled" href="#">Edytuj</a></td></tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość artykułów autora: <?php echo $_smarty_tpl->tpl_vars['ileArt']->value;?>
</td>
                        </tr>
                </tfoot>
        </table>
</div>  

</section>
</div>
    
<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_6147802806798f4e33c0110_84273346 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_6147802806798f4e33c0110_84273346',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

 <?php
}
}
/* {/block 'intro'} */
}
