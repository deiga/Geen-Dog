document.write("<script type='text/javascript'  src='http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js'></script>");

tryReady = function(time_elapsed) {
  // Continually polls to see if jQuery is loaded.
  if (typeof $ == "undefined") { // if jQuery isn't loaded yet...
    if (time_elapsed <= 5000) { // and we havn't given up trying...
      setTimeout("tryReady(" + (time_elapsed + 200) + ")", 200); // set a timer to check again in 200 ms.
    } else {
      alert("Timed out while loading jQuery.")
    }
  } else {
    // Any code to run after jQuery loads goes here!
    $( init );
  }
}

tryReady(0);

function init() {

  $(document).ready(function() {
    $('a.delete').click(function(e) {
      e.preventDefault();
      var parent = $(this).parent().parent();
      $.post("php/delShow.php", { del: parent.attr("id") },
        function() {
          parent.fadeOut("fast");
        });
    });

    $('.yearLink > a').click(function(event) {
      event.preventDefault();
      var year = $(this).attr('title');
      $('#shows-tbl').load('nayttelyt.php .pretty-tbl', { 'year':  })
    });
  });

}