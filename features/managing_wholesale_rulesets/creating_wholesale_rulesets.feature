@managing_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript
  Scenario: Global Wholesale Ruleset
    When I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Create"
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Global" for "Scope"
    Then I should see "This ruleset will apply to all products."
