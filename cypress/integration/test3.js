describe('Test 3', function () {
    it('DRTV Login Page', function () {
  
      // Goes to login page
      cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')
  
      // Clicks on button containing text "Login" and tries redirecting to new page
      cy.contains('Login').click()
  
      // Checks that new page contains "index.php" in url and redirects if so
      cy.url().should('include', 'index.php')
  
      // Clicks on button containing text "Login" and tries redirecting to new page
      cy.get('.profileButton').click()

      /*
      // Clicks on button containing text "Login" and tries redirecting to new page
      cy.get('#recommendedMovie').click()
      */
  
    })
  })