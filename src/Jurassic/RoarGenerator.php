<?php


namespace Drupal\dino_roar\Jurassic;


use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Core\Logger\LoggerChannelFactory;

class RoarGenerator
{

  /**
   * @var LoggerChannelFactory
   */
  private $loggerChannelFactory;
  /**
   * @var KeyValueFactoryInterface
   */
  private $keyValueFactory;

  public function __construct(LoggerChannelFactory $loggerChannelFactory,
                              KeyValueFactoryInterface $keyValueFactory)
  {
    $this->loggerChannelFactory = $loggerChannelFactory;
    $this->keyValueFactory = $keyValueFactory;
  }


  public function generateWithDeKnpManier($arg)
  {
    $key = "roar_".$arg;
    $store = $this->keyValueFactory->get("dino");
    if ($store->has($key)){
      return $store->get($key);
    }
    sleep(30);

    $string =  'R' . str_repeat('O', $arg) . 'AR!';
    $store->set($key, $string);
    return $string;
  }

  public function generate($arg)
  {
    $roar = 'R' . str_repeat('O', $arg) . 'AR!';
    $keyValueStore = $this->keyValueFactory->get('dino');
    if ($keyValueStore->get('dino_roar_other')) {
      $keyValueStore->set('dino_roar_other', $roar);
    }
    $this->loggerChannelFactory->get('default')->debug($roar . "---" . $arg);
    return $roar;
  }
}
