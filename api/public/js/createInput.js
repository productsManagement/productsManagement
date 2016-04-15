(function($) {
  /*
    Input:
    - place: element to append
    - name: div of inputs number id's name
  */
  $.fn.createInput = function(place, name) {
    var val = place.val();
    var divAppend = '';
    $('#' + name).remove();
    for (var i = 0; i < val; i++) {
      var inputHtml = "<div class='form-inline'><label></label><input class='form-control' type='text' name='value" + i +
        "'/><button type='button' class='removeInput btn btn-default'>Remove</button></div>";
      divAppend += inputHtml;
    }
    divAppend = "<div class='container' id='" + name + "'>" + divAppend + "</div>";
    place.after(divAppend);
    $('.removeInput').on('click', function() {
      $(this).parent().remove();
      place.val(place.val() - 1);
    })
  };

}(jQuery));