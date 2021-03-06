describe('Test 2', function () {
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

        // Checks off checkbox containing the value "Horror" and filters the movies
        cy.get('[type="checkbox"]').check(['horror'])

        // Clicks on button with id "0" and tries redirecting to new page
        cy.get('#0').click()

        // Checks that new page contains "videoplayer.php" in url and redirects if so
        cy.url().should('include', 'videoplayer.php')

        // Clicks on button containing text "Play" and starts movie
        cy.get('#btnPlayPause').click()
    })
})