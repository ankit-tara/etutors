jQuery(function() {
  window.addEventListener("beforeunload", function(event) {
    event.returnValue = "Do You want to close reload ?.";
  });

  // create pagination
  let lis = "";
  let arr = [];
  let count = 0;
  jQuery(".qus-input").each(function(index) {
    // console.log(jQuery(this).data('index'))
    let indexid = jQuery(this).data("index");

    if (!arr.includes(indexid)) {
      count = count + 1;
      arr.push(indexid);
      lis += '     <li class="pag-index  " data-id="' + indexid + '">' + count;
    }
  });

  let html = ' <ul class="scroll-section">';
  html += lis;
  html += "</ul>";
  jQuery(".pagination").html(html);

  jQuery(".submit").click(function(e) {
    e.preventDefault();
    jQuery(".loading-test").show();
    setTimeout(() => {
      // check();
      jQuery(".loading-test").hide();
    }, 1000);
  });

  function check() {
    let score = 0;
    for (let i = 1; i <= 8; i++) {
      // for select statements

      let element = "#select" + i;
      if (jQuery(element).val() == 1) {
        jQuery("#s" + i).html(
          '<i class="fa fa-check right-ans" aria-hidden="true" ></i>'
        );
        score++;
      } else {
        jQuery("#s" + i).html(
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
        jQuery(element)
          .val()
          .toLowerCase() == ex[9 - i]
      ) {
        jQuery("#s" + i).html(
          '<i class="fa fa-check right-ans" aria-hidden="true" ></i>'
        );
        score++;
      } else {
        jQuery("#s" + i).html(
          '<i class="fa fa-times wrong-ans" aria-hidden="true" ></i>'
        );
      }
    }

    jQuery(".score").html("Your score is " + score);
  }

  jQuery(".left-help").click(function() {
    jQuery(".left-help").hide();
    jQuery(".right").show();
    jQuery(".right-help").show();
  });

  jQuery(".right-help").click(function() {
    jQuery(".left-help").show();
    jQuery(".right").hide();
    jQuery(".right-help").hide();
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
        
       
        clearInterval(test);
        jQuery(".form-btn").trigger("click");

        alert("Oops!! The time is over.");

      }
    }, 1000);
  }


  jQuery(".test-sound-btn").click(function() {
    let value = jQuery(this).val();
    let new_value = value == "Play Sound" ? "Stop Sound" : "Play Sound";
    let action = value == "Play Sound" ? "play" : "pause";
    jQuery("#player").trigger(action);
    jQuery(this).val(new_value);
  });

  jQuery("#volume").on("input", function() {
    let value = jQuery(this).val();
    jQuery(this)
      .parent("div")
      .find("audio")[0].volume = value / 100;
  });

  jQuery(".continue").click(function() {
    console.log("clicked");
    jQuery(".step-1").hide();
    jQuery(".step-2").show();
  });
  jQuery(".start-test").click(function() {
    jQuery(".test-footer").show();
    jQuery(".step-2").hide();
    jQuery(".step-3").show();
    jQuery(".demo-audio").hide();
    //jQuery("audio").attr("src", "./assets/audio/section1.mp3");
    jQuery(".fa-pause").trigger("click");
jQuery(".form-btn").show();
    jQuery("#player").html("");
    jQuery("#player").player("./assets/audio/section1.mp3");
    setTimeout(() => {
      var fiveMinutes = 60 * 5,
        display = jQuery("#time");
      let seconds = jQuery("#time").data("time");
      startTimer(seconds, display);
      jQuery(".time-block").show();

      //jQuery("#player").trigger('play');
    }, 1000);
  });

  //jQuery(".form-btn").click(function(e) {
  // e.preventDefault();
  // let section =jQuery(this).data("section");
  // console.log(section);
  // if (section == 1) {
  //  jQuery(this).data("section", "2");
  //  jQuery("#player .fa-pause").trigger("click");

  //  jQuery("#player").html("");
  //   //jQuery("audio").attr("src", "./assets/audio/section2.mp3");
  //  jQuery("#player").player("./assets/audio/section2.mp3");
  // }
  // if (section == 2) {
  //                    jQuery(this).data("section", "3");
  //                    jQuery(".fa-pause").trigger("click");

  //                    jQuery("#player").html("");
  //                     //jQuery("audio").attr("src", "./assets/audio/section3.mp3");
  //                    jQuery("#player").player("./assets/audio/section3.mp3");
  //                   }
  // if (section == 3) {
  //                    jQuery(this).text("Submit");
  //                    jQuery(this).data("section", "4");
  //                    jQuery(".fa-pause").trigger("click");

  //                    jQuery("#player").html("");
  //                     //jQuery("audio").attr("src", "./assets/audio/section4.mp3");
  //                    jQuery("#player").player("./assets/audio/section4.mp3");
  //                   }
  // console.log(section);
  // });

  //jQuery(" audio").mediaelementplayer({
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

  jQuery(document).ready(function() {
    jQuery("#player").player("./assets/audio/sample-audio.ogg"); // relative path to mp3
  });
  let activeClass = "highlight";

  jQuery(".pag-index").click(function() {
    let index = jQuery(this).data("id");
    let element = jQuery(".qus-input[data-index='" + index + "']");
     jQuery(".test").hide();
     // console.log(element.parents());
     element.parents(".test").show();
console.log(element)
    if (jQuery(element).hasClass(activeClass)) {
      return;
    } else {
      jQuery(".pag-index").removeClass(activeClass);
      jQuery(".qus-input")
        .parent()
        .removeClass(activeClass);
    }
    jQuery(element)
      .parent()
      .addClass(activeClass);
    setTimeout(() => {
      jQuery(element)
        .parent()
        .removeClass(activeClass);
    }, 1000);
    jQuery(this).addClass(activeClass);
    let parentDiv = element.parents(".pag-qus-sec ");
    // let parentDiv = element.parents(".pag-qus-sec ");
    console.log(parentDiv)
    jQuery(parentDiv).animate(
      {
        scrollTop: parentDiv.scrollTop() + element.position().top - 200
      },
      100
    );
  });

  jQuery(".move").click(function() {
    let direction = jQuery(this).hasClass("up");
    let element = jQuery(".pagination").find("." + activeClass);
    let activeIndex = element.data("id");

    if (direction && activeIndex == 1) {
      return;
    }
    if (!activeIndex) {
      activeIndex == 1;
    }
    if (direction) {
      activeIndex--;

      jQuery(".pagination")
        .find(".pag-index[data-id='" + activeIndex + "']")
        .trigger("click");
    } else {
      activeIndex++;

      jQuery(".pagination")
        .find(".pag-index[data-id='" + activeIndex + "']")
        .trigger("click");
    }
  });



  jQuery(".writing textarea").keyup(function() {
    var characterCount = countWords(jQuery(this).val()),
      current = jQuery(this)
        .siblings("#the-count")
        .find("#current");

    current.text(characterCount);
  });
});

