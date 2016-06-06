Feature: Delete email address stored in database
  In order to have possibility to remove email address
  As a user
  I need to be able to delete email address

  Background:
    Given There are the following emails:
      | ID | Email             |
      | 1  | anna@example.com  |
      | 2  | tom@example.com   |
      | 3  | john@example.com  |

  @cleanDB
  Scenario: Delete all emails
    When I send a DELETE request to "/emails/2"
    Then the response code should be 200
    And the JSON response should match:
    """
    {
      "status": "Email properly removed"
    }
    """
    And email count is equal to "2"