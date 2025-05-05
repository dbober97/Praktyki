<div class="col-6 col-12-xsmall" id="main">
  &nbsp; &nbsp; &nbsp; &nbsp; Ilość artykułów spełniających kryteria: {$sumaArt}
  <br>
  &nbsp; &nbsp; &nbsp; &nbsp; Ilość podstron: {$ileStron}
</div>

<!-- Featured Post -->
<div id="main">
{foreach $wpis as $art}
    {if $art@index eq 0 }
        <article class="post featured" >
                <header class="major">
                        <span class="date">{$art["data_publikacji"]|date_format}</span>
                        <h2><a href="{$conf->action_url}pelnaStrona/{$art["id"]}">{$art["tytul"]}</a></h2>
                        <p>{assign var="teststring" value=$art["tresc_artykulu"]}
                            {assign var="testsplit" value="$"|explode:$teststring}
                            {$testsplit[0]}
                        </p>
                </header>
                <a href="{$conf->action_url}pelnaStrona/{$art["id"]}" class="image main">
                    {if $kat[$art@index]["kategorie_artykuly_id"] eq 1 }
                    <img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></a>
                    {/if}
                    {if $kat[$art@index]["kategorie_artykuly_id"] eq 2 }
                    <img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></a>
                    {/if}
                    {if $kat[$art@index]["kategorie_artykuly_id"] eq 3 }
                    <img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></a>
                    {/if}                
                <ul class="actions special">
                        <li><a href="{$conf->action_url}pelnaStrona/{$art["id"]}" class="button large">Rozwiń</a></li>
                </ul>
        </article>
    {/if}
    
    {if $art@index lt {$ileArt} && $art@index gt 0 }
        {if $art@index eq 1 }
            <section class="posts">
        {/if}
        <article>
            <header>
                    <span class="date">{$art["data_publikacji"]|date_format}</span>
                    <h2><a href="{$conf->action_url}pelnaStrona/{$art["id"]}">{$art["tytul"]}</a></h2>
            </header>
            <a href="{$conf->action_url}pelnaStrona/{$art["id"]}" class="image fit">

            {if $kat[$art@index]["kategorie_artykuly_id"] eq 1 }
            <img src="http://localhost/blog/public/images/obMatma.jpg" alt="" /></a>
            {/if}
            {if $kat[$art@index]["kategorie_artykuly_id"] eq 2 }
            <img src="http://localhost/blog/public/images/obFizyka.jpg" alt="" /></a>
            {/if}
            {if $kat[$art@index]["kategorie_artykuly_id"] eq 3 }
            <img src="http://localhost/blog/public/images/obInfor.jpg" alt="" /></a>
            {/if}      

            <p>{assign var="teststring" value=$art["tresc_artykulu"]}
                {assign var="testsplit" value="$"|explode:$teststring}
                {$testsplit[0]}
            </p>
            <ul class="actions special">
                    <li><a href="{$conf->action_url}pelnaStrona/{$art["id"]}" class="button">Rozwiń</a></li>
            </ul>
        </article>
        {if $art@index eq {$sumaArt}-1}
            </section>
        {/if}
    {/if}
{/foreach}

</div>

<div id="main">
<!-- Footer -->
<footer>
       <div class="pagination">
               <!--<a href="#" class="previous">Prev</a>-->
               <a {if $page gt 1} href="{$conf->action_url}glowna?tytul={$form->parametrWyszukiwania}&page={$page-1}" {/if} class="previous" >poprzednia</a>
               <a class="page">{$page} / {$ileStron}</a>
               <a {if $ileStron gt $page} href="{$conf->action_url}glowna?tytul={$form->parametrWyszukiwania}&page={$page+1}" {/if} class="next">następna</a>
       </div>
</footer>   
</div>



