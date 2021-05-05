const navbarPrimaryToggler = document.getElementById('navbar-primary-toggler')
const navbarPrimaryBodyContainer = document.getElementById('navbar-primary-body-container')

navbarPrimaryToggler.addEventListener('click', () => {
  navbarPrimaryBodyContainer.classList.toggle('open')
} )