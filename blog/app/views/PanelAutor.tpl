{extends file="main.tpl"}

{block name=content}
<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li><a href={$conf->action_url}glowna>Strona główna</a></li>
                    <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >kategorie</a>
                                <ul>
                                 <li><a href="{$conf->action_url}matematyka">Matematyka</a></li>
                                  <li><a href="{$conf->action_url}informatyka">Informatyka</a></li>
                                  <li><a href="{$conf->action_url}fizyka">Fizyka</a></li>
                                </ul>
                           </li>
                    </ol> 
                    <li><a href="{$conf->action_url}autorzy">Autorzy</a></li>
                    <li><a href="{$conf->action_url}kontakt">Kontakt</a></li>
                    {if \core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("moderator") || \core\RoleUtils::inRole("czytelnik") || \core\RoleUtils::inRole("autor")}
                        <li><a href="{$conf->action_url}logout">Wyloguj się</a></li>
                        <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego: {\core\SessionUtils::load("login", true)}</a>
                                <ul>
                                 {if \core\RoleUtils::inRole("admin")} <li><a href="{$conf->action_url}panelAdmin">administrator</a></li> {/if}
                                 {if \core\RoleUtils::inRole("moderator")}<li><a href="{$conf->action_url}panelModerator">moderator</a></li> {/if}
                                 {if \core\RoleUtils::inRole("autor")} <li><a href="{$conf->action_url}panelAutor">autor</a></li> {/if}
                                 {if \core\RoleUtils::inRole("czytelnik")} <li><a href="{$conf->action_url}panelCzytelnik">czytelnik</a></li> {/if}
                                </ul>
                           </li>
                       </ol> 
                        {else}
                            <li><a href="{$conf->action_url}logowanie">Logowanie</a></li>
                    {/if}
                </ul>

        </nav> 

                
<div id="main">
    <section class="post">
            
<h3>Lista Twoich artykułów</h3>
<div class="table-wrapper">
        <a href="{$conf->action_root}nowyArtykul" class="button">+ Nowy artykuł</a>
            <form  action="{$conf->action_url}panelAutor">
                <fieldset>
                    <ul class="actions">
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytul" value="{$form->parametrWyszukiwania}" /><br />
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
                    {foreach $listaArt as $art}
                    {strip}
                            <tr>
                                    <td>{$art["data_publikacji"]}</td><!-- utworzono -->               
                                    <td>{if {$art["data_ostatniej_zmiany"]} == NULL} - {else} {$art["data_ostatniej_zmiany"]}} {/if}</td><!-- zmodyfikowano -->
                                    <td>{$art["tytul"]}</td><!-- tytuł -->
                                    <td>{if {$art["czy_komentarze_dozwolone"]}} dozwolone {else} nie dozwolone {/if} </td><!-- komentarze -->
                                    <td>{if {$art["aktywny"]}} tak {else} nie {/if}</td><!-- widoczność -->
                                    <td>
                                        <a class="button primary fit disabled" href="#">Edytuj</a>
                                    </td>
                            </tr>
                    {/strip}
                    {/foreach}      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość artykułów autora: {$ileArt}</td>
                        </tr>
                </tfoot>
        </table>
</div>  

</section>
</div>
    
{/block}


 {block name=intro}   

 {/block}