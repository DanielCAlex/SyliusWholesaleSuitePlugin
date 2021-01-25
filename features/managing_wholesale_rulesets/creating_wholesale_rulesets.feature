@managing_wholesale_rulesets @creating_wholesale_rulesets
Feature: Creating wholesale rulesets
  In order to have the customer adhere to wholesale business rules
  As an administrator
  I need to be able to add wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript
  Scenario: Selecting the name and description of the ruleset
    When I go to the create Wholesale Ruleset page
    And I fill ruleset name with "Behat Ruleset 1"
    And I fill the ruleset description with "This is the first ruleset behat added."
