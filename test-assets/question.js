// jQuery(function() {
jQuery("document").ready(function () {
  let separator = "<&&separator&&>";
  let check =
    '<i class="fa fa-check result-icon check" aria-hidden="true"></i>';
  let cross =
    '<i class="fa fa-times result-icon cross" aria-hidden="true"></i>';
  let answers = [];

  let user_answers = [];
  let report = [];

  jQuery(".form-btn").click(function (e) {
    e.preventDefault();
    let test_part = jQuery(this).data("test-part");

    jQuery("audio").each(function () {
      this.pause(); // Stop playing
      this.currentTime = 0; // Reset time
    });
    // var result = confirm("Are you sure you want to submit the test?");
    // if (!result) {
    //   return;
    // }
    let user_input = [];
    let pre_input_num = "";
    let writing_ans_1 =
      test_part == "writing" ? jQuery("#writing-ans-1").val() : "";
    let writing_ans_2 =
      test_part == "writing" ? jQuery("#writing-ans-2").val() : "";
    report = [];
    jQuery(".qus-input").each((index, element) => {
      let qus_num = jQuery(element).data("index");
      let jQueryinput = jQuery(element);
      let input_type = jQueryinput.attr("type");

      let value = getInputValue(input_type, jQueryinput);
      value = value == undefined ? "" : jQuery.trim(value);
      pre_input_num != qus_num && user_input.push(value);
      pre_input_num = qus_num;
    });
    // var inputs = $(".qus-index")
    //   .map(function () {
    //     return $(this).data("index");
    //   })
    //   .get();

    // let max = Math.max.apply(Math, inputs);
    // let min = Math.min.apply(Math, inputs);
    // console.log(max, min);
    // for (let index = min; index <= max; index++) {
    //   console.log(index);
    //   // let val = $('.qus-index[data-index="' + index + '"]')
    //   //   .next(".qus-input")
    //   //   .val(index);
    //   let qus_num = $('.qus-index[data-index="' + index + '"]');
    //   console.log(qus_num);
    //   if (qus_num.length) {
    //     let jQueryinput = $('.qus-index[data-index="' + index + '"]').next(
    //       ".qus-input"
    //     );

    //     if (!jQueryinput.length) {
    //       jQueryinput = $('.qus-index[data-index="31"]')
    //         .parent()
    //         .next(".ar-msq-input")
    //         .find(".qus-input");
    //     }
    //     let input_type = jQueryinput.attr("type");
    //     console.log(input_type);

    //     let value = getInputValue(input_type, jQueryinput);
    //     console.log(value);
    //     value = value == undefined ? "" : jQuery.trim(value);
    //     pre_input_num != qus_num && user_input.push(value);
    //     pre_input_num = qus_num;
    //     // console.log(user_input);
    //   }
    // }

    // return;
    user_answers = user_input;

    jQuery(".loading-test").show();
    let id = jQuery("#ar-test-id").val();
    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: myAjax.ajaxurl,
      data: {
        action: "get_test_answers",
        test_id: id,
        user_answers: user_answers,
        test_part: test_part,
        writing_ans_1: writing_ans_1,
        writing_ans_2: writing_ans_2,
      },
      success: function (response) {
        if (test_part == "writing") {
          jQuery(".loading-test").hide();
          alert(
            "Your answers have been stored .You can go back to your dashboard for more tests."
          );
        } else {
          answers = response;
          checkAnswers();
        }
      },
    });
  });

  function getInputValue(type, jQueryele) {
    let name = jQueryele.attr("name");
    switch (type) {
      case "text":
        return refactor(jQueryele.val());
      case "radio":
        return refactor(jQuery('input[name="' + name + '"]:checked').val());
      case "checkbox":
        let val = [];
        jQuery.each(jQuery('input[name="' + name + '"]:checked'), function () {
          val.push(refactor(jQuery(this).val()));
        });
        return val.join(separator);
      default:
        return "";
    }
  }

  function checkAnswers() {
    jQuery(user_answers).each(function (index, value) {
      let is_correct = false;
      if (value) {
        value = value.split(separator);
        let found = [];
        jQuery(answers[index]["ans"]).each((i, ans) => {
          ans = jQuery.trim(ans);
          if (jQuery.inArray(ans, value) != -1) {
            found.push(ans);
          } else if (answers[index]["state"] == "and") {
            found.push("");
          }
        });
        is_correct = compareArrays(user_answers[index].split(separator), found);
        if (is_correct == undefined) {
          is_correct = false;
        }
      }
      report.push(is_correct);
    });
    showResults();
  }

  function refactor(val) {
    return val ? val.toLowerCase() : val;
  }

  function compareArrays(arr1, arr2) {
    return (
      jQuery(arr1).not(arr2).length == 0 && jQuery(arr2).not(arr1).length == 0
    );
  }

  function showResults() {
    let html =
      " <thead> <tr> <th>Your input</th>   <th>Answers</th>   <th>Result</th>  </tr></thead>";
    for (let i = 0; i < answers.length; i++) {
      let ans =
        answers[i]["state"] == "and"
          ? answers[i]["ans"].join(",")
          : answers[i]["ans"][0];
      let result_icon = report[i] ? check : cross;
      let user_ans = user_answers[i]
        ? user_answers[i].split(separator).join(",")
        : user_answers[i];
      html += "<tr>";
      html += "<td>" + user_ans + "</td>";
      html += "<td>" + ans + "</td>";
      html += "<td>" + result_icon + "</td>";
      html += "</tr>";
    }

    jQuery("#result-table").html("");
    jQuery("#result-table ").html(html);
    jQuery("#result-modal").show();
    jQuery(".loading-test").hide();
  }

  jQuery(".restart").click(function () {
    location.reload();
  });
  jQuery(".modal .close").click(function () {
    jQuery("#result-modal").hide();
  });



  jQuery("document").ready(function () {
    jQuery(".test-result-save").on("click", function (e) {
      e.preventDefault();
      jQuery(".t-score-error").hide();

      let test_id = jQuery(this).data("test-id"),
        user_id = jQuery(this).data("user-id"),
        score = jQuery(".t-score").val(),
        comment = jQuery(".t-comment").val(),
        nonce = jQuery(this).attr("data-nonce");
      if (isNaN(score)) {
        jQuery(".t-score-error").show();

        return;
      }
      jQuery.ajax({
        type: "post",
        dataType: "json",
        url: myAjax.ajaxurl,
        data: {
          action: "save_test_result",
          test_id: test_id,
          user_id: user_id,
          nonce: nonce,
          comment: comment,
          score: score,
        },
        success: function (response) {
          alert("Saved successfully");

          console.log(response);
        },
      });
    });
  });

});
