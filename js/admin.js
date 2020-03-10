jQuery("document").ready(function() {
  jQuery(".test-result-save").on("click", function(e) {
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
        score: score
      },
      success: function(response) {
        alert("Saved successfully");

        console.log(response);
      }
    });
  });
});
