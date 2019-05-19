describe('Test 3', function () {
  it('DRTV Login Page', function () {

    // Goes to login page
    cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

    // Clicks on button containing text "Login" and tries redirecting to new page
    cy.contains('Login').click()

    // Checks that new page contains "index.php" in url and redirects if so
    cy.url().should('include', 'index.php')

    // Clicks on button with class "profileButton" and opens sidebar
    cy.get('.profileButton').click()

    // Clicks on button with id "recommendedMovie" and tries redirecting to new page
    cy.get('#recommendedMovie').click()

    // Checks that new page contains "videoplayer.php" in url and redirects if so
    cy.url().should('include', 'videoplayer.php')

    // Clicks on button with id "btnPlayPause" and movie starts
    cy.get('#btnPlayPause').click()

    // Checks off star rating containing the value "4"
    cy.get('[type="radio"]').check(['4'])

    // Clicks on rating text area with id "#addComment", types "This is an amazing movie!" and checks if typed value is correct
    cy.get('#addComment')
      .type('This is an amazing movie!')
      .should('have.value', 'This is an amazing movie!')

    // Clicks on button with id "submitComment" and submits and shows comment on website
    cy.get('#submitComment').click()
  })
})