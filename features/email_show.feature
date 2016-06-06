Feature: Show email address stored in database
  In order to have possibility to show email address
  As a user
  I need to be able to show email address

  Background:
    Given There are the following emails:
      | ID | Email             |
      | 1  | anna@example.com  |
      | 2  | tom@example.com   |
      | 3  | john@example.com  |

  @cleanDB
  Scenario: Get all emails
    When I send a GET request to "/emails"
    Then the response code should be 200
    And the JSON response should match:
    """
    [
      {
        "id":@integer@,
        "email":"@string@"
      },
      {
        "id":@integer@,
        "email":"@string@"
      },
      {
        "id":@integer@,
        "email":"@string@"
      }
    ]
    """

  @cleanDB
  Scenario: Get single email
    When I send a GET request to "/emails/2"
    Then the response code should be 200
    And the JSON response should match:
    """
      {
        "id":@integer@,
        "email":"tom@example.com"
      }
    """