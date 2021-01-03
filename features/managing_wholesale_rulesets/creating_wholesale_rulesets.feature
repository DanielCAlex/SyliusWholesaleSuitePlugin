@managing_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript
  Scenario: Global scope Wholesale Ruleset
    When I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Create"
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Global" from "Scope"
    Then I should see "This ruleset will apply to ALL products."

  @ui @javascript
  Scenario: Product Taxonomy scope Wholesale Ruleset
    When I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Create"
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Product Taxonomy" from "Scope"
    Then I should see "Choose Product Taxonomies"
    And I should see "This ruleset will apply to products under the chosen product taxanomies."
