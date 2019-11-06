<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\View\RenderInterface;

/**
 * @AutoController
 */
class NoteController
{
    public function index(RequestInterface $request, RenderInterface $view)
    {
        return $view->render('note', ['title' => '记事本']);
    }
}
