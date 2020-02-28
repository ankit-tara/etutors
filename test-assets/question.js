// jQuery(function() {
jQuery("document").ready(function() {
  let separator = "<&&separator&&>";
  let check =
    '<i class="fa fa-check result-icon check" aria-hidden="true"></i>';
  let cross =
    '<i class="fa fa-times result-icon cross" aria-hidden="true"></i>';
  let answers = [
   
  ];

  let user_answers = [];
  let report = [];

  jQuery(".form-btn").click(function(e) {
    e.preventDefault();
    // var result = confirm("Are you sure you want to submit the test?");
    // if (!result) {
    //   return;
    // }
    jQuery(".loading-test").show();
    let id = jQuery("#ar-test-id").val();
    jQuery.ajax({
      type: "get",
      dataType: "json",
      url: myAjax.ajaxurl,
      data: { action: "get_test_answers", test_id: id },
      success: function(response) {
        console.log(response);
answers = response
        let user_input = [];
        let pre_input_num = "";
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
        user_answers = user_input;
        checkAnswers();
      }
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
        jQuery.each(jQuery('input[name="' + name + '"]:checked'), function() {
          val.push(refactor(jQuery(this).val()));
        });
        return val.join(separator);
      default:
        return "";
    }
  }

  function checkAnswers() {
    jQuery(user_answers).each(function(index, value) {
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

  jQuery(".restart").click(function() {
    location.reload();
  });
  jQuery(".modal .close").click(function() {
     jQuery("#result-modal").hide();
  });
});
