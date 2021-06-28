<?php


class Template
{
    private $templatePath;

    private $vars = [];

    /**
     * Template constructor.
     * @param string $templatePath
     */
    public function __construct(string $templatePath)
    {
        $this->templatePath = $templatePath;
    }

    /**
     * Allow to set var for the current template.
     *
     * @param string $varName
     * @param mixed $varValue
     */
    public function setVar(string $varName, $varValue): void
    {
        $this->vars[$varName] = $varValue;
    }

    public function render(): string
    {

        //$html = file_get_contents($this->templatePath);
        //$name = 'Hugo';
        //$lastName = 'Bar';

        // 1. Capture tous les echo / var_dump / includes faits entre un ob_start() et ob_get_clean()
        ob_start();
        ob_implicit_flush(false);

        // 2. permet la déclaration automatique de variables locales à partir
        // d'un tableau associatif.
        extract($this->vars);

        // 3. Inclue et exécute le code PHP avec les variables déclarées dans la méthode render()
        include $this->templatePath;

        $html = ob_get_clean();

        return $html;
    }
}