function countWords(str) {
  var matches = str.match(/[\w\d\’\'-]+/gi);
  return matches ? matches.length : 0;
}
// function disableselect(e) {
//   return false
// }

// function reEnable() {
//   return true
// }

// document.onselectstart = new Function ("return false")

// if (window.sidebar) {
//   document.onmousedown = disableselect
//   document.onclick = reEnable
// }

// document.addEventListener('contextmenu', event => event.preventDefault());

jQuery("body").on("paste", function(event) {
  console.log(event.originalEvent.clipboardData.getData("Text").length);
  let text = event.originalEvent.clipboardData.getData("Text");
  if (countWords(text) > 5) {
    alert('You cannot copy more than 5 words')
    event.preventDefault();
  }
});

// jQuery("body").on("keypress", function(event) {
//   if (event.which <= 48 || event.which >= 57) {
//     return false;
//   }
// });

// var words = $(".content")
//   .first()
//   .text()
//   .split(/\s+/);
// var text = words.join("</span> <span>");
// $(".content")
//   .first()
//   .html("<span>" + text + "</span>");
// $("span").on("click", function() {
//   $(this).css("background-color", "red");
// });

// document.getElementsByClassName("highlight").onclick = function() {
//   // Get Selection
  // sel = window.getSelection();
  // if (sel.rangeCount && sel.getRangeAt) {
  //   range = sel.getRangeAt(0);
  // }
  // // Set design mode to on
  // document.designMode = "on";
  // if (range) {
  //   sel.removeAllRanges();
  //   sel.addRange(range);
  // }
  // // Colorize text
  // let color = this.datacolor
  // console.log(color)
  // document.execCommand(color, false, "red");
  // document.execCommand("ForeColor", false, "white");
  // // Set design mode to off
  // document.designMode = "off";
// }

jQuery('.highlight-opt').on('click',function(e){
   let color = $(this).data("color");
   console.log(color);
 highlightSelection(color,'white');
})

function highlightSelection(forcolor,backcolor){
   sel = window.getSelection();
   if (sel.rangeCount && sel.getRangeAt) {
     range = sel.getRangeAt(0);
   }
   // Set design mode to on
   document.designMode = "on";
   if (range) {
     sel.removeAllRanges();
     sel.addRange(range);
   }
   // Colorize text

   document.execCommand("BackColor", false, backcolor);
   document.execCommand("ForeColor", false, forcolor);
   // Set design mode to off
   document.designMode = "off";
}
// context menu

// $(document)
//   .bind("contextmenu", function(event) {
//     event.preventDefault();
//     $("<div class='custom-context-menu'>Custom menu</div>")
//       .appendTo("body")
//       .css({ top: event.pageY + "px", left: event.pageX + "px" });
//   })
//   .bind("click", function(event) {
//     $("div.custom-context-menu").hide();
//   });

        
        $(function() {
        $.contextMenu({
            selector: '.content', 
            callback: function(key, options) {
              if(key == 'highlight'){
                highlightSelection("black", "yellow");
              }
              if (key == "clear") {
                highlightSelection("#76777a", "white");
              }
            },
            items: {
                "highlight": {name: "Highlight", icon: "edit"},
                "clear": {name: "clear", icon: "delete"},
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

        // $('.context-menu-one').on('click', function(e){
        //     console.log('clicked', this);
        // })    
    });