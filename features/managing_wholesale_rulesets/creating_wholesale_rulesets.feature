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
    When I follow "Create"
    And I fill in the following:
      | Name        | createdRuleset |
      | Type        | backorder       |
      | Scope       | global          |
      | Description | desc            |
    And I save it
    Then the Wholesale Ruleset "createdRuleset" should appear in the store
    And I should see "Wholesale ruleset has been successfully created."
