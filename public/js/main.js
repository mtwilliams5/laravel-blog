// initializing editors
// Create editors
var titleEditor = new MediumEditor('.title-editable', {
    buttonLabels: 'fontawesome',
    placeholder: false,
    extensions: {
      'multi_placeholder': new MediumEditorMultiPlaceholders({
        placeholders: [
            {
              tag: 'h1',
              text: 'Title'
            }
        ]
      })
    }
});
var bodyEditor = new MediumEditor('.body-editable', {
    buttonLabels: 'fontawesome',
    placeholder: false,
    extensions: {
      'multi_placeholder': new MediumEditorMultiPlaceholders({
        placeholders: [
            {
              tag: 'p',
              text: 'Tell your story...'
            }
        ]
      })
    }
});

// Edit editors
var existingTitleEditor = new MediumEditor('.existing-title-editable', {
  buttonLabels: 'fontawesome',
  placeholder: false
});
var existingBodyEditor = new MediumEditor('.existing-body-editable', {
  buttonLabels: 'fontawesome',
  placeholder: false
});