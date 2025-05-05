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
            
<h3>Lista Twoich komentarzy</h3>
<div class="table-wrapper">
            <form  action="{$conf->action_url}panelCzytelnik">
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
                                <th>Tytuł artykułu</th>                                
                                <th>Treść komentarza</th> <!-- czy dozwolone-->
                                <th>Widoczność</th> <!-- w bazie przechowywany]e to jest w kolumnie 'aktywny' w tabeli 'artykuły'-->
                                                    <!-- gdy widoczność ustawiona jakko falso - artykuł jest roboczy tj nie opublikowany-->
                                <th>Edycja</th>
                        </tr>
                </thead>
                <tbody>
                    {foreach $listaKom as $kom}
                    {strip}
                            <tr>
                                    <td>{$kom["data_dodania"]}</td><!-- utworzono -->               
                                    <td>{if {$kom["data_modyfikacji"]} == NULL} - {else} {$kom["data_modyfikacji"]}} {/if}</td><!-- zmodyfikowano -->
                                    <td>{$kom["tytul"]}</td><!-- tytuł -->
                                    <td>{$kom["tresc_komentarza"]}</td><!-- komentarze -->
                                    <td>{if {$kom["aktywny"]} == NULL} oczekuje na akceptację {else} {if {$kom["aktywny"]} == 1} widoczny {else} odrzucony: niezgodny z regulaminem{/if} {/if}</td><!-- widoczność -->
                                    <td>
                                        <a class="button primary fit disabled" href="#">Edytuj</a>
                                        &nbsp;
                                        <a class="button primary fit disabled" href="#">Usuń</a>
                                    </td>
                            </tr>
                    {/strip}
                    {/foreach}      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość komentarzy czytelnika: {$ileKom}</td>
                        </tr>
                </tfoot>
        </table>
</div>  

</section>

              

 <section class="post">
<h3>Lista artykułów, które możesz skomentować</h3>
<div class="table-wrapper">
            <form  action="{$conf->action_url}panelCzytelnik">
                <fieldset>
                    <ul class="actions">
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytulArt" value="{$form->parametrWyszukiwaniaArt}" /><br />
                    </ul>
                </fieldset>
            </form>
        <table class="alt">
                <thead>
                        <tr>
                                <th>Data publikacji</th>
                                <th>Tytuł</th>
                                <th>Dodaj komentarz</th>
                        </tr>
                </thead>
                <tbody>
                    {foreach $listaArt as $art}
                    {strip}
                            <tr>
                                    <td>{$art["data_publikacji"]}</td><!-- utworzono --> 
                                    <td>{$art["tytul"]}</td><!-- tytuł -->
                                    <td>
                                        <a class="button primary fit" href="{$conf->action_root}nowyKomentarz/{$art['id']}">+ Nowy komentarz</a>
                                    </td>
                            </tr>
                    {/strip}
                    {/foreach}      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="1"></td>
                                <td>Ilość artykułów na blogu: {$ileArt}</td>
                        </tr>
                </tfoot>
        </table>
</div>  
</section>
</div>
                                
{/block}


 {block name=intro}   

 {/block}