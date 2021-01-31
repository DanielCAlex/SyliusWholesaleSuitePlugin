@managing_wholesale_rulesets
Feature: Creating wholesale rules
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rules within rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript @rules
  Scenario: Admin adds a Quantity Step Rule by Taxonomy
    When I go to the create Wholesale Ruleset page
    And I fill rule name with "Behat Product Taxonomy Rule 1"
    And I fill the rule description with "This is the first Product Taxonomy behat created"
    And I choose the rule scope "Taxonomy"
    Then I should see "This rule will apply to selected taxonomies."
