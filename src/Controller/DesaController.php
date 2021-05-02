<?php

namespace App\Controller;

use App\Entity\Desa;
use App\Form\DesaType;
use App\Repository\DesaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/desa")
 */
class DesaController extends AbstractController
{

    private $desaRepository;

    public function __construct(DesaRepository $desaRepository)
    {
        $this->desaRepository = $desaRepository;
    }
    /**
     * @Route("/", name="desa_index", methods={"GET"})
     */
    public function index(DesaRepository $desaRepository): Response
    {
        return $this->render('desa/index.html.twig', [
            'desas' => $desaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="desa_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $desa = new Desa();
        $form = $this->createForm(DesaType::class, $desa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($desa);
            $entityManager->flush();

            return $this->redirectToRoute('desa_index');
        }

        return $this->render('desa/new.html.twig', [
            'desa' => $desa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="desa_show", methods={"GET"})
     */
    public function show(Desa $desa): Response
    {
        return $this->render('desa/show.html.twig', [
            'desa' => $desa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="desa_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Desa $desa): Response
    {
        $form = $this->createForm(DesaType::class, $desa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('desa_index');
        }

        return $this->render('desa/edit.html.twig', [
            'desa' => $desa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="desa_delete", methods={"POST"})
     */
    public function delete(Request $request, Desa $desa): Response
    {
        if ($this->isCsrfTokenValid('delete'.$desa->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($desa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('desa_index');
    }

     /**
     * @Route("/add", name="add_desa", methods={"POST"})
     */
    public function addDesa(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $nama_desa = $data['nama_desa'];
        $alamat_desa = $data['alamat_desa'];
        if (empty($nama_desa) || empty($alamat_desa)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->desaRepository->saveCustomer($nama_desa, $alamat_desa);

        return new JsonResponse(['status' => 'Customer added!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/get/{id}", name="get_one_customer", methods={"GET"})
     */
    public function getOnedesa($id): JsonResponse
    {
        $customer = $this->desaRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $customer->getId(),
            'nama_desa' => $customer->getNamaDesa(),
            'alamat_desa' => $customer->getAlamatDesa(),
        ];

        return new JsonResponse(['desa' => $data], Response::HTTP_OK);
    }

    /**
    * @Route("/getdesa/{id}", name="get_one_desa", methods={"GET"})
    */
    public function getdesa($id,DesaRepository $desaRepository): Response
    {
    $desa = $this->desaRepository->findOneBy(['id' => $id]);
    //$desa = $desaRepository->findAll();
    $data = [
        'id' => $desa->getId(),
        
    ];

    //dd($desa);
    // return $this->render('desa/show.html.twig', [
    //     'desa' => $desa,
    // ]);
    //return $this->json(['username' => 'jane.doe']);
    return $this->json($data, Response::HTTP_OK);
    //return new Response($data, Response::HTTP_OK);
}
}
