<?php
class View 
{
    private string $title;
    
    public function __construct(string $title) 
    {
        $this->title = $title;
    }
    
    public function render(string $viewName, array $params = []): void 
    {
        $viewPath = $this->buildViewPath($viewName);
        $content = $this->renderViewFromTemplate($viewPath, $params);
        $title = $this->title;
        $css = $this->buildCssPath($viewName);
        $js = $this->buildJsPath($viewName);
        $unreadMessageCount = $params['unreadMessageCount'] ?? 0;
        $currentPage = $params['currentPage'] ?? null;
        if (!isset($params['unreadMessageCount']) && isset($_SESSION['user_id'])) {
            $unreadMessageCount = (new MessageManager())->getUnreadMessageCount((int) $_SESSION['user_id']);
        }
        require MAIN_VIEW_PATH;
    }

    private function renderViewFromTemplate(string $viewPath, array $params = []): string
    {  
        if (file_exists($viewPath)) {
            extract($params); 
            ob_start();
            require $viewPath;
            return ob_get_clean();
        } else {
            throw new Exception("La vue '$viewPath' est introuvable.");
        }
    }

    private function buildViewPath(string $viewName): string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }

    private function buildCssPath(string $viewName): ?string
    {
        if (!file_exists("./assets/css/" . $viewName . '.css')) {
            return null;
        }
        return "./assets/css/" . $viewName . '.css';
    }

    private function buildJsPath(string $viewName): ?string
    {
        if (!file_exists("./assets/js/" . $viewName . '.js')) {
            return null;
        }
        return "./assets/js/" . $viewName . '.js';
    }
}