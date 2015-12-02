<div id="right">
    <h1 class="title center-text">
        Penguins Fanfiction
    </h1>

    <div id="story-link-wrap" class="center">
        <div id="sod-block" class="story-link" name="Speed-Of-Darkness">
            <div class="story-information">
                <div><a href="/ld28">The Speed of Darkness</a></div>
                <div class="game-genre">Angst/Adventure</div>
                <div class="game-discription-extended">Skipper's got secrets; a past he only wanted to hide. When Manfredi one day returns, everything Skipper had hoped for gets shattered. His team is launched headfirst into his past, battling for a power strong enough to conquer the world. Struggling to both keep Manfredi sane and evade the pursuit of Alice, Skipper works to finish what he started nearly two years ago. <br><br> This was my first full length novel.  It's a fanfiction for The Penguins of Madagascar, a cartoon about four anthropomorphic penguins.</div>
                <a href="https://www.fanfiction.net/s/5388782/1/The-Sun-Chronicles-The-Speed-of-Darkness"><img title="Fanfiction.net" class="link-logo float-right" src="res/img/ffnet.png"></a>
                <a href="javascript:void 0;" onclick="Utils.loadPage('blog-id-214');"><img title="Final Commentary" class="link-logo float-right" src="res/img/wp.png"></a>
                <a href=""><img title="PDF Download" src="res/img/pdf.png" class="link-logo float-right"></a>
            </div>
        </div>
        <div id="pos-block" class="story-link" name="Power-Of-Silence">
            <div class="story-information">
                <div><a href="/ld29">The Power of Silence</a></div>
                <div class="game-genre">Drama/Supernatural</div>
                <div class="game-discription-extended">Six months after the Antechamber, the Sun prophesies that every human on the planet is going to be absorbed. With tensions high on the team, Private must regain Kowalski's trust for him to understand that his death will save them. With threats around every corner, Private realizes that it will be easier said than done.  <br><br> This was the sequel for The Speed of Darkness, and the second book in a planned trilogy for The Sun Chronicles.  Both this story and the trilogy are now discontinued, unfortunately.</div>
                <a href="https://www.fanfiction.net/s/7925160/1/The-Sun-Chronicles-The-Power-of-Silence"><img title="Fanfiction.net" class="link-logo float-right" src="res/img/ffnet.png"></a>
                <a href="javascript:void 0;" onclick="Utils.loadPage('blog-id-216');"><img title="Final Commentary" class="link-logo float-right" src="res/img/wp.png"></a>
                <a href=""><img title="PDF Download" src="res/img/pdf.png" class="link-logo float-right"></a>
            </div>
        </div>
        <div id="ditz-block" class="story-link" name="Death-In-The-Zoo">
            <div class="story-information">
                <div><a href="/ld30">Death in the Zoo</a></div>
                <div class="game-genre">Mystery</div>
                <div class="game-discription-extended">One day, a lemur from Madagascar joins the zoo. Soon thereafter Julien is murdered and Private is framed for it. The penguins rush to find evidence to prove Private's innocence while a much darker plan is being worked out. Skipper struggles to keep both himself and his team sane, unaware that the real killer is right under his beak and is going to strike again. <br><br> This short novel was the first I'd ever finished.</div>
                <a href="https://www.fanfiction.net/s/5196829/1/Death-in-the-Zoo"><img title="Fanfiction.net" class="link-logo float-right" src="res/img/ffnet.png"></a>
                <a href=""><img title="PDF Download" src="res/img/pdf.png" class="link-logo float-right"></a>
            </div>
        </div>
        <div id="hotz-block" class="story-link" name="Horror-In-The-Zoo">
            <div class="story-information">
                <div><a href="/ld32">Horror In The Zoo</a></div>
                <div class="game-genre">Mystery/Horror</div>
                <div class="game-discription-extended">Summary to be written.  <br><br> This is a sequel for Death in the Zoo published nearly seven years later. </div>
                <a href="https://www.fanfiction.net/s/7925160/1/The-Sun-Chronicles-The-Power-of-Silence"><img title="Fanfiction.net" class="link-logo float-right" src="res/img/ffnet.png"></a>
            </div>
        </div>
        <div id="ia-block" class="story-link" name="Impetuous-Acumen">
            <div class="story-information">
                <div><a href="/ld33">Impetuous Acumen</a></div>
                <div class="game-genre">Sci-Fi/Adventure</div>
                <div class="game-discription-extended">Our world might have its limits, but they will never be fully realized. One bird will learn just how many more ways he can push those limits when he stumbles into a tool shed in the middle of a field in Kansas. <br><br> This is a short novel crossover with Portal 2, and contains spoilers for that game.</div>
                <a href="https://www.fanfiction.net/s/8368121/1/Impetuous-Acumen"><img title="Fanfiction.net" class="link-logo float-right" src="res/img/ffnet.png"></a>
                <a href=""><img title="PDF Download" src="res/img/pdf.png" class="link-logo float-right"></a>
            </div>
        </div>

        <h1 class="title center-text">
            Original Fiction
        </h1>

        <p>
           Maybe someday I'll finish one of my several half-complete novels.  Until then, this section remains painfully blank...
        </p>
    </div>
</div>

<script type="text/javascript">
    $('.story-link').on('click', function(e){
        t = e;
        if(e.target.className.indexOf('link-logo') == -1){
            window.open('http://www.cudascubby.com/'+$(this).attr('name'));
        }
    });

    $('.story-link').on('mouseover', function(e){
        $(this).children('.story-information').stop(true);
        $(this).children('.story-information').animate({height: 370}, 500);
    });

    $('.story-link').on('mouseout', function(e){
        $(this).children('.story-information').stop(true);
        $(this).children('.story-information').animate({height: 40}, 500);
    });
</script>