
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


// Hero Content margin top
const heroContent = document.getElementById('hero-content')

setHeroContentMarginTop()

window.addEventListener('resize', setHeroContentMarginTop)

function setHeroContentMarginTop() {
  const heroContentHeight = heroContent.clientHeight
  const headerHeight = document.getElementsByTagName('header')[0].clientHeight
  const heroContentMarginTop = (document.documentElement.clientHeight/2) - (heroContentHeight/2) - headerHeight
  if (heroContentMarginTop > 0) {
    heroContent.style.marginTop = `${heroContentMarginTop}px`
  }
}



