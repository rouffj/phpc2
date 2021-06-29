<?php

require __DIR__ . '/Exception/FileNotFoundException.php';

class Template
{
    /**
     * @var Template
     */
    private $parentTemplate;

    private $templatePath;

    private $vars = [];

    /**
     * Template constructor.
     * @param string $templatePath
     */
    public function __construct(string $templatePath)
    {
        if (!is_readable($templatePath)) {
            throw new FileNotFoundException(sprintf('The file %s is not found', $templatePath));
        }
        $this->templatePath = $templatePath;
    }

    /**
     * Allow to set var for the current template.
     *
     * @param string $varName
     * @param mixed $varValue
     *
     * @return Template
     */
    public function setVar(string $varName, $varValue): Template
    {
        $this->vars[$varName] = $varValue;

        return $this;
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

        // Quand un template a un parent, on appelle son render, sinon on génère uniquement le HTML du template
        if ($this->parentTemplate) {
            $this->parentTemplate->setVar('_content', $html);
            $html = $this->parentTemplate->render();
        }

        return $html;
    }

    public function extends(string $templatePath)
    {
        $this->parentTemplate = new Template($templatePath);
    }

    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function __get($name)
    {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
    }
}