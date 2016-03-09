<?php

namespace FilmApi\Bundle\FilmBundle\Controller;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    public function createAction(Request $request)
    {
        $content = $request->getContent();

        if(empty($content)) {
            return new Response('1');
        }

        $params = json_decode($content, true);



        $name = $params['name'];
        $year = $params['year'];
        $date = $params['date'];
        $url = $params['url'];
        $filmDto = new FilmDTO(null, $name, $year, $date, $url);


        $createFilmUseCase = $this->get("createFilmUseCase");
        $createFilmUseCase->execute($filmDto);

        return new Response('1');
    }

    public function showAction()
    {
        return new Response('1');
    }

    public function updateAction(Request $request, $id)
    {

        $content = $request->getContent();

        if(!empty($content)) {
            return new Response('1');
        }

        $params = json_decode($content,true);

        $updateFilmUseCase = $this->get("updateFilmUseCase");
        //$updateFilmUseCase->execute();

        return new Response('1');
    }

    public function deleteAction(Request $request, $id)
    {

        $deleteFilmUseCase = $this->get("deleteFilmUseCase");
        $deleteFilmUseCase->execute($id);

        return new Response('1');
    }
}