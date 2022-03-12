<?php
declare(strict_types=1);

namespace App\Controller;

use AutoMapperPlus\Exception\UnregisteredMappingException;
use KennelApi\Application\CategoryService;
use KennelApi\Application\DTO\AddCategoryDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryController extends AbstractController
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private CategoryService $service;

    public function __construct(SerializerInterface $serializer, CategoryService $service, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @throws UnregisteredMappingException
     */
    public function addCategory(Request $request): JsonResponse
    {
        $addCategoryDTO = $this->serializer->deserialize($request->getContent(), AddCategoryDTO::class, 'json');
        $errors = $this->validator->validate($addCategoryDTO);
        if(count($errors) > 0) {
            return $this->json(['result' => new Response((string) $errors)]);
        }
       return $this->json(
           $this->service->addCategory($addCategoryDTO)
       );
    }

    /**
     * @return JsonResponse
     */
    public function getCategories(): JsonResponse
    {
        return $this->json(['result' => $this->service->getCategories()]);
    }
}
