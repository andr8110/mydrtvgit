describe('Test 1', function () {
  it('DRTV Login Page', function () {

    // Goes to login page
    cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

    // Clicks on button containing text "Login" and tries redirecting to new page
    cy.contains('Login').click()

    // Checks that new page contains "index.php" in url and redirects if so
    cy.url().should('include', 'index.php')

    // Clicks on input field containing ".form-control", types "disney" and checks if typed value is correct
    cy.get('#txtSearch')
      .type('disney')
      .should('have.value', 'disney')

    // Clicks on button with class ".btnSearch" and tries redirecting to new page
    cy.get('.btnSearch').click()
    
    // Checks that new page contains "search.php" in url and redirects if so
    cy.url().should('include', 'search.php')

    // Clicks on button with id "1" and tries redirecting to new page
    cy.get('#1').click()
  
    // Checks that new page contains "videoplayer.php" in url and redirects if so
    cy.url().should('include', 'videoplayer.php')

    // Clicks on button with id "btnPlayPause" and movie starts
    cy.get('#btnPlayPause').click()
  })
})