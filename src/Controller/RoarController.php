<?php


namespace Drupal\dino_roar\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class RoarController extends ControllerBase
{

  /**
   * @var RoarGenerator
   */
  private  $roarGenerator;

  public function __construct(RoarGenerator $roarGenerator)
  {
    $this->roarGenerator = $roarGenerator;
  }

  public function roar(): Response
  {
    $roar = "ROAAAAAAR";
    return new Response($roar);
  }

  public function generatedRoar($count): Response
  {
    $roar = $this->roarGenerator->generateWithDeKnpManier($count);
    return new Response($roar);
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('dino_roar.dino_says.roar_generator')
    );
  }


}
