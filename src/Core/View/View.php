<?php

declare(strict_types=1);

namespace Core\View;

class View
{
    private array $config = [];

    public function __construct()
    {
        $this->config = config('view.php');
    }

    public function render(string $name, array $data = []): string
    {
        ob_start();

        extract($data);

        require $this->getFilePath($name);

        return (string)ob_get_clean();
    }

    private function getFilePath(string $name): string
    {
        return $this->config['path'] . DIRECTORY_SEPARATOR . rtrim($name, DIRECTORY_SEPARATOR);
    }
}
