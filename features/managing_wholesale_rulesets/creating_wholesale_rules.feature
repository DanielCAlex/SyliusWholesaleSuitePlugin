@managing_wholesale_rulesets
Feature: Creating wholesale rules
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rules within rulesets

  Background:
    Given the store operates on a single channel in "United States"
    And the store classifies its products as "Funny", "Happy" and "Jump"
    And the store has a product "White Shirt"
    And I am logged in as an administrator
    And I am using "English (United States)" locale for my panel

  @ui @javascript @rule @by_taxon
  Scenario: Admin adds a Quantity Step Rule by Taxonomy
    When I go to the create Wholesale Ruleset page
    And I fill ruleset name with "Testing Creation of Rules by Taxonomy"
    And I fill the ruleset description with "Taxon quantity step rule."
    And I click the add rule button for the Quantity Step Rules by Taxonomy tab
    Then I should see "These rules will apply to their selected taxonomies."
    And I fill rule name with "Behat Quantity Step Rule By Taxonomy Rule 1"
    And I fill the rule description with "This is the first quantity step rule by taxonomy created by Behat."
    And I fill in "Set Quantity" with "10"
    And I should see "Select taxonomies"
    And I add the quantity step rule taxon "Funny"
    And I enable the taxon quantity step rule
    And I add it
    Then I should be notified that it has been successfully created

  @ui @javascript @rule
  Scenario: Admin adds a Quantity Step Rule by Product
    When I go to the create Wholesale Ruleset page
    And I fill ruleset name with "Testing Creation of Rules by Taxonomy"
    And I fill the ruleset description with "Taxon quantity step rule."
    And I click the add rule button for the Quantity Step Rules by Product tab
    Then I should see "These rules will apply to their selected products."
    And I fill rule name with "Behat Quantity Step Rule By Product Rule 1"
    And I fill the rule description with "This is the first quantity step rule by product created by Behat."
    And I should see "Select products"
    And I add the quantity step rule product "White Shirt"
    And I enable the product quantity step rule
    And I add it
    Then I should be notified that it has been successfully created
#
#  @ui @javascript @rule
#  Scenario: Admin adds a Quantity Step Rule by Product Variant
#    When I go to the create Wholesale Ruleset page
#    And I click the add rule button for the Quantity Step Rules by Product Variant tab
#    Then I should see "These rules will apply to the products variants you choose."
#    And I fill rule name with "Behat Quantity Step Rule By Product Rule 1"
#    And I fill the rule description with "This is the first quantity step rule by product variant created by Behat."
#    And I should see "Select Product Variants"
