it('loads page', () => {
  cy.visit('https://dropmefiles.com/BfzN5')
  cy.wait(1000)
  //cy.get('.fileDownload').click({force: true})
  //cy.location()
  //var href = DSERVERURL+'/dl/'+UPLOADID+'/'+$(this).attr('id');

  cy.get('.fileDownload').should('have.attr', 'id')
  https://drop5.dmf.link/dl/BfzN5/811180628

 // cy.window().then((win) => {
 // console.log(win.location)
//})
//  cy.wait(1000)
//  cy.get('.downnload_bt').click()

//  cy.contains('Hi there')
})
