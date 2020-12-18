@managing_wholesale_rulesets
Feature: Viewing wholesale rulesets in a list.
  In order to manage the wholesale rulesets in the shop
  As an administrator
  I should be able to see a filterable grid of wholesale rulesets

  Background:
    Given I am logged in as an administrator
    And the administrator menu has a "Wholesale Purchase Rules" section

  @ui @javascript
  Scenario: Entering the wholesale ruleset management page
    When I go the "Wholesale Purchase Rules" page in the administrator menu
    Then I should see "Manage Wholesale Purchase Rules"
