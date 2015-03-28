<?php

namespace MB\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function niAction(Request $request)
    {
        $postedContent = $request->getContent();
        $postedValues = json_decode($postedContent, true);

        $answer = array('answer' => 'Ecky-ecky-ecky-ecky-pikang-zoop-boing-goodem-zoo-owli-zhiv');
        $statusCode = Response::HTTP_OK;

        if (!isset($postedValues['offering']) || 'shrubbery' !== $postedValues['offering']) {
            $answer['answer'] = 'ni';
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
        }

        return new JsonResponse($answer, $statusCode);
    }
}