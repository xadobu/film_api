<?php

namespace FilmApi\Bundle\FilmBundle\Controller;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    public function createAction(Request $request)
    {
        $content = $request->getContent();

        if (empty($content)) {
            return new Response('Error: no content provided', Response::HTTP_BAD_REQUEST);
        }

        $params = json_decode($content, true);

        $name = $params['name'];
        $year = $params['year'];
        $date = $params['date'];
        $url = $params['url'];
        $filmDto = new FilmDTO(null, $name, $year, $date, $url);

        $createFilmUseCase = $this->get("createFilmUseCase");
        $createFilmUseCase->execute($filmDto);

        return new JsonResponse(array("message"=> "Film created successfully!"), Response::HTTP_CREATED);
    }

    public function showAction()
    {
        $listFilmsUseCase = $this->get("listFilmsUseCase");
        $result = $listFilmsUseCase->execute();

        return new JsonResponse($result);
    }

    public function updateAction(Request $request, $id)
    {
        $content = $request->getContent();

        if (empty($content)) {
            return new JsonResponse(array("message"=> "Error: no content provided"), Response::HTTP_BAD_REQUEST);
        }

        $params = json_decode($content, true);

        $name = $params['name'];
        $year = $params['year'];
        $date = $params['date'];
        $url = $params['url'];
        $filmDto = new FilmDTO($id, $name, $year, $date, $url);

        $updateFilmUseCase = $this->get("updateFilmUseCase");
        $updateFilmUseCase->execute($filmDto);

        return new JsonResponse(array("message"=> "Film successfully modified!"));
    }

    public function deleteAction($id)
    {
        $filmDto = new FilmDTO($id, null, null, null, null);

        $deleteFilmUseCase = $this->get("deleteFilmUseCase");
        $deleteFilmUseCase->execute($filmDto);

        return new JsonResponse(array("message"=> "Film successfully modified!"));
    }
}