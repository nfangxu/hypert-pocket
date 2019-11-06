<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\View\RenderInterface;

/**
 * @AutoController
 */
class PocketController
{
    public function index(RequestInterface $request, RenderInterface $view)
    {
        return $view->render('pocket', ['title' => '记账本']);
    }

    public function data(RequestInterface $request, ResponseInterface $response)
    {
        $limit = $request->input('limit', 20);

        $page = $request->input('page', 1);

        if ($page <= 0) {
            $page = 1;
        }

        if ($limit <= 0 || $limit > 100) {
            $limit = 20;
        }

        $skip = ($page - 1) * $limit;

        $data = [];

        for ($i = 0; $i < $limit; $i++) {
            array_push($data, [
                'expenditure' => $i + $skip + 1,
            ]);
        }

        return $response->json([
            'data' => $data,
            'total' => 100,
        ]);
    }

    public function store(RequestInterface $request)
    {
        return ['code' => 0];
    }
}
