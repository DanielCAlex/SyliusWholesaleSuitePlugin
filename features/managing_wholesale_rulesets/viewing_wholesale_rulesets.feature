@managing_wholesale_rulesets
Feature: Viewing wholesale rulesets in a list.
  In order to manage the wholesale rulesets in the shop
  As an administrator
  I should be able to see a filterable grid of wholesale rulesets

  Background:
    Given I am logged in as an administrator
    And the following wholesale rulesets exist
      | name      | type          | scope  | description                    |
      | ruleset 1 | Quantity Step | Global | This is an example description |

  @ui @javascript
  Scenario: Entering the wholesale ruleset management page
    When I go to the wholesale rulesets list
    Then I should see "Manage Rules"
