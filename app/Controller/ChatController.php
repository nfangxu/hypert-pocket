<?php


namespace App\Controller;

use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\View\RenderInterface;

/**
 * @AutoController
 */
class ChatController
{
    public function index(RequestInterface $request, RenderInterface $view)
    {
        return $view->render('chat', ['title' => '聊天室']);
    }
}
