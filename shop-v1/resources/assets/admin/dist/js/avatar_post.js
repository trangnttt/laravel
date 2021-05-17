jQuery(document).on("click", ".browse", function() {
  var file = jQuery(this).parents().find(".file");
  file.trigger("click");
});
jQuery('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  jQuery("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});