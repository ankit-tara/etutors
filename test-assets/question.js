jQuery(function() {
  let separator = "<&&separator&&>";
  let check = '<i class="fa fa-check result-icon check" aria-hidden="true"></i>'
  let cross =
    '<i class="fa fa-times result-icon cross" aria-hidden="true"></i>';
  let answers = [
    {
      ans: ["a minibus", "by minibus"],
      state: "or"
    },
    {
      ans: ["15"," 15 people"],
      state: "or"
    },
    {
      ans: ["April (the) 18th"," April 18th "," April the 18th"],
      state: "or"
    },
    {
      ans: ["Pallisades"],
      state: "or"
    },
    {
      ans: ["b","d"],
      state: "and"
    },
    {
      ans: ["280"],
      state: "and"
    },
    {
      ans: ["14"],
      state: "and"
    },
    {
      ans: ["20%","20 percent"],
      state: "or"
    },
    {
      ans: ["39745T"],
      state: "and"
    },
    // {
    //   ans: ["b"],
    //   state: "and"
    // },
    {
      ans: ["move around"," move about"],
      state: "or"
    },
    {
      ans: ["brakes"],
      state: "and"
    },
    {
      ans: ["fingers"],
      state: "and"
    },
    {
      ans: ["satisfactory"],
      state: "and"
    },
    {
      ans: ["put together","put it together"],
      state: "or"
    },
    {
      ans: ["too wide"],
      state: "and"
    },
    {
      ans: ["dangerous"],
      state: "and"
    },
    {
      ans: ["wheels"],
      state: "and"
    },
    // {
    //   ans: ["dangerous"],
    //   state: "and"
    // },
    {
      ans: ["the best","best "," the best buy,best buy "," safe"],
      state: "or"
    },
    {
      ans: ["sharp"],
      state: "and"
    },

    {
      ans: ["b"],
      state: "and"
    },
    {
      ans: ["a"],
      state: "and"
    },
    {
      ans: ["c"],
      state: "and"
    },
    {
      ans: ["b","d"],
      state: "and"
    },
    {
      ans: ["full-time"],
      state: "and"
    },
    {
      ans: ["a term "," one term"],
      state: "or"
    },
    {
      ans: ["intensive"],
      state: "and"
    },
    {
      ans: ["two modules "," for two terms"," two terms"],
      state: "or"
    },
    {
      ans: ["a topic "," one topic"],
      state: "or"
    },
    // {
    //   ans: ["two modules , for two terms, two terms"],
    //   state: "or"
    // },
    // {
    //   ans: ["a topic , one topic"],
    //   state: "or"
    // },
    {
      ans: ["politics"],
      state: "and"
    },
    {
      ans: ["learn"],
      state: "and"
    },
    {
      ans: ["children’s education "," their children's education"],
      state: "or"
    },
    {
      ans: ["a car"],
      state: "and"
    },
    {
      ans: ["nursing care"],
      state: "and"
    },
    {
      ans: ["crisis"],
      state: "and"
    },
    {
      ans: ["early twen ties"],
      state: "and"
    },
    {
      ans: ["confidence"],
      state: "and"
    },
    {
      ans: ["money management"],
      state: "and"
    },
    {
      ans: ["low-risk investments"],
      state: "and"
    }
  ];

  let user_answers = [];
  let report = [];

  jQuery(".form-btn").click(function(e) {
    e.preventDefault();
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
             ans = jQuery.trim(ans)
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
    return jQuery(arr1).not(arr2).length == 0 && jQuery(arr2).not(arr1).length == 0;
  }

  function showResults() {
    console.log(report);
    console.log(user_answers);
    console.log(answers);
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
    jQuery("#result-modal").modal();

  }

  jQuery(".restart").click(function(){
      location.reload();

  });
});
