<?php
/* Smarty version 3.1.33, created on 2025-03-29 20:33:31
  from 'C:\xampp\htdocs\blog\app\views\PanelModerator_fragment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e84b0b757d96_33155843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a42b8d6a4aa3d424052bcea68acc9301cbddb59d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PanelModerator_fragment.tpl',
      1 => 1743276797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e84b0b757d96_33155843 (Smarty_Internal_Template $_smarty_tpl) {
?><table >               
    <thead>
                        <tr>
                                <th>Napisano dnia</th>
                                <th>Zmieniono dnia</th>
                                <th>Tytuł artykułu</th>                                
                                <th>Treść komentarza</th>
                                <th>Status komentarza</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaKom']->value, 'kom');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kom']->value) {
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["data_dodania"];?>
</td><!-- utworzono --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["data_modyfikacji"];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == NULL) {?> - <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['kom']->value["data_modyfikacji"];?>
} <?php }?></td><!-- zmodyfikowano --><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["tytul"];?>
</td><!-- tytuł --><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["tresc_komentarza"];?>
</td><!-- komentarze --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["aktywny"];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == NULL) {?><form method ="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModeratorZmiana/<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
"><div class="col-4 col-12-small"><input type="radio" id="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="aktywuj"><label for="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Aktywny</label></div><div class="col-4 col-12-small"><input type="radio" id="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="odrzuc"><label for="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Odrzucony</label></div><div class="col-12"><ul class="actions"><li><input type="submit" value="Zapisz" class="primary" /></li></ul></div></form><?php } else { ?> <?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["aktywny"];
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3 == 1) {?><form method ="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModeratorZmiana/<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
"><div class="col-4 col-12-small"><input type="radio" id="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="aktywuj" checked><label for="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Aktywny</label></div><div class="col-4 col-12-small"><input type="radio" id="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="odrzuc"><label for="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Odrzucony</label></div><div class="col-12"><ul class="actions"><li><input type="submit" value="Zapisz" class="primary" /></li></ul></div></form><?php } else { ?><form method ="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModeratorZmiana/<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
"><div class="col-4 col-12-small"><input type="radio" id="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="aktywuj"><label for="aktywuj<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Aktywny</label></div><div class="col-4 col-12-small"><input type="radio" id="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" name="kom<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
" value="odrzuc" checked><label for="odrzuc<?php echo $_smarty_tpl->tpl_vars['kom']->value["id"];?>
">Odrzucony</label></div><div class="col-12"><ul class="actions"><li><input type="submit" value="Zapisz" class="primary" /></li></ul></div></form><?php }?> <?php }?></td><!-- widoczność --></tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość komentarzy na blogu: <?php echo $_smarty_tpl->tpl_vars['ileKom']->value;?>
</td>
                        </tr>
                </tfoot>
                </table><?php }
}
