(function($) {
  "use strict"; // Start of use strict

  // No JS

})(jQuery); // End of use strict

$(document).ready(function() {
  animateButton();
});




function animateButton() {
  setInterval(() => {
    $(".button_sedi_p").toggleClass("button_anim");
    $(".button_sedi_a").toggleClass("button_anim_icon");
  }, 4000);

  
}


