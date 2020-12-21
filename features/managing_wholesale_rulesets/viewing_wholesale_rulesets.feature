@managing_wholesale_rulesets
Feature: Viewing wholesale rulesets in a list.
  In order to manage the wholesale rulesets in the shop
  As an administrator
  I should be able to see a filterable grid of wholesale rulesets

  Background:
    Given I am logged in as an administrator
    And the following wholesale rulesets exist
      | name      | type           | scope  | description                                        | isEnabled |
      | Ruleset 1 | Quantity Step  | Global | Make sure your customer orders in sets             | true      |
      | Ruleset 2 | Tiered Pricing | Global | Pricing based on dollar or quantity amount         | false     |
      | Ruleset 3 | MinMaxAmount   | Global | Make sure the customer doesn't buy too much/little | true      |
      | Ruleset 4 | Back Orders    | Global | Can the customer order if out of stock             | false     |

  @ui @javascript
  Scenario: Entering the wholesale ruleset management page
    When I go to the wholesale rulesets list
    Then I should see "Manage Rules"
