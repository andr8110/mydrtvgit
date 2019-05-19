describe('Test 4', function () {
    it('DRTV Login Page', function () {

        // Goes to login page
        cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

        // Clicks on button containing text "Login" and tries redirecting to new page
        cy.contains('Login').click()

        // Checks that new page contains "index.php" in url and redirects if so
        cy.url().should('include', 'index.php')

        // Clicks on button containing text "Login" and tries redirecting to new page
        cy.get('.profileButton').click()

        // Clicks on button containing text "Login" and tries redirecting to new page
        cy.get('#continueWatchingMovie').click()

        // Checks that new page contains "videoplayer.php" in url and redirects if so
        cy.url().should('include', 'videoplayer.php')

        // Clicks on button containing text "Play" and starts movie
        cy.get('.ytp-large-play-button.ytp-button').click()
/*
        // Checks off star rating containing the value "4"
          cy.get('[type="radio"]').check(['4'])

        // Clicks on rating text area containing "#ratingComment", types "This is an amazing movie!" and checks if typed value is correct
        cy.get('#ratingComment')
        .type('This is an amazing movie!')
        .should('have.value', 'This is an amazing movie!')

        // Clicks on button containing text "Submit comment" and starts movie
        cy.contains('Submit comment').click()
        */
    })
})