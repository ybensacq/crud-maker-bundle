<?= "<?php\n"; ?>

namespace <?= $namespace; ?>;

use <?= $entity_full_class_name; ?>;
use <?= $form_full_class_name; ?>;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("<?= $route_path; ?>", name="<?= $route_name; ?>_")
 */
class <?= $class_name ?> extends Controller
{

    /**
     * @Route("/paginate", name="paginate")
     */
    public function paginateAction(Request $request)
    {
        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
        'query' => $search['value']
        ];

        $em = $this->getDoctrine();
        $items = $em->getRepository(<?= $entity_class_name; ?>::class)->paginate($filters , $start, $length);

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($em->getRepository(<?= $entity_class_name; ?>::class)->paginate($filters , 0, null)),
            'recordsTotal' => count($em->getRepository(<?= $entity_class_name; ?>::class)->paginate(null , 0, null))
        );

        /** @var Ficheclient $item */
        foreach ($items as $item) {
            $output['data'][] = [
                /* Complete the code here... whats fields you want to return */

            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/", name="index")
     *
     * @return Response
     */
    public function index()
    {
        $<?= $entity_var_plural; ?> = $this->getDoctrine()
            ->getRepository(<?= $entity_class_name; ?>::class)
            ->findAll();

        return $this->render('<?= $route_name; ?>/index.html.twig', ['<?= $entity_var_plural; ?>' => $<?= $entity_var_plural; ?>]);
    }

    /**
     * @Route("/new", name="new")
     * @Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $<?= $entity_var_singular; ?> = new <?= $entity_class_name; ?>();
        $form = $this->createForm(<?= $form_class_name; ?>::class, $<?= $entity_var_singular; ?>);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($<?= $entity_var_singular; ?>);
            $em->flush();

            return $this->redirectToRoute('<?= $route_name; ?>_edit', ['<?= $entity_identifier; ?>' => $<?= $entity_var_singular; ?>->get<?= ucfirst($entity_identifier); ?>()]);
        }

        return $this->render('<?= $route_name; ?>/new.html.twig', [
            '<?= $entity_var_singular; ?>' => $<?= $entity_var_singular; ?>,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{<?= $entity_identifier; ?>}", name="show")
     * @Method("GET")
     */
    public function show(<?= $entity_class_name; ?> $<?= $entity_var_singular; ?>)
    {
        return $this->render('<?= $route_name; ?>/show.html.twig', [
            '<?= $entity_var_singular; ?>' => $<?= $entity_var_singular; ?>,
        ]);
    }

    /**
     * @Route("/{<?= $entity_identifier; ?>}/edit", name="edit")
     * @Method({"GET", "POST"})
     */
    public function edit(Request $request, <?= $entity_class_name; ?> $<?= $entity_var_singular; ?>)
    {
        $form = $this->createForm(<?= $form_class_name; ?>::class, $<?= $entity_var_singular; ?>);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('<?= $route_name; ?>_edit', ['<?= $entity_identifier; ?>' => $<?= $entity_var_singular; ?>->get<?= ucfirst($entity_identifier); ?>()]);
        }

        return $this->render('<?= $route_name; ?>/edit.html.twig', [
            '<?= $entity_var_singular; ?>' => $<?= $entity_var_singular; ?>,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{<?= $entity_identifier; ?>}", name="delete")
     * @Method("DELETE")
     */
    public function delete(Request $request, <?= $entity_class_name; ?> $<?= $entity_var_singular; ?>)
    {
        if (!$this->isCsrfTokenValid('delete'.$<?= $entity_var_singular; ?>->get<?= ucfirst($entity_identifier); ?>(), $request->request->get('_token'))) {
            return $this->redirectToRoute('<?= $route_name; ?>_index');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($<?= $entity_var_singular; ?>);
        $em->flush();

        return $this->redirectToRoute('<?= $route_name; ?>_index');
    }
}
