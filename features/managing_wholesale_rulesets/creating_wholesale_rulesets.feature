#@managing_wholesale_rulesets @creating_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript @ruleset_info
  Scenario: Admin fills the name and description of the ruleset
    When I go to the create Wholesale Ruleset page
    And I fill ruleset name with "Behat Ruleset 1"
    And I fill the ruleset description with "This is the first ruleset behat added."

  @ui @javascript @ruleset
  Scenario: Admin can see the form tabs for the different types of wholesale rules and their scopes.
    When I go to the create Wholesale Ruleset page
    Then I should see "Quantity Step Rules"
    And I should see "Tiered Pricing Rules"
    And I should see "Minimum-Maximum Purchase Rules"
    And I should see "Backorder Rules"

    When I click the "Quantity Step Rules" tab
    And I should see "Quantity Step Rules by Taxonomy"
    And I should see "Quantity Step Rules by Product"
    And I should see "Quantity Step Rules by Product Variant"

    When I click the "Tiered Pricing Rules" tab
    And I should see "Tiered Pricing Rules by Taxonomy"
    And I should see "Tiered Pricing Rules by Product"
    And I should see "Tiered Pricing Rules by Product Variant"

    When I click the "Minimum-Maximum Purchase Rules" tab
    And I should see "Minimum-Maximum Purchase Rules by Taxonomy"
    And I should see "Minimum-Maximum Purchase Rules by Product"
    And I should see "Minimum-Maximum Purchase Rules by Product Variant"

    When I click the "Backorder Rules" tab
    And I should see "Backorder Rules by Taxonomy"
    And I should see "Backorder Rules by Product"
    And I should see "Backorder Rules by Product Variant"
