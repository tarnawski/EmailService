Feature: Create new email address
  In order to have possibility to add new email address
  As a user
  I need to be able to create new email address

  Background:
    Given There are the following emails:
      | ID | Email             |
      | 1  | anna@example.com  |
      | 2  | tom@example.com   |
      | 3  | john@example.com  |

  @cleanDB
  Scenario: Create new email address
    When I send a POST request to "/emails" with body:
    """
    {
      "email":"alan@example.com"
    }
    """
    Then the response code should be 200
    And the JSON response should match:
    """
    {
      "id":@integer@,
      "email":"alan@example.com"
    }
    """
    And email count is equal to "4"

  @cleanDB
  Scenario: Create new email address with invalid data
    When I send a POST request to "/emails" with body:
    """
    {
      "email":"invalid_email"
    }
    """
    Then the response code should be 200
    And the JSON response should match:
    """
    {
      "status": "Invalid email"
    }
    """
    And email count is equal to "3"