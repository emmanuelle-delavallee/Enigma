$(document).ready(function () {
  /* SYSTEME DE NOTATION PAR ETOILES*/
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

  /*CONTROLE DES CHAMPS DU FORMULAIRE DES COMMENTAIRES*/
  $("#comment_title").change(function () {
    modifyBtn();
  });

  $("#comment-textarea").change(function () {
    modifyBtn();
  });
  $("#comment_title").keyup(function () {
    modifyBtn();
  });

  $("#comment-textarea").keyup(function () {
    modifyBtn();
  });

  $("#idNote").change(function () {
    modifyBtn();
  });

  $("#idNote").click(function () {
    modifyBtn();
  });

  /*ABLE/DISABLE BTN POST COMMENT*/
  function modifyBtn() {
    var title = $("#comment_title").val();
    var textarea = $("#comment-textarea").val();
    var note = $("#idNote").val();

    var titlelenght = title.length;
    var textarealength = textarea.length;
    var notelength = note.length;

    if (titlelenght < 1 || textarealength < 1 || notelength < 1) {
      event.preventDefault();
      $("#comment-form-btn").addClass("disabled");
    } else {
      $("#comment-form-btn").removeClass("disabled");
    }
  }

  /* AFFICHAGE MESSAGES D'ERREURS / DE SUCCES*/
  setTimeout(function () {
    $(".success-message").fadeOut("slow");
    $(".error-message").fadeOut("slow");
  }, 2000);

  /* AFFICHER/MASQUER DETAIL ADMIN DASHBOARD*/
  $("#stats-up").click(function () {
    $("#stats-up-icon").text(
      $("#stats-up-icon").text() == "arrow_drop_up"
        ? "arrow_drop_down"
        : "arrow_drop_up"
    );
    $(".stats-slide-hide").slideToggle();
  });

  $("#comments-up").click(function () {
    $("#comments-up-icon").text(
      $("#comments-up-icon").text() == "arrow_drop_up"
        ? "arrow_drop_down"
        : "arrow_drop_up"
    );
    $(".comments-slide-hide").slideToggle();
  });

  $("#admins-up").click(function () {
    $("#admins-up-icon").text(
      $("#admins-up-icon").text() == "arrow_drop_up"
        ? "arrow_drop_down"
        : "arrow_drop_up"
    );
    $(".admins-slide-hide").slideToggle();
  });

  /*MENU LATERAL*/
  $(".sidenav").sidenav();

  /*ZOOM DES IMAGES*/
  $(".materialboxed").materialbox();

  /*CAROUSEL*/
  $(".carousel").carousel({
    fullWidth: true,
  });
});
/* AFFICHE OU DESAFFICHE BTN SELON LES CHOIX DE L'UTILISATEUR */
function showDiscuter() {
  var elmts = document.getElementsByClassName("premier");
  for (var i = 0; i < elmts.length; i++) {
    elmts[i].style.display = "none";
  }
  var elmts2 = document.getElementsByClassName("discuter");
  for (var i = 0; i < elmts2.length; i++) {
    elmts2[i].style.display = "block";
  }
}

function showTirer() {
  var elmts = document.getElementsByClassName("premier");
  for (var i = 0; i < elmts.length; i++) {
    elmts[i].style.display = "none";
  }
  var elmts2 = document.getElementsByClassName("tirer");
  for (var i = 0; i < elmts2.length; i++) {
    elmts2[i].style.display = "block";
  }
}

function showDesarmer() {
  var elmts = document.getElementsByClassName("tirer");
  for (var i = 0; i < elmts.length; i++) {
    elmts[i].style.display = "none";
  }
  var elmts2 = document.getElementsByClassName("désarmer");
  for (var i = 0; i < elmts2.length; i++) {
    elmts2[i].style.display = "block";
  }
}

/* SUPPRIME UN ADMIN ET REFRESH UNIQUEMENT LA SECTION ADMIN DE ADMINDASHBOARD */
function SuppEtRefresh(id) {
  $.ajax({
    url: "admin-" + id + "-deleted",
    success: function (result) {
      $("#reloadableContainer").load(
        "View/backend/adminDashboard.php #reloadableContent"
      );
    },
  });
}

/* VALIDE UN COM ET REFRESH UNIQUEMENT LA SECTION COM DE ADMINDASHBOARD */
function ValidComEtRefresh(id) {
  $.ajax({
    url: "comment-" + id + "-validated",
    success: function (result) {
      $("#reloadableContainerCom").load(
        "View/backend/adminDashboard.php #reloadableContentCom"
      );
    },
  });
}

/* SUPPRIME UN COM ET REFRESH UNIQUEMENT LA SECTION COM DE ADMINDASHBOARD */
function SuppComEtRefresh(id) {
  $.ajax({
    url: "comment-" + id + "-deleted",
    success: function (result) {
      $("#reloadableContainerCom").load(
        "View/backend/adminDashboard.php #reloadableContentCom"
      );
    },
  });
}
