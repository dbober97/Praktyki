{extends file="main.tpl"}

{block name=content}
    
<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li class="active"><a href={$conf->action_url}glowna>Strona główna</a></li>
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
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego: {\core\SessionUtils::load("login",true)}</a>
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
      
<!-- Main -->
<div id="main">			
<!-- Post -->
        <section class="post">
                <header class="major">
                        <span class="date">{$wpis[0]["data_publikacji"]|date_format}</span>

                        <p>Autor: {$wpis[0]["widoczna_nazwa"]}</p>
                        <h1>{$wpis[0]["tytul"]}</h1>
                       
                        <p>
                            {assign var="teststring" value=$wpis[0]["tresc_artykulu"]}
                            {assign var="testsplit" value="$"|explode:$teststring}
                            {$testsplit[0]}</p>
                </header>
                            {if $kat[0]["kategorie_artykuly_id"] eq 1 }
                            <div class="image main"><img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></div>
                            {/if}
                            {if $kat[0]["kategorie_artykuly_id"] eq 2 }
                            <div class="image main"><img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></div>
                            {/if}
                            {if $kat[0]["kategorie_artykuly_id"] eq 3 }
                            <div class="image main"><img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></div>
                            {/if}                 
                <p>
                    {assign var="teststring" value=$wpis[0]["tresc_artykulu"]}
                    {assign var="testsplit" value="$"|explode:$teststring}
                    {$testsplit[1]}   
                </p>
                <br>
                <br>
                <p>Autor: {$wpis[0]["widoczna_nazwa"]}</p>
        </section>
        
        <section>
        <h3>Komentarze:</h3>
        {if $wpis[0]["czy_komentarze_dozwolone"] eq 0 }
            <p>Komentarze wyłączone przez autora.</p>
        {else}
        {foreach $komentarze as $kom}
                        <p>Dnia {$kom["data_dodania"]} czytelnik <b>{$kom["widoczna_nazwa"]}</b> napisał: </p>
                        <p><i>"{$kom["tresc_komentarza"]}"</i></p>
                        <br>
        {/foreach} 
        {/if}
        </section>

</div>

{/block}

 {block name=intro}   

{/block}

   
