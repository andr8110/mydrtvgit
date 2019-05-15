describe('My First Test', function() {
    it('DRTV frontpage', function() {
      cy.visit('http://localhost/mydrtv/mydrtvgit/login.php')

      cy.contains('Login').click()

      cy.url().should('include', 'index')
    })
  })