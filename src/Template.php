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
        return 'blabla';
    }
}