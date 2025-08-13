// SELECT2 PLACEHOLDER
$(".select2").select2({
    placeholder: "Select value",
    allowClear: true
});



// QUILL EDITOR
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{
        'header': 1
    }, {
        'header': 2
    }],
    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'script': 'sub'
    }, {
        'script': 'super'
    }],
    [{
        'indent': '-1'
    }, {
        'indent': '+1'
    }],
    [{
        'direction': 'rtl'
    }],
    [{
        'size': ['small', false, 'large', 'huge']
    }],
    ['link', 'image', 'video', 'formula'],
    [{
        'color': []
    }, {
        'background': []
    }],
    [{
        'font': []
    }],
    [{
        'align': []
    }]
];
var options = {
    debug: 'info',
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Textttt',
    readOnly: false,
    theme: 'snow'
};
if ($('#editor').length > 0) {

    var editor = new Quill('#editor', options);
    // editor.insertText(0, 'Hello', 'bold', true); //set init value
    editor.root.innerHTML = '';


}