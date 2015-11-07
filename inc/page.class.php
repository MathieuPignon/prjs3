<?php

/**
 * Classe gérant l'affichage d'une page.
 * Permet de garder un template général sur le site, et d'en changer facilement et rapidement
 */
class Page {
  // Attributs d'instance
  private $head  = null;
  private $title = null;
  private $body  = null;

  // Attributs de classe contenant le contenu du header et du footer du template
  public static $header = <<<HTML
  <h1>Gestion des stages</h1>
HTML;

  public static $footer = <<<HTML
  &copy; 2015
HTML;

  /**
   * Constructeur
   * @param string $title Titre de la page
   */
  public function __construct($title = "Page sans titre") {
    $this->setTitle($title) ;
  }

  /**
   * Affecter le titre de la page
   * @param string $title Le titre
   */
  public function setTitle($title) {
    $this->title = $title ;
  }

  /**
   * Ajouter l'URL d'un script CSS dans head
   * @param string $url L'URL du script CSS
   *
   * @return void
   */
  public function appendCssUrl($url) {
    $this->appendToHead(<<<HTML
  <link rel="stylesheet" type="text/css" href="{$url}">

HTML
) ;
  }

  /**
   * Ajouter l'URL d'un script JavaScript dans head
   * @param string $url L'URL du script JavaScript
   *
   * @return void
   */
  public function appendJsUrl($url) {
    $this->appendToHead(<<<HTML
  <script type='text/javascript' src='$url'></script>

HTML
) ;
  }

  /**
   * Ajouter un contenu dans body
   * @param string $content Le contenu à ajouter
   *
   * @return void
   */
  public function appendContent($content) {
    $this->body .= $content ;
  }

  /**
   * Produire la page Web complète
   *
   * @return string
   */
  public function toHTML() {
    //TODO
    //Template générique du site

    return <<<HTML
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>{$this->title}</title>
        {$this->head}
    </head>
    <body>
      <header>
        {self::$header}
      </header>
      {$this->body}
      <footer>
        {self::$footer}
      </footer>
    </body>
</html>
HTML;
  }
}
