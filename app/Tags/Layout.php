<?php
namespace App\Tags;
use App\Model\User;
final class Layout extends Component
{
    /**
     * @param string $title
     * @param bool $isLogged
     * @param array $content
     * */

    public function __construct(
            private readonly string $title, private readonly bool $isLogged, private readonly array $content) {
    }

    public function render(): string
    {
        $title = $this->e($this->title);
        $nav = $this->renderAll(
                [new Container('div',[
                    new Container('ul',[
                        new Container('li',[
                            new Hypertext('/', ['Flexarion'])]),
                    ], ''),
                    new Container('ul', [
                        new Container('li',[
                            new Hypertext('/', ['Studio'])]),
                        new Container('li',[
                            new Hypertext('/', ['Jeux'])]),
                        new Container('li',[
                            new Hypertext('/', ['Devlog'])])
                    ], '')])]);

        $footer = $this->renderAll([new Container('footer',
                [new Container('ul',[
                    new Container('li',[
                        new Hypertext('/',['Accueil'])]),
                    new Container('li',[
                        new Hypertext('/',['Contact'])])
                ])],
                'footer')]);
        $links = $this->renderAll([new Link ('icon', '/res/image/logoMathAi.ico','type="image/x-icon"'),new Link ('stylesheet', '/res/css/style.css')]);
        $par = $this->renderAll($this->content);
        return
                <<<HTML
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    {$links}
                    <link rel="stylesheet" href="/res/katex/katex.min.css">
                    <script defer src="/res/katex/katex.min.js"></script>
                    <script defer src="/res/katex/contrib/auto-render.min.js"></script>
                    <script defer src="/res/js/math.js"></script>
                    <title>{$this->e($title)}</title>

                </head>
                <body>
                <header>
                <nav>
                    {$nav}
                </nav>
                </header>
                <main >
                     {$par}
                </main>
                {$footer}
                </body>
                </html>
                HTML;
    }
}


