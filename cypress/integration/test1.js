describe('Test 1', function () {
  it('DRTV Login Page', function () {

    // Goes to login page
    cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

    // Clicks on button containing text "Login" and tries redirecting to new page
    cy.contains('Login').click()

    // Checks that new page contains "index.php" in url and redirects if so
    cy.url().should('include', 'index.php')

    // Clicks on link containing "Programmer" and tries redirecting to new page
    cy.contains('Programmer').click()

    // Checks that new page contains "programmer.php" in url and redirects if so
    cy.url().should('include', 'programmer.php')

    // Clicks on input field containing ".form-control", types "disney" and checks if typed value is correct
    cy.get('.form-control')
      .type('disney')
      .should('have.value', 'disney')

    // Clicks on button containing text "Find nu" and tries redirecting to new page
    cy.contains('Find nu').click()

    /*
    // Checks that new page contains "search.php" in url and redirects if so
    cy.url().should('include', 'search.php')

    // Clicks on button containing text "Se Film" and starts movie
    cy.contains('Se Film').click()

    // Checks that new page contains "videoplayer.php" in url and redirects if so
    cy.url().should('include', 'videoplayer.php')

    // Clicks on button containing text "Play" and starts movie
    cy.contains('Play').click()
    */

  })
})