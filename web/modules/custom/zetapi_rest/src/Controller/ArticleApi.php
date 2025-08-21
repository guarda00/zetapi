<?php
declare(strict_types=1);

namespace Drupal\zetapi_rest\Controller;

use Drupal\Core\Controller\ControllerBase;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Zetapi Rest routes.
 */
final class ArticleApi extends ControllerBase {

  /**
   * El servicio de logger.
   */
  protected LoggerInterface $logger;

  /**
   * Constructor.
   */
  public function __construct(LoggerInterface $logger) {
    $this->logger = $logger;
  }

  /**
   * Método create() para que Drupal inyecte el servicio.
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('logger.factory')->get('zetapi_rest')
    );
  }

  /**
   * Builds the response.
   *
   * @return array<string, mixed>
   *   Render array for the page.
   */
  public function __invoke(): array {
    $this->logger->info('ArticleApi endpoint accessed.');

    $build = [];
    $build['content'] = [
      '#markup' => $this->t('It works!'),
      '#type' => 'item',
    ];

    return $build;
  }

}
