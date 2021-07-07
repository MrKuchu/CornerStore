
// Toggler buttons
const navbarPrimaryToggler = document.getElementById('navbar-primary-toggler')
const navbarPrimaryBodyContainer = document.getElementById('navbar-primary-body')
navbarPrimaryToggler.addEventListener('click', () => {
  navbarPrimaryBodyContainer.classList.toggle('d-block')
} )

const navbarStoreToggler = document.getElementById('navbar-store-toggler')
const navbarStoreBodyContainer = document.getElementById('navbar-store-body')
navbarStoreToggler.addEventListener('click', () => {
  navbarStoreBodyContainer.classList.toggle('d-block')
} )



