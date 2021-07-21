<?php
namespace Drupal\skeleton\Breadcrumb;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * A breadcrumb builder for the canonical route of skeleton sandbox.
 */
class SkeletonBreadcrumbBuilder implements BreadcrumbBuilderInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $attributes) {
    return \Drupal::routeMatch()->getRouteName() == 'skeleton.playground_controller_sandbox';
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();
    $url = Url::fromUserInput('/skeleton/sandbox');
    $link = Link::fromTextAndUrl('Profiles', $url);
    $breadcrumb->addLink($link);

    if (!empty($_GET['user'])) {
      $breadcrumb->addlink(Link::createFromRoute($_GET['user'], '<nolink>'));
    }

    $breadcrumb->addCacheContexts(['route']);
    return $breadcrumb;
  }

}
