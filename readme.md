Drupal training skeleton projects.

# Pulling in changes

To pull in changes from other developers, first make sure you do not have any configuration that only exists in your database. If you do you need to commit or stash those configuration exports.

To pull in changes on the main branch run:

  - `git pull origin master`
  - `ahoy update`

This will pull changes and run the install and import scripts for composer and configuration management.
