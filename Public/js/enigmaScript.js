$(document).ready(function () {
  $(".sidenav").sidenav(); // Menu latéral
  $(".materialboxed").materialbox(); // Zoom des images
  $(".carousel").carousel({
    fullWidth: true,
  });
});

/* SYSTEME DE NOTATION PAR ETOILES*/
$(document).ready(function () {
  /* Etoiles au survol */
  $("#stars li")
    .on("mouseover", function () {
      var onStar = parseInt($(this).data("value"), 10); // Etoile survolée

      // Colorer les étoiles qui sont après celle survolée
      $(this)
        .parent()
        .children("li.star")
        .each(function (e) {
          if (e < onStar) {
            $(this).addClass("hover");
          } else {
            $(this).removeClass("hover");
          }
        });
    })
    .on("mouseout", function () {
      $(this)
        .parent()
        .children("li.star")
        .each(function (e) {
          $(this).removeClass("hover");
        });
    });

  /* Etoile sélectionnée */
  $("#stars li").on("click", function () {
    var onStar = parseInt($(this).data("value"), 10); // Etoile sélectionnée
    var stars = $(this).parent().children("li.star");

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass("selected");
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass("selected");
    }
    $("#idNote").val(onStar); // met la note dans l input
  });
});

function showDiscuter() {
  document.getElementById("discuter").style.display = "none";
  document.getElementById("tirer").style.display = "none";
  document.getElementById("fuire").style.display = "block";
  document.getElementById("saloon").style.display = "block";
  document.getElementById("madalton").style.display = "block";
  document.getElementById("disscuss").style.display = "block";
}

function showTirer() {
  document.getElementById("discuter").style.display = "none";
  document.getElementById("tirer").style.display = "none";
  document.getElementById("fuire").style.display = "block";
  document.getElementById("lasso1").style.display = "block";
  document.getElementById("désarmer").style.display = "block";
  document.getElementById("capture").style.display = "block";
}

function showDesarmer() {
  document.getElementById("lasso1").style.display = "none";
  document.getElementById("désarmer").style.display = "none";
  document.getElementById("fuire").style.display = "none";
  document.getElementById("fuire").style.display = "block";
  document.getElementById("lasso1").style.display = "block";

  document.getElementById("Lelasso").style.display = "block";
}
