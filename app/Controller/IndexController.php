<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

/**
 * @AutoController
 */
class IndexController extends AbstractController
{
    public function index(ResponseInterface $response)
    {
        return $this->redirect($response);
    }

    public function redirect(ResponseInterface $response): Psr7ResponseInterface
    {
        // redirect() 方法返回的是一个 Psr\Http\Message\ResponseInterface 对象，需再 return 回去
        return $response->redirect('/note/index');
    }
}
