(function() {
  // tinymce.activeEditor.setMode("readonly");

  tinymce.PluginManager.add("wdm_mce_dropbutton", function(editor, url) {
    editor.addButton("wdm_mce_dropbutton", {
      text: "Add Questions",
      icon: false,
      type: "menubutton",
      menu: [
        {
          text: "MCQ",
          onclick: function() {
            createMcqInput(editor, "radio");
          }
        },
        {
          text: "MCQ (multiple)",
          onclick: function() {
            createMcqInput(editor, "checkbox");
          }
        },
        {
          text: "User Input",
          onclick: function() {
            handleUserInput(editor);
          }
        },
        {
          text: "Yes/No/Not Given",
          onclick: function() {
            handleYesNo(editor);
          }
        }
      ]
    });
  });

  function createMcqInput(editor, type) {
    let options = [
      {
        type: "textbox",
        name: "qusno",
        value: "",
        placeholder: "Add a question Number",
        label: "Question No:"
      },
      {
        type: "textbox",
        name: "qus",
        value: "",
        placeholder: "Add a question here",
        label: "Question:",
        multiline: true,
        layout: "fit",
        minWidth: 260,
        minHeight: 80
      }
    ];
    for (let i = 0; i < 10; i++) {
      let option = {
        type: "textbox",
        name: "input_op-" + i,
        value: "",
        placeholder: "option title"
      };
      options.push(option);
    }
    editor.windowManager.open({
      title: "Mcq options (enter options here)",
      body: options,
      onsubmit: function(e) {
        if (!e.data.qus) {
          e.preventDefault();
          alert(" Qus is missing");
        } else {
          let arr = [];
          let qusno = e.data.qusno ? e.data.qusno : getRandomId();
          let qusnodisplay = e.data.qusno ? e.data.qusno + "." : "";
          let qusHtml =
            '<span class="qus-index" data-index="' +
            qusno +
            '">' +
            qusnodisplay +
            "</span>" +
            e.data.qus;
          for (let [key, value] of Object.entries(e.data)) {
            if (key.split("-")[0] == "input_op" && value) {
              arr.push(value);
            }
          }

          handleMcqInput(editor, arr, type, qusHtml);
        }
      }
    });
  }

  function getRandomId() {
    return btoa(Math.random()).substring(0, 12);
  }

  function handleYesNo(editor) {
    let options = [
      {
        type: "textbox",
        name: "qusno",
        value: "",
        placeholder: "Add a question Number",
        label: "Question No:"
      },
      {
        type: "textbox",
        name: "qus",
        value: "",
        placeholder: "Add a question here",
        label: "Question:",
        multiline: true,
        layout: "fit",
        minWidth: 260,
        minHeight: 80
      }
    ];

    editor.windowManager.open({
      title: "Mcq options (enter options here)",
      body: options,
      onsubmit: function(e) {
        if (!e.data.qus) {
          e.preventDefault();
          alert(" Qus is missing");
        } else {
          let qusno = e.data.qusno ? e.data.qusno : getRandomId();
          let qusnodisplay = e.data.qusno ? e.data.qusno + "." : "";
          let qusHtml =
            '<span class="qus-index" data-index="' +
            qusno +
            '">' +
            qusnodisplay +
            "</span>" +
            e.data.qus;
          let id = getRandomId();

          console.log(qusHtml)

          let html =
          '<p>'+
            qusHtml +
            '<p class="ar-msq-input"><input type="radio" name="yesno-input-' +
            id +
            '" value="yes" class="qus-input" data-index="' +
            id +
            '">Yes<br/>';
          html +=
            '<input type="radio" name="yesno-input-' +
            id +
            '" value="no" class="qus-input" data-index="' +
            id +
            '">No<br/>';
          html +=
            '<input type="radio" name="yesno-input-' +
            id +
            '" value="not given" class="qus-input" data-index="' +
            id +
            '">Not Given<br/></p></p>';
          editor.insertContent(html);
        }
      }
    });
  }

  function handleUserInput(editor) {
    let options = [
      {
        type: "textbox",
        name: "qusno",
        value: "",
        placeholder: "Add a question Number",
        label: "Question No:"
      },
      {
        type: "textbox",
        name: "qus_before",
        value: "",
        placeholder: "Before input (optional)",
        label: "Before:",
        multiline: true,
        layout: "fit",
        minWidth: 260,
        minHeight: 80
      },
      {
        type: "textbox",
        name: "qus_after",
        value: "",
        placeholder: "After Input (optional)",
        label: "After:",
        multiline: true,
        layout: "fit",
        minWidth: 260,
        minHeight: 80
      }
    ];

    editor.windowManager.open({
      title: "Mcq options (enter options here)",
      body: options,
      onsubmit: function(e) {
        if (!e.data.qusno ) {
          e.preventDefault();
          alert("Qus no or  Qus is missing");
        } else {
          let id = getRandomId();

          let qusno = e.data.qusno 
          let qusHtml =
            "<p>" +
            e.data.qus_before +
            ' <span class="qus-index" data-index="' +
            qusno +
            '">' +
            qusno +
            ".</span>" +
            ' <input  type="text" class="qus-input" data-index="' +
            id +
            '"> ' +
            e.data.qus_after+'</p>'; 
            ;
          // let html =
          //   '<input  type="text" class="qus-input" data-index="' + id + '"  >';
          editor.insertContent(qusHtml);
        }
      }
    });
    // let id = getRandomId();

    // let html =
    //   '<input  type="text" class="qus-input" data-index="' + id + '"  >';
    // editor.insertContent(html);
  }

  function handleMcqInput(editor, entries, type, qusHtml) {
    let html = "<p>" + qusHtml + "</p><p class='ar-msq-input'>";
    let id = getRandomId();
    entries.forEach(function(val, index) {
      console.log(val);
      if (val)
        html +=
          '<input type="' +
          type +
          '" name="' +
          type +
          "-input-" +
          id +
          '" value="' +
          (index + 1) +
          '" class="qus-input" data-index="' +
          id +
          // "-" +
          // index +
          '">' +
          val +
          "<br/>";
    });
    html += "</p>";
    editor.insertContent(html);
  }
})();

jQuery(function() {
  tinymce.EditorManager.execCommand("mceRemoveEditor", false, "content");
});
