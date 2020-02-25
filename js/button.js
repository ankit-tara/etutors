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
    let options = [];
    for (let i = 0; i < 10; i++) {
      let option = {
        type: "textbox",
        name: "input-" + i,
        value: "",
        placeholder: "option title"
      };
      options.push(option);
    }
    editor.windowManager.open({
      title: "Mcq options (enter options here)",
      body: options,
      onsubmit: function(e) {
        const entries = Object.values(e.data);
        handleMcqInput(editor, entries, type);
      }
    });
  }

  function getRandomId() {
    return btoa(Math.random()).substring(0, 12);
  }

  function handleYesNo(editor) {
    let id = getRandomId();

    let html =
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
      '">Not Given<br/></p>';
    editor.insertContent(html);
  }

  function handleUserInput(editor) {
    let id = getRandomId();

    let html =
      '<input  type="text" class="qus-input" data-index="' + id + '"  >';
    editor.insertContent(html);
  }

  function handleMcqInput(editor, entries, type) {
    let html = "<p class='ar-msq-input'>";
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
          "-" +
          index +
          '">' +
          val +
          "<br/>";
    });
    html += "</p>";
    editor.insertContent(html);
  }
})();


jQuery(function(){
  tinymce.EditorManager.execCommand("mceRemoveEditor", false, "content");

})