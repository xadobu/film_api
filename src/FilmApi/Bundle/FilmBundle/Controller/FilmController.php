<?php

namespace FilmApi\Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    public function createAction(Request $request)
    {
        $content = $request->getContent();

        if(!empty($content)) {
            $params = json_decode($content,true);
        }

        return new Response('1');
    }

    public function showAction()
    {
        return new Response('1');
    }

    public function updateAction()
    {
        return new Response('1');
    }

    public function deleteAction()
    {
        return new Response('1');
    }
}