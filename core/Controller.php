<?php

namespace Core;

class Controller
{
    protected $viewPath = __DIR__ . '/../app/Views';

    public function render($view, $data = [])
    {
        extract($data);
        $file = $this->viewPath . '/' . $view . '.php';
        
        if (!file_exists($file)) {
            throw new \Exception("View not found: $view");
        }
        
        ob_start();
        include $file;
        return ob_get_clean();
    }

    public function redirect($url, $code = 302)
    {
        header("Location: $url", true, $code);
        exit;
    }

    public function json($data, $code = 200)
    {
        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function paginate($items, $perPage = 9, $currentPage = 1)
    {
        $total = count($items);
        $pages = ceil($total / $perPage);
        $offset = ($currentPage - 1) * $perPage;
        $paginated = array_slice($items, $offset, $perPage);

        return [
            'items' => $paginated,
            'current_page' => $currentPage,
            'total_pages' => $pages,
            'total_items' => $total,
            'per_page' => $perPage,
            'has_prev' => $currentPage > 1,
            'has_next' => $currentPage < $pages,
        ];
    }
}
