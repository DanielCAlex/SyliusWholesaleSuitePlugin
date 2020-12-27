@managing_wholesale_rulesets
Feature: Viewing wholesale rulesets in a list.
  In order to manage the wholesale rulesets in the shop
  As an administrator
  I should be able to see a filterable grid of wholesale rulesets

  Background:
    Given I am logged in as an administrator

  @ui @javascript
  Scenario: Entering the ruleset grid page
    When I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Wholesale Purchase Rulesets"

  @ui @javascript
  Scenario: Entering the ruleset grid page while rulesets already exist
    Given the following wholesale rulesets exist
      | name      | type           | scope  | description                                        | isEnabled |
      | Ruleset 1 | Quantity Step  | Global | Make sure your customer orders in sets             | true      |
      | Ruleset 2 | Tiered Pricing | Global | Pricing based on dollar or quantity amount         | false     |
      | Ruleset 3 | MinMaxAmount   | Global | Make sure the customer doesn't buy too much/little | true      |
      | Ruleset 4 | Back Orders    | Global | Can the customer order if out of stock             | false     |

    When I visit the page "skyboundtech_admin_wholesale_ruleset_index"
    Then I should see "Ruleset 1"
    And I should see "Ruleset 2"
    And I should see "Ruleset 3"
    And I should see "Ruleset 4"
