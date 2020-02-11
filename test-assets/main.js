$(function() {
  $(".submit").click(function(e) {
    e.preventDefault();
    $(".loading").css("display", "flex");
    setTimeout(() => {
      check();
      $(".loading").hide();
    }, 1000);
  });

  function check() {
    let score = 0;
    for (let i = 1; i <= 8; i++) {
      // for select statements

      let element = "#select" + i;
      if ($(element).val() == 1) {
        $("#s" + i).html(
          '<i class="fa fa-check right-ans" aria-hidden="true" ></i>'
        );
        score++;
      } else {
        $("#s" + i).html(
          '<i class="fa fa-times wrong-ans" aria-hidden="true" ></i>'
        );
      }
    }

    // for input elements
    let ex = [
      "vibrant",
      "polar-opposite",
      "grainy picture",
      "adamant",
      "imagery hovering"
    ];
    for (let i = 9; i <= 13; i++) {
      let element = "#ex" + i;

      if (
        $(element)
          .val()
          .toLowerCase() == ex[9 - i]
      ) {
        $("#s" + i).html(
          '<i class="fa fa-check right-ans" aria-hidden="true" ></i>'
        );
        score++;
      } else {
        $("#s" + i).html(
          '<i class="fa fa-times wrong-ans" aria-hidden="true" ></i>'
        );
      }
    }

    $(".score").html("Your score is " + score);
  }

  $(".left-help").click(function() {
    $(".left-help").hide();
    $(".right").show();
    $(".right-help").show();
  });

  $(".right-help").click(function() {
    $(".left-help").show();
    $(".right").hide();
    $(".right-help").hide();
  });

  function startTimer(duration, display) {
    var timer = duration,
      minutes,
      seconds;
    let test = setInterval(function() {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.text(minutes + ":" + seconds);

      if (--timer < 0) {
        // timer = duration;
        console.log("reached");
        clearInterval(test);
      }
    }, 1000);
  }

  // var fiveMinutes = 15,
  //   display = $("#time");
  // startTimer(fiveMinutes, display);

  $(".test-sound-btn").click(function() {
    let value = $(this).val();
    let new_value = value == "Play Sound" ? "Stop Sound" : "Play Sound";
    let action = value == "Play Sound" ? "play" : "pause";
    $("#player").trigger(action);
    $(this).val(new_value);
  });

  $("#volume").on("input", function() {
    let value = $(this).val();
    $(this)
      .parent("div")
      .find("audio")[0].volume = value / 100;
  });

  $(".continue").click(function() {
    $(".step-1").hide();
    $(".step-2").show();
  });
  $(".start-test").click(function() {
    $(".test-footer").show();
    $(".step-2").hide();
    $(".step-3").show();
    // $("audio").attr("src", "./assets/audio/section1.mp3");
    $(".fa-pause").trigger("click");

    $("#player").html("");
    $("#player").player("./assets/audio/section1.mp3");
    setTimeout(() => {
      var fiveMinutes = 60 * 5,
        display = $("#time");
      $(".time-block").show();
      startTimer(fiveMinutes, display);
      // $("#player").trigger('play');
    }, 1000);
  });

  // $(".form-btn").click(function(e) {
    // e.preventDefault();
    // let section = $(this).data("section");
    // console.log(section);
    // if (section == 1) {
    //   $(this).data("section", "2");
    //   $("#player .fa-pause").trigger("click");

    //   $("#player").html("");
    //   // $("audio").attr("src", "./assets/audio/section2.mp3");
    //   $("#player").player("./assets/audio/section2.mp3");
    // }
    // if (section == 2) {
    //                     $(this).data("section", "3");
    //                     $(".fa-pause").trigger("click");

    //                     $("#player").html("");
    //                     // $("audio").attr("src", "./assets/audio/section3.mp3");
    //                     $("#player").player("./assets/audio/section3.mp3");
    //                   }
    // if (section == 3) {
    //                     $(this).text("Submit");
    //                     $(this).data("section", "4");
    //                     $(".fa-pause").trigger("click");

    //                     $("#player").html("");
    //                     // $("audio").attr("src", "./assets/audio/section4.mp3");
    //                     $("#player").player("./assets/audio/section4.mp3");
    //                   }
    // console.log(section);
  // });

  // $(" audio").mediaelementplayer({
  //   // Do not forget to put a final slash (/)
  //   pluginPath: "https://cdnjs.com/libraries/mediaelement/",
  //   // this will allow the CDN to use Flash without restrictions
  //   // (by default, this is set as `sameDomain`)
  //   shimScriptAccess: "always"
  //   // more configuration
  // });

  // audiojs.events.ready(function() {
  //   var as = audiojs.createAll();
  // });

  soundManager.setup({
    url: "./assets/simple-audio-player/dist/"
  }); // path to soundmanager2 files

  $(document).ready(function() {
    $("#player").player("./assets/audio/sample-audio.ogg"); // relative path to mp3
  });
  let activeClass = "highlight";

  $(".pag-index").click(function() {
    let index = $(this).data("id");
    let element = $(".qus-index[data-index='" + index + "']");
    if ($(element).hasClass(activeClass)) {
      return;
    } else {
      $(".pag-index").removeClass(activeClass);
      $(".qus-index")
        .parent()
        .removeClass(activeClass);
    }
    $(element)
      .parent()
      .addClass(activeClass);
    setTimeout(() => {
      $(element)
        .parent()
        .removeClass(activeClass);
    }, 1000);
    $(this).addClass(activeClass);
    let parentDiv = $(".test");
  
    $("div.test").animate(
      {
        scrollTop: parentDiv.scrollTop() + element.position().top - 200
      },
      100
    );
   
  });

  $(".move").click(function() {
    let direction = $(this).hasClass("up");
    let element = $(".pagination").find("." + activeClass);
    let activeIndex = element.data("id");

    if (direction && activeIndex == 1) {
      return;
    }
    if (!activeIndex) {
      activeIndex == 1;
    }
    if (direction) {
      activeIndex--;

      $(".pagination")
        .find(".pag-index[data-id='" + activeIndex + "'")

        .trigger("click");
    } else {
      activeIndex++;

      $(".pagination")
        .find(".pag-index[data-id='" + activeIndex + "']")
        .trigger("click");
    }
  });
});
