<?php

namespace Drupal\skeleton\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class PlaygroundController.
 */
class PlaygroundController extends ControllerBase {

  /**
   * Sandbox.
   *
   * @return string
   *   Return Hello string.
   */
  public function sandbox() {

    $profiles = $this->getProfiles();

    $profile = FALSE;
    if (!empty($_GET['user'])) {
      $profile = $this->getProfileFromUsername($_GET['user']);
    }

    if ($profile) {
      return [
        '#theme' => 'playground_profile',
        '#profile' => $profile,
        '#title' => "{$profile['first_name']} {$profile['last_name']}'s Profile Page",
      ];
    }

    return [
      '#theme' => 'playground_home',
      '#profiles' => $profiles['profiles'],
      '#title' => 'Profiles',
    ];

  }

  /**
   * Gets profile by username.
   *
   * @param string $username
   *   Username of user.
   *
   * @return bool|array
   *   False or the profile array.
   */
  private function getProfileFromUsername(string $username) {
    $database = $this->getProfiles();
    if (!empty($database['profiles'][$username])) {
      return $database['profiles'][$username];
    }

    return FALSE;
  }

  /**
   * Returns profiles data.
   *
   * @return array
   *   Profiles.
   */
  private function getProfiles() {
    return [
      "profiles" => [
        'mrconnerton' => [
          "title" => "Mr.",
          "first_name" => "Matt",
          "last_name" => "Connerton",
          "bio" => "Matthew Connerton is the coolest guy that knows Drupal.",
          "friends" => [
            "yomammaslover",
            "libmaster2000",
            "SteveYoung",
          ],
        ],
        'libmaster2000' => [
          "first_name" => "Matt",
          "last_name" => "Libby",
          "bio" => "Libby knows how to solder!",
          "friends" => [
            "libmaster2000",
            "mrconnerton",
          ],
        ],
        'yomammaslover' => [
          "first_name" => "Jeff",
          "last_name" => "Chicoine",
          "bio" => "Mr Chicoine has a PHD in Coins.",
          "friends" => [
            "libmaster2000",
            "mrconnerton",

          ],
        ],
        'stevetheman' => [
          "first_name" => "Steve",
          "last_name" => "Young",
          "bio" => "I like turtles.",
          "friends" => [
            "libmaster2000",
            "yomammaslover",
            "mrconnerton",
          ],
        ],
      ],
    ];
  }

  /**
   * Helper Debug.
   */
  private function debug($var) {
    print '<pre>' . print_r($var, TRUE) . '</pre>';
  }

}
