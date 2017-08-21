// initializing editors
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
    buttonLabels: 'fontawesome'
});
    $('.body-editable').mediumInsert({
        editor: bodyEditor,
        images: true,
        imagesUploadScript: "{{ URL::to('upload') }}"
    });