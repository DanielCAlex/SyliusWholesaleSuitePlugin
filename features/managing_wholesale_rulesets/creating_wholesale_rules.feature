@managing_wholesale_rulesets
Feature: Creating wholesale rules
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rules within rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript @rule
  Scenario: Admin adds a Quantity Step Rule by Taxonomy
    When I go to the create Wholesale Ruleset page
    And I click the add rule button for the Quantity Step Rules by Taxonomy tab
    Then I should see "These rules will apply to their selected taxonomies."
    And I fill rule name with "Behat Quantity Step Rule By Taxonomy Rule 1"
    And I fill the rule description with "This is the first quantity step rule by taxonomy created by Behat."
    And I should see "Select taxonomies"

#  @ui @javascript @rule
#  Scenario: Admin adds a Quantity Step Rule by Product
#    When I go to the create Wholesale Ruleset page
#    And I click the add rule button for the Quantity Step Rules by Product tab
#    Then I should see "These rules will apply to the products you choose."
#    And I fill rule name with "Behat Quantity Step Rule By Product Rule 1"
#    And I fill the rule description with "This is the first quantity step rule by product created by Behat."
#    And I should see "Select Products"
#
#  @ui @javascript @rule
#  Scenario: Admin adds a Quantity Step Rule by Product Variant
#    When I go to the create Wholesale Ruleset page
#    And I click the add rule button for the Quantity Step Rules by Product Variant tab
#    Then I should see "These rules will apply to the products variants you choose."
#    And I fill rule name with "Behat Quantity Step Rule By Product Rule 1"
#    And I fill the rule description with "This is the first quantity step rule by product variant created by Behat."
#    And I should see "Select Product Variants"
