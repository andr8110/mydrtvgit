describe('Test 2', function () {
    it('DRTV Login Page', function () {

        // Goes to login page
        cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

        // Clicks on button containing text "Login" and tries redirecting to new page
        cy.contains('Login').click()
/*
        // Checks that new page contains "index.php" in url and redirects if so
        cy.url().should('include', 'index.php')

        // Clicks on link containing "Programmer" and tries redirecting to new page
        cy.contains('Programmer').click()

        // Checks that new page contains "programmer.php" in url and redirects if so
        cy.url().should('include', 'programmer.php')

        // Checks off checkbox containing the value "Drama"
        cy.get('[type="checkbox"]').check(['Drama'])
*/



    })
})