(function ($) {
  "use strict";

  $(document).ready(function () {
    //console.log(contentoptimizer_globals.is_gutenberg);

    $("body").addClass("contentoptimizer-enabled");

    function contopOverlay(title, description) {
      $("body").append(
        `<div class='contop-overlay'>
          <div class='contop-overlay-inner'>
            <span class='contop-close'>Close</span>
            <div class='contop-load'>
             <img src='${contentoptimizer_globals.plugin_dir}/images/load.gif'/>
            </div>
            <div class='contop-overlay-content'>
              <h2>${title}</h2>
              <p><strong>${description}</strong></p>
              <div class='contop-overlay-content-inner'></div>
              </div>
          </div>
        </div>`
      );
      $("span.contop-close").on("click", function (e) {
        contopoverlayView("close");
      });
      var overlay = document.getElementsByClassName("contop-overlay")[0];
      var overlayinner = document.getElementsByClassName(
        "contop-overlay-inner"
      )[0];

      overlayinner.addEventListener("click", function (e) {
        e.stopPropagation();
      });

      overlay.addEventListener("click", function () {
        contopoverlayView("close");
      });
    }

    contopOverlay();

    function contopoverlayView(view) {
      if (view == "open") {
        $(".contop-overlay").addClass("contop-open");
        $("html,body").css("overflow-y", "hidden");
      }
      if (view == "close") {
        $(".contop-overlay").removeClass("contop-open");
        $("html,body").css("overflow-y", "scroll");
        $(".contop-overlay-content-inner").empty();
      }
    }

    $("#contop-get-reports-btn").on("click", function (e) {
      e.preventDefault();
      contopoverlayView("open");
      contopajaxResults("posts");
    });

    function contopReportlist(data) {
      $(".contop-overlay-content-inner").append(
        "<ul class='contop-list'></ul>"
      );
      const dataParses = JSON.parse(data.body);
      console.log(dataParses);
      var appendText = [];
      for (const dataParse of dataParses) {
        appendText.push(
          "<li class='report-list-item' data-reportid='" +
            dataParse.id +
            "'>" +
            dataParse.title +
            "</li>"
        );
      }
      appendText = appendText.join(" ");
      $("ul.contop-list").append(appendText);
      $(".report-list-item").on("click", function (e) {
        const reportid = $(this).data("reportid");
        let reportbody = dataParses.find((o) => o.id === reportid); // will the real endpoint have all reports content or will i need to grab the single report endpoint here?
        contopAddcontent(reportbody.body);
        //console.log(reportbody.body);
        window.parent.send_to_editor(reportbody.body);
        contopoverlayView("close");
      });
    }

    function contopSinglereport(data) {
      const dataParse = JSON.parse(data.body);
      console.log(dataParse);
      // $("#contop-report-submit-btn").after(
      //   "<p>" + dataParse.id + dataParse.title + "</p>"
      // );
    }

    // tinymce practice

    tinyMCE.init({
      selector: "textarea",
      //mode: "specific_textareas",
      //editor_selector: "wp-editor-area",
      init_instance_callback: function (editor) {
        // timeout after typing stops
        let timeout = null;
        editor.on("keyup", function (e) {
          clearTimeout(timeout);
          timeout = setTimeout(function () {
            console.log("Element changed:", e.target.nodeName);
            contopajaxResults(1); // needs to initate only after a report has been added
          }, 500);
        });
      },
    });
    function contopAddcontent(text) {
      // var myContent = tinymce.get("myTextarea").getContent({ format: "text" });
      // var myContent = tinymce.get("myTextarea").getContent({ format: "raw" });
      //alert(tinyMCE.editors.content.getContent());
      window.tinyMCE.editors.content.setContent(text);
    }

    function contopajaxResults(dataId) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "/wp-json/v1/content-optimizer",
        data: { dataId },
        beforeSend: function () {
          $(".contop-load").show();
        },
        complete: function (data) {
          $(".contop-load").hide();
        },
      })
        .done(function (response) {
          //console.log(response);
          if (dataId == "posts") {
            contopReportlist(response);
          }
          if (dataId == 1) {
            contopSinglereport(response);
          }
        })
        .fail(function (xhr, status, error) {
          var errorMessage = xhr.status + ": " + xhr.statusText;
          console.log("Error - " + errorMessage);
        });
    }
  }); // document ready // ajax inside or outside doc ready?
})(jQuery);
