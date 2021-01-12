@managing_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript
  Scenario: Create Wholesale Ruleset page exists


  @ui @javascript @selecting_scope @global_scope
  Scenario: Selecting Global scope
    When I go to the create Wholesale Ruleset page
    And I select the scope "Global"
    Then I should see "This ruleset will apply to ALL products."
    And I should not see "Choose Ruleset Taxonomies"

  @ui @javascript @selecting_scope @taxonomy_scope
  Scenario: Selecting Product Taxonomy scope
    When I go to the create Wholesale Ruleset page
    And I select the scope "Product Taxonomy"
    Then I should see "Choose Ruleset Taxonomies"
    And I should see "This ruleset will apply to products under the chosen taxonomies."

  @ui @javascript @selecting_scope @product_scope
  Scenario: Selecting Product scope
    When I go to the create Wholesale Ruleset page
    And I select the scope "Product"
    Then I should see "Choose Ruleset Products"
    And I should see "This ruleset will apply to the chosen products."

  @ui @javascript @selecting_scope @productvariant_scope
  Scenario: Selecting Product Variant scope
    When I go to the create Wholesale Ruleset page
    And I select the scope "Product Variant"
    Then I should see "Choose Product Variants"
    And I should see "This ruleset will apply to the chosen product variants."
