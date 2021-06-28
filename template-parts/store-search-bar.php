<?php
/*
 * Displays the search bar to the store section
 */

?>


<form>

  <div class="search-bar-container">

    <input id="product-search-bar" type="text" onkeyup="productKeywordFetch()" />

    <svg class="search-icon-container" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path class="search-icon" d="M15.6082 13.718L12.4434 10.5532C13.1619 9.47608 13.5808 8.18207 13.5808 6.79045C13.5808 3.04 10.5408 0 6.79041 0C3.03998 0 0 3.04 0 6.79045C0 10.5409 3.03998 13.5809 6.79041 13.5809C8.18202 13.5809 9.47601 13.162 10.5531 12.4435L13.7179 15.6083C13.9789 15.8693 14.321 16 14.663 16C15.0051 16 15.3472 15.8693 15.6082 15.6083C16.1306 15.0863 16.1306 14.24 15.6082 13.718ZM2.67372 6.79045C2.67372 4.52032 4.52029 2.67374 6.79041 2.67374C9.06052 2.67374 10.9071 4.52032 10.9071 6.79045C10.9071 9.06058 9.06052 10.9072 6.79041 10.9072C4.52029 10.9072 2.67372 9.06058 2.67372 6.79045Z" />
    </svg>
    
    <div class="search-options-container"></div>

  </div>

</form>