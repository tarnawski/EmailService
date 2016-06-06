Feature: Test application
  In order to have possibility to test if application working properly
  As a user
  I need to be able to test application

  Scenario: Test application
    When I send a GET request to "/"
    Then the response code should be 200
    And the JSON response should match:
    """
    {
      "status": "success"
    }
    """
