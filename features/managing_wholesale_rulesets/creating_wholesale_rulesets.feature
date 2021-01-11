@managing_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator
    And I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Create"

  @ui @javascript @selecting_scope
  Scenario: Selecting Global scope
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Global" from "Scope"
    Then I should see "This ruleset will apply to ALL products."
    And I should not see "Choose Ruleset Taxonomies"

  @ui @javascript @selecting_scope
  Scenario: Selecting Product Taxonomy scope
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Product Taxonomy" from "Scope"
    Then I should see "Choose Ruleset Taxonomies"
    And I should see "This ruleset will apply to products under the chosen taxonomies."

  @ui @javascript @selecting_scope
  Scenario: Selecting Product scope
    When I visit the page "skyboundtech_admin_wholesale_ruleset_create"
    And I select "Product" from "Scope"
    Then I should see "Choose Ruleset Products"
    And I should see "This ruleset will apply to the chosen products."
