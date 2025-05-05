<table >               
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
                    {foreach $listaKom as $kom}
                    {strip}
                            <tr>
                                    <td>{$kom["data_dodania"]}</td><!-- utworzono -->               
                                    <td>{if {$kom["data_modyfikacji"]} == NULL} - {else} {$kom["data_modyfikacji"]}} {/if}</td><!-- zmodyfikowano -->
                                    <td>{$kom["tytul"]}</td><!-- tytuł -->
                                    <td>{$kom["tresc_komentarza"]}</td><!-- komentarze -->
                                    <td>{if {$kom["aktywny"]} == NULL} 
                                        <form method ="post" action="{$conf->action_url}panelModeratorZmiana/{$kom["id"]}">
                                        <div class="col-4 col-12-small">
                                                <input type="radio" id="aktywuj{$kom["id"]}" name="kom{$kom["id"]}" value="aktywuj">
                                                <label for="aktywuj{$kom["id"]}">Aktywny</label>
                                        </div>
                                        <div class="col-4 col-12-small">
                                                <input type="radio" id="odrzuc{$kom["id"]}" name="kom{$kom["id"]}" value="odrzuc">
                                                <label for="odrzuc{$kom["id"]}">Odrzucony</label>
                                        </div>
                                        <div class="col-12">
                                                <ul class="actions">
                                                        <li><input type="submit" value="Zapisz" class="primary" /></li>
                                                </ul>
                                        </div>
                                        </form>
                                        {else} {if {$kom["aktywny"]} == 1} 
                                        <form  method ="post" action="{$conf->action_url}panelModeratorZmiana/{$kom["id"]}">
                                        <div class="col-4 col-12-small">
                                                <input type="radio" id="aktywuj{$kom["id"]}" name="kom{$kom["id"]}" value="aktywuj" checked>
                                                <label for="aktywuj{$kom["id"]}">Aktywny</label>
                                        </div>
                                        <div class="col-4 col-12-small">
                                                <input type="radio" id="odrzuc{$kom["id"]}" name="kom{$kom["id"]}" value="odrzuc">
                                                <label for="odrzuc{$kom["id"]}">Odrzucony</label>
                                        </div>
                                        <div class="col-12">
                                                <ul class="actions">
                                                        <li><input type="submit" value="Zapisz" class="primary" /></li>
                                                </ul>
                                        </div>
                                        </form>
                                            {else} 
                                             <form  method ="post" action="{$conf->action_url}panelModeratorZmiana/{$kom["id"]}">
                                            <div class="col-4 col-12-small">
                                                    <input type="radio" id="aktywuj{$kom["id"]}" name="kom{$kom["id"]}" value="aktywuj">
                                                    <label for="aktywuj{$kom["id"]}">Aktywny</label>
                                            </div>
                                            <div class="col-4 col-12-small">
                                                    <input type="radio" id="odrzuc{$kom["id"]}" name="kom{$kom["id"]}" value="odrzuc" checked>
                                                    <label for="odrzuc{$kom["id"]}">Odrzucony</label>
                                            </div>
                                            <div class="col-12">
                                                    <ul class="actions">
                                                            <li><input type="submit" value="Zapisz" class="primary" /></li>
                                                    </ul>
                                            </div>
                                            </form> 
                                            {/if} {/if}</td><!-- widoczność -->
                            </tr>
                    {/strip}
                    {/foreach}      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość komentarzy na blogu: {$ileKom}</td>
                        </tr>
                </tfoot>
                </table